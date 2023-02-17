<?php

namespace App\Http\Controllers\Admin;

use Pusher\Pusher;

use App\Models\Role;
use App\Models\User;
use App\Models\Escort;

use App\Models\ChMessage;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ChMessage as Message;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Chatify\Facades\ChatifyMessenger as Chatify;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getChatters(){
        $role = Role::where('name', 'member')->first();

        $chatters = DB::table('users')
                        ->where('role_id', $role->id)
                        ->whereExists(function ($query) {
                            $query->select('*')
                                    ->from('ch_messages')
                                    ->whereColumn('ch_messages.to_id', 'users.id')
                                    ->orWhereColumn('ch_messages.from_id', 'users.id');
                        })
                        ->get();

        return response()->json(['chatters' => $chatters], Response::HTTP_OK);
    }
    public static function getContactItem($user_id, $id)
    {
        // get last message
        $lastMessage = Message::where('from_id', $id)->where('to_id', $user_id)
                            ->orWhere('from_id', $user_id)->where('to_id', $id)
                            ->latest()->first();

        // Get Unseen messages counter
        $unseenCounter = Message::where('from_id', $user_id)->where('to_id', $id)->where('seen', 0)->count();

        return ['lastMessage' => $lastMessage, 'unseen' => $unseenCounter];
    }
    public static function getContacts($id){
        // get all users that received/sent message from/to [param user]
        $contacts = Message::join('users',  function ($join) {
            $join->on('ch_messages.from_id', '=', 'users.id')
                ->orOn('ch_messages.to_id', '=', 'users.id');
        })
        ->where(function ($q) use ($id) {
            $q->where('ch_messages.from_id', $id)
            ->orWhere('ch_messages.to_id', $id);
        })
        ->where('users.id','!=',$id)
        ->select('users.*',DB::raw('MAX(ch_messages.created_at) max_created_at'))
        ->orderBy('max_created_at', 'desc')
        ->groupBy('users.id')
        ->get();

        return $contacts ;
    }
    public function getConversations($chatter_id, $target_id){
        $chatter_name = User::where('id', $chatter_id)->first();
        // get all users that received/sent message from/to [param user]
        $contacts = Message::join('users',  function ($join) {
            $join->on('ch_messages.from_id', '=', 'users.id')
                ->orOn('ch_messages.to_id', '=', 'users.id');
        })
        ->where(function ($q) use ($chatter_id) {
            $q->where('ch_messages.from_id', $chatter_id)
            ->orWhere('ch_messages.to_id', $chatter_id);
        })
        ->where('users.id','!=',$chatter_id)
        ->select('users.*',DB::raw('MAX(ch_messages.created_at) max_created_at'))
        ->orderBy('max_created_at', 'desc')
        ->groupBy('users.id')
        ->get();

        $response = $this->fetch($target_id, $chatter_id);

        // dd($response);

        return view('Admin.conversations', compact('contacts', 'target_id', 'response', 'chatter_id', 'chatter_name'));
    }

    private function fetch($target_id, $chatter_id)
    {
        $query = Message::where('from_id', $chatter_id)->where('to_id', $target_id)
                        ->orWhere('from_id', $target_id)->where('to_id', $chatter_id)
                        ->latest();
        $messages = $query->paginate(30);
        $totalMessages = $messages->total();
        $lastPage = $messages->lastPage();
        $response = [
            'total' => $totalMessages,
            'last_page' => $lastPage,
            'last_message_id' => collect($messages->items())->last()->id ?? null,
            'messages' => '',
        ];

        // if there is no messages yet.
        if ($totalMessages < 1) {
            $response['messages'] ='<p class="message-hint center-el"><span>Dites salut et discutez.</span></p>';
        }
        if (count($messages->items()) < 1) {
            $response['messages'] = '';
        }
        $allMessages = [];
        $i=0;
        foreach ($messages->reverse() as $index => $message) {
            $allMessages[$i] = $this->fetchMessage($message->id, $index, $chatter_id);
            $i++;
        }
        $response['messages'] = $allMessages;

       return $response;
    }
    private function getAllowedImages()
    {
        return config('chatify.attachments.allowed_images');
    }
    private function fetchMessage($id, $index = null, $chatter_id)
    {
        $attachment = null;
        $attachment_type = null;
        $attachment_title = null;

        $msg = Message::where('id', $id)->first();
        if(!$msg){
            return [];
        }

        if (isset($msg->attachment)) {
            $attachmentOBJ = json_decode($msg->attachment);
            $attachment = $attachmentOBJ->new_name;
            $attachment_title = htmlentities(trim($attachmentOBJ->old_name), ENT_QUOTES, 'UTF-8');

            $ext = pathinfo($attachment, PATHINFO_EXTENSION);
            $attachment_type = in_array($ext, $this->getAllowedImages()) ? 'image' : 'file';
        }

        return [
            'index' => $index,
            'id' => $msg->id,
            'from_id' => $msg->from_id,
            'to_id' => $msg->to_id,
            'message' => $msg->body,
            'attachment' => [$attachment, $attachment_title, $attachment_type],
            'time' => $msg->created_at->diffForHumans(),
            'fullTime' => $msg->created_at,
            'viewType' => ($msg->from_id == $chatter_id) ? 'sender' : 'default',
            'seen' => $msg->seen,
        ];
    }
    public function sendMessage(Request $request){
        Validator::make($request->all(), [
            'form'  => ['required', 'string', Rule::in(['image', 'text'])],
            'message' => ['exclude_if:form,image', 'required', 'string', 'max:500'],
            'file' => ['exclude_if:form,text', 'required','image', 'mimes:jpg,png,jpeg', 'max:5120'],
        ])->validate();
        $attachment = null;
        $attachment_title = null;

        // if there is attachment [file]
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            // get attachment name
            $attachment_title = $file->getClientOriginalName();
            // upload attachment and store the new name
            $attachment = Str::uuid() . "." . $file->getClientOriginalExtension();
            $file->storeAs(config('chatify.attachments.folder'), $attachment, config('chatify.storage_disk_name'));
        }
        // send to database
        $messageID = mt_rand(9, 999999999) + time();
        Chatify::newMessage([
            'id' => $messageID,
            'type' => $request['type'],
            'from_id' => $request['from_id'],
            'to_id' => $request['to_id'],
            'body' => htmlentities(trim($request['message']), ENT_QUOTES, 'UTF-8'),
            'attachment' => ($attachment) ? json_encode((object)[
                'new_name' => $attachment,
                'old_name' => htmlentities(trim($attachment_title), ENT_QUOTES, 'UTF-8'),
            ]) : null,
        ]);

        // fetch message to send it with the response
        $messageData = Chatify::fetchMessage($messageID);

        // send to user using pusher
        Chatify::push('private-chatify', 'messaging', [
            'from_id' => $request['from_id'],
            'to_id' => $request['to_id'],
            'message' => Chatify::messageCard($messageData, 'default')
        ]);

        return back();
    }
    public function dltMsg(Request $request)
    {
        $chatter_id = $request['chatter_id'];
        $msg_id = $request['msg_id'];
        $msg = Message::findOrFail($msg_id);
        if ($msg->from_id == $chatter_id) {
            // delete file attached if exist
            if (isset($msg->attachment)) {
                $path = config('chatify.attachments.folder') . '/' . json_decode($msg->attachment)->new_name;
                if (self::storage()->exists($path)) {
                    self::storage()->delete($path);
                }
            }
            // delete from database
            $msg->delete();
        } 

        return redirect()->back();
    }

    public function index(User $model)
    {
        if (Gate::denies('deep-gest-users')) {
            abort(403);
        }

        $role_escort = Role::where('name', 'escort')->first();
        $role_member = Role::where('name', 'member')->first();
        $users = User::orderBy('role_id', 'ASC')->paginate(15);
        $count_all_users = User::all()->count();
        $count_all_escorts = User::where('role_id', $role_escort->id)->count();
        $count_all_members = User::where('role_id', $role_member->id)->count();
        return view('Admin.Users.list', compact('users', 'count_all_users', 'count_all_members', 'count_all_escorts'));
    }
    public function getUsers(Request $request)
    {
        $escort_role = Role::where('name', 'escort')->first();
        $member_role = Role::where('name', 'member')->first();
        $data = [];
        if($request->fromPage == "users"){
            $data = User::where('name', 'LIKE','%'.$request->keyword.'%')->orWhere('email', 'LIKE','%'.$request->keyword.'%')->get();
        }else if($request->fromPage == "members"){
            $data = User::where('role_id', $member_role->id)
                        ->where(function ($query) use($request) {
                            $query->where('name', 'LIKE','%'.$request->keyword.'%')
                                ->orWhere('email', 'LIKE','%'.$request->keyword.'%');
                        })->get();
        }else if($request->fromPage == "escorts"){
            $data = User::where('role_id', $escort_role->id)
                        ->where(function ($query) use($request) {
                            $query->where('name', 'LIKE','%'.$request->keyword.'%')
                                ->orWhere('email', 'LIKE','%'.$request->keyword.'%');
                        })->get();
        }else
            $data = [];
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name', 'admin')->OrWhere('name', 'author')->get();

        return view("Admin.Users.create", compact("roles"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'integer'],
        ])->validate();

        $success = null;
        $fail = null;

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'email_verified_at' => now(),
            'password' => Hash::make($request['password']),
            'role_id' => $request['role'],
            'avatar' => 'users-avatar/members/avatar.png',
        ]);

        if($user)
            $success = 'User'.$user->name.' added successfully';
        else
            $fail = 'Something wrong, please retry!';

        return redirect()->route('admin.users.index')->with(['success' => $success, 'fail' => $fail]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('Admin.Users.Edit', compact('user'));
    }
    public function resetPassword(Request $request, $user_id){
        Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ])->validate();

        $fail = null;
        $success = null;
        $user = User::where('id', $user_id)->first();
        $user->update([
            'password' => Hash::make($request['password']),
        ]);
        if($user)
            $success = "Modifications effectuées avec succès.";
        else
            $fail = "Quelque chose s'est mal passé!";
        
        if($request['from'] == '/admin/users')
            return redirect()->route('admin.users.index')->with(['success' => $success, 'fail' => $fail]);
        if($request['from'] == '/admin/escorts')
            return redirect()->route('admin.escorts.index')->with(['success' => $success, 'fail' => $fail]);
        if($request['from'] == '/admin/members')
            return redirect()->route('admin.members.index')->with(['success' => $success, 'fail' => $fail]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        Validator::make($request->all(), [
            'name' => ['string', 'max:255'],
            'monnetisation' => ['required', 'integer'],
            'email' => ['string', 'email', 'max:255', "unique:users,email,{$user->id}"],
        ])->validate();

        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'monnetisation' => $request['monnetisation'],
        ]);

         return redirect()->route('admin.users.index')->with('success', 'Modifications effectuées avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('succes', 'Utilisateur supprimé avec succès.');
    }

    public function searchUser()
    {
        $users = User::all();
        return response()->json($users);
    }
}
