<?php

namespace App\Http\Controllers\Users;

use File;
use Storage;
use App\Models\User;
use App\Models\Escort;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;
use Image;

class EscortsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = DB::table('photos')->where('user_id', Auth::user()->id)->OrderBy('created_at', 'desc')->get();
        $infos = Escort::where('user_id', Auth::user()->id)->first();
        return view('Users.Escorts.index', compact('gallery', 'infos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         abort(403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'from'  => ['required', 'string', 'max:10', Rule::in(['infos', 'services'])],
            'eyes' => ['exclude_if:from,services', 'required', 'string'],
            'weight' => ['exclude_if:from,services', 'required', 'integer'],
            'height' => ['exclude_if:from,services', 'required', 'integer'],
            'age' => ['exclude_if:from,services', 'required', 'integer'],
            'hair' => ['exclude_if:from,services', 'required', 'string'],
            'breasts' => ['exclude_if:from,services', 'required', 'string'],
            'pubic_hair' => ['exclude_if:from,services', 'required', 'string'],
            'about' => ['exclude_if:from,services', 'required', 'string', 'min:100', 'max:5000'],

            'newServices' => ['exclude_if:from,infos', 'required', 'string', 'min:1'],
            'lang_fr_maitrise' => ['exclude_if:from,infos', 'required', 'integer'],
            'lang_en_maitrise' => ['exclude_if:from,infos', 'required', 'integer'],
            'lang_es_maitrise' => ['exclude_if:from,infos', 'required', 'integer'],
            'lang_de_maitrise' => ['exclude_if:from,infos', 'required', 'integer'],
            'mobility' => ['exclude_if:from,infos', 'required', 'string'],
            'tarif30M' => ['exclude_if:from,infos', 'required', 'integer'],
            'tarif1H' => ['exclude_if:from,infos', 'required', 'integer'],
            'tarif1N' => ['exclude_if:from,infos', 'required', 'integer'],
            'tarif1W' => ['exclude_if:from,infos', 'required', 'integer'],
        ])->validate();

        $escort = Escort::where('user_id', $id);
        if($request['from'] == 'infos'){
            $escort->update([
                'lang_fr' => $request['lang_fr'],
                'lang_en' => $request['lang_en'],
                'lang_es' => $request['lang_es'],
                'lang_de' => $request['lang_de'],
                'eyes' => $request['eyes'],
                'weight' => $request['weight'],
                'height' => $request['height'],
                'age' => $request['age'],
                'hair' => $request['hair'],
                'breasts' => $request['breasts'],
                'pubic_hair' => $request['pubic_hair'],
                'about' => $request['about'],
            ]);

            $title = "Nouvelles informations enregistrées";
        }else if ($request['from'] == 'services'){
            $escort->update([
                'services' => $request['newServices'],
                'lang_fr_maitrise' => $request['lang_fr_maitrise'],
                'lang_en_maitrise' => $request['lang_en_maitrise'],
                'lang_es_maitrise' => $request['lang_es_maitrise'],
                'lang_de_maitrise' => $request['lang_de_maitrise'],
                'mobility' => $request['mobility'],
                'tr_30M' => $request['tarif30M'],
                'tr_1H' => $request['tarif1H'],
                'tr_1N' => $request['tarif1N'],
                'tr_1W' => $request['tarif1W'],
            ]);

            $title = "Nouveaux services enregistrés";
        }
        
        return response()->json(['response' => true, 'title' => $title],Response::HTTP_OK);
    }
    public function updateProfilePic(Request $request, $id)
    {
        Validator::make($request->all(), [
            'file_path' => 'required|string',
        ])->validate();

        $user = User::where('id', $id)->first();
        $user->update([
            'avatar' => $request->file_path
        ]);

        $response = true;
        $title = "Photo de profil modifiée";
        return response()->json(['response' => $response, 'title' => $title], Response::HTTP_OK);
    }

    /**
     * Upload pictures to storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    protected function uploadFile($image, $id){
        if(!File::isDirectory('storage/attachments/escorts/'.Auth::user()->name)) {
            File::makeDirectory('storage/attachments/escorts/'.Auth::user()->name, 0775, true, true); //create directory if not exist
        }
        $watermark = Image::make(public_path('watermark.png'))
                            ->resize(200, null, function ($constraint) {
                                $constraint->aspectRatio();
                            });
        $extension = $image->extension();

        $fileName = $id . "_" . Str::uuid() . "." . $extension;
        $filePath = 'attachments/escorts/'.Auth::user()->name;

        $uploadedFile = Image::make($image->getRealPath())
                               ->resize(600, 1000, function ($constraint) {
                                    $constraint->aspectRatio();
                                    $constraint->upsize();
                                });
        if($extension != 'jpg')
            $uploadedFile->encode('jpg');
            
        $uploadedFile->insert($watermark, 'center', 10, 10)->save(public_path('/storage/'.$filePath).'/'.$fileName, 100);

        // $originalFileName =  $image->getClientOriginalName();
        // $extension = $image->extension();
        // // upload attachment and store the new name
        // $fileName = $id . "_" . Str::uuid() . "." . $extension;

        // $uploadedFileName = $image->storeAs('attachments/escorts', $fileName, 'public');
        // return [ $fileName, $uploadedFileName];
        
        return [ $fileName, $filePath];
    }
    protected function uploadFiles($request, $id){
        $uploadedFiles = [];

        if($request->hasFile('files')){
            $images = $request->file('files');
            foreach($images as $image)
            {
                $uploadedFiles[] = $this->uploadFile($image, $id);
            }
        }

        return $uploadedFiles;
    }
    public function storeFiles(Request $request, $id)
    {
          $request->validate([
            'files' => 'required|array',
            'files.*' => 'required|image|mimes:jpg,png,jpeg|max:3072',
        ]);
        
        $images = $this->uploadFiles($request, $id);
        
        foreach($images as $imageFile)
        {
            list($imageName, $imagePath) = $imageFile;
            DB::table('photos')->insert(
                [
                    'image_name'     =>   $imageName, 
                    'image_path'   =>   $imagePath.'/'.$imageName,
                    'stories' => null,
                    'user_id' => $id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
        $title = "Nouveles photos ajoutées à la gallerie";
        
        return response()->json(['response' => true, 'title' => $title], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function destroyImg(Request $request, $id, $imgId)
    {
        $img = DB::table('photos')->where('user_id', $id)->where('id', $imgId)->first();
        $imgPath = $img->image_path;
        if(File::exists(public_path('storage/'.$imgPath))){
            DB::table('photos')->where('user_id', $id)->where('id', $imgId)->delete();
            unlink(public_path('storage/'.$img->image_path));

            $response = true;
            $title = "Photo supprimée de la gallerie";
        }else{
             $response = false;
             $title = "Quelque chose s\'est mal passé";
        }

         return response()->json(['response' => $response, 'title' => $title], Response::HTTP_OK);
    }
}
