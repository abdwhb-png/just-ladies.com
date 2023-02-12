<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MembersController extends Controller
{
    protected $emailSuffix = [
        '@gmail.com',
        '@hotmail.fr',
        '@hotmail.com',
        '@yahoo.com',
        '@yahoo.fr',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::where('name', 'member')->first();
        $members = User::where('role_id', $role->id)->paginate(30);
        $count = User::where('role_id', $role->id)->count();
        return view('Admin.Users.Members.list', compact('members', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prenom = DB::table('prenoms')
                    ->Where('Gender', 'M')
                    ->orWhere('Gender', 'M,F')
                    ->orWhere('Gender', 'F,M')
                    ->inRandomOrder()
                    ->whereNotIn('Name', function ($query) {
                        $query->select('name')
                            ->from('users')
                            ->get();
                    })
                    ->first();

        $emailSuffix = $this->emailSuffix[rand(0, count($this->emailSuffix) - 1)];

        return view('Admin.Users.Members.create', compact('prenom', 'emailSuffix'));
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
            'nbr' => ['required', 'numeric', 'min:1', 'max:5000'],
            // 'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ])->validate();

        $success = null;
        $fail = null;

        $role = Role::where('name', 'member')->first();

        $prenoms = DB::table('prenoms')
                        ->Where('Gender', 'M')
                        ->orWhere('Gender', 'M,F')
                        ->orWhere('Gender', 'F,M')
                        ->inRandomOrder()
                        ->whereNotIn('Name', function ($query) {
                            $query->select('name')
                                ->from('users')
                                ->get();
                        })
                        ->limit($request['nbr'])
                        ->get();

                        $i=0;
        foreach($prenoms as $prenom){
            $email = $prenom->Name.''.$this->emailSuffix[random_int(0, count($this->emailSuffix) - 1)];

            $member = User::create([
                'name' => $prenom->Name,
                'email' => $email,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role_id' => $role->id,
                'avatar' => 'users-avatar/members/avatar.png',
            ]);

            if($member)$i++;
        }

        if($i>0)
            $success = $i.' membre(s) ajouté(s) avec succès.';
        else
            $fail = 'Il n\'y a plus d\'emails de membres disponibles. Veuillez en générer de nouveaux!';
        return redirect()->route('admin.members.index')->with(['success' => $success, 'fail' => $fail]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $member)
    {
        Validator::make($request->all(), [
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', "unique:users,email,{$member->id}"],
        ])->validate();

        $member->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);

         return redirect()->route('admin.members.index')->with('succes', 'Modifications effectuées avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $member)
    {
        $member->delete();

        return redirect()->route('admin.members.index')->with('succes', 'Membre supprimé avec succès.');
    }
}
