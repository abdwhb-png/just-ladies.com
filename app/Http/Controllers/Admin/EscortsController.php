<?php

namespace App\Http\Controllers\Admin;


use File;
use Image;
use Storage;
use App\Models\Role;
use App\Models\User;
use App\Models\Abonne;
use App\Models\Escort;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ChFavorite as Favorite;

class EscortsController extends Controller
{
    protected $services = [
        '69',
        'Cunnilingus',
        'Fellation protégée',
        'Fellation naturelle',
        'Anal',
        'Éjaculation corporelle',
        'Lesbo show',
        'Embrasse',
        'GFE',
        'Massage érotique',
        'Massage sur table',
        'Massage tantrique',
        'Massage prostatique',
        'Sex toys',
        'Striptease',
        'Voyage',
        'Restaurant',
        'Massage 4 mains',
        'BDSM',
        'Massage aux huiles',
        'Massage naturiste',
        'Gode ceinture',
        'Fétichisme',
        '+ 2 hommes',
        'Douche dorée',
        'Jeu de rôles',
        'Soumission (légère)',
    ];

    protected $emailSuffix = [
        '@gmail.com',
        '@hotmail.fr',
        '@hotmail.com',
        '@mail.ru',
        '@yahoo.com',
        '@yahoo.fr',
        '@icloud.com',
    ];

    protected $origin = array(
        'Afro',
        'Caucasienne',
        'Latine',
        'Métisse',
        'Autre',
    );

    protected $eyes = array(
        'Bleu',
        'Brun Clair',
        'Brun',
        'Vert',
        'Noisette',
        'Autre',
    );

    protected $hair = array(
        'Noir',
        'Blond',
        'Châtin',
        'Châtin-Clair',
        'Roux',
        'Autre',
    );

    protected $breasts = array(
        'XXL',
        'Grosse',
        'Moyenne',
        'Petite',
        'Naturelle',
    );

    protected $pubic_hair = array(
        'Taillé',
        'Epilé',
        'Poilu',
    );

    protected $mobility = array(
        'Reçoit',
        'Se déplace',
        'Reçoit & Se déplace',
    );

    protected function getFilesNames($files){
        $allMedia = [];
        foreach ($files as $file){
            $file = pathinfo($file);
            $allMedia = $file['basename'];
        }
        return $allMedia;
    }
    protected function randomTarif($iMin, $iMax){
        $tarif = 0;
        for($i=$iMin; $i<=$iMax; $i++){
            $tarifsTab[] = $i*50;
        };
        
        $tarifsTabArraySize = count($tarifsTab);

        $randomTarifRank = rand(0, $tarifsTabArraySize-1);
        $tarif = $tarifsTab[$randomTarifRank];

        return $tarif;
    }

    protected function randomValue($tab, $i){
        $j = 0;
        foreach ($tab as $t) {
            if ($i == $j)
                $val = $t;

            $j++;
        }

        return $val;
    }

    protected function uploadFile($image, $id, $request){
        if(!File::isDirectory('storage/attachments/escorts/'.$request->name)) {
            File::makeDirectory('storage/attachments/escorts/'.$request->name, 0775, true, true); //create directory if not exist
        }
        $watermark = Image::make(public_path('watermark.png'))
                            ->resize(200, null, function ($constraint) {
                                $constraint->aspectRatio();
                            });
        $extension = $image->extension();

        $fileName = $id . "_" . Str::uuid() . "." . $extension;
        $filePath = 'attachments/escorts/'.$request->name;

        $uploadedFile = Image::make($image->getRealPath())
                               ->resize(600, 1000, function ($constraint) {
                                    $constraint->aspectRatio();
                                    $constraint->upsize();
                                });
        if($extension != 'jpg')
            $uploadedFile->encode('jpg');
            
        $uploadedFile->insert($watermark, 'center', 10, 10)->save(public_path('/storage/'.$filePath).'/'.$fileName, 100);

        // // get file name and extension
        // $originalFileName =  $image->getClientOriginalName();
        // $extension = $image->extension();
        // // upload attachment and store the new name
        // $fileName = $id . "_" . Str::uuid() . "." . $extension;
        // $uploadedFileName = $image->storeAs('attachments/escorts/'.$request->name, $fileName, 'public');
        // return [ $fileName, $uploadedFileName];

        return [ $fileName, $filePath];
    }

    protected function uploadFiles($request, $id){
        $uploadedFiles = [];

        if($request->hasFile('files')){
            $images = $request->file('files');
            foreach($images as $image)
            {
                $uploadedFiles[] = $this->uploadFile($image, $id, $request);
            }
        }

        return $uploadedFiles;
    }

    protected function generateEscortInfos($name){
        $name = Str::replace(' ', '-', Str::lower($name));
        $name = Str::replace('.', '', $name);
        //generate email
        $email = $name.''.$this->emailSuffix[random_int(0, count($this->emailSuffix) - 1)];

        //generate services
        $services = ''; 
        $servicesArraySize = count($this->services);
        for($i=0; $i<20; $i++){
            $random_services = collect($this->services)->random();
            $services = $services.','.$random_services;
        }

        //generate languages
        $fr = 0; $en = 0; $es = 0; $de = 0;
        $fr_maitrise = 0; $en_maitrise = 0; $es_maitrise = 0; $de_maitrise = 0;
        for($i=0; $i<random_int(1, 4); $i++){
            $randomLangageRank = random_int(1, 4);
            if($randomLangageRank == 1){
                $fr = 1;
                $fr_maitrise = random_int(1, 3);
            }elseif($randomLangageRank == 2){
                $en = 1;
                $en_maitrise = random_int(1, 3);
            }elseif($randomLangageRank == 3){
                $es = 1;
                $es_maitrise = random_int(1, 3);
            }else{
                $de = 1;
                $de_maitrise = random_int(1, 3);
            }
        }

        //generate tarifs
        $tarif30M = $this->randomTarif(1, 5);
        $tarif1H = 0;
        if($tarif30M == 50)
            $tarif1H = $tarif30M*2;
        else 
            $tarif1H = $tarif30M*2-50;
        $tarif1N = $this->randomTarif(15, 50);
        $tarif1W = $tarif1N*2+500;

        //generate eyes
        $eyes = $this->eyes[array_rand($this->eyes)];
        //generate hair
        $hair = $this->hair[array_rand($this->hair)];
        $pubic_hair = $this->pubic_hair[array_rand($this->pubic_hair)];
        //generate mobility
        $mobility = $this->mobility[array_rand($this->mobility)];
        //generate breasts
        $breasts = $this->breasts[array_rand($this->breasts)];
        //generate origin
        $origin = $this->origin[array_rand($this->origin)];
        $height= random_int(163, 190);
        $weight= random_int(50, 70);
        $age=random_int(20, 35);

        return [$email, $services, $fr, $en, $es, $de, $fr_maitrise, $en_maitrise, $es_maitrise, $de_maitrise, $tarif30M, $tarif1H, $tarif1N, $tarif1W, $eyes, $hair, $pubic_hair, $mobility, $breasts, $origin, $height, $weight, $age]; 
    }

    protected function makeInFavorite($abonne_id, $escort_id)
    {
            // Star
            $star = new Favorite();
            $star->user_id = $abonne_id;
            $star->favorite_id = $escort_id;
            $star->save();
            return $star ? true : false;
    }
    protected function generateFollowers($id, $nbr){
        $member_role = Role::where('name', 'member')->first();
        $followers = User::where('role_id', $member_role->id)
                        ->inRandomOrder()
                        ->limit($nbr)
                        ->get();
        foreach($followers as $follower){
            $abonne = Abonne::create([
                'abonne_id' => $follower->id,
                'user_id' => $id
            ]);
            $this->makeInFavorite($follower->id, $id);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('gest-users')) {
            abort(403);
        }

        $role = Role::where('name', 'escort')->first();
        $escorts = User::where('role_id', $role->id)->paginate(30);
        $count = User::where('role_id', $role->id)->count();
        return view('Admin.Users.Escorts.list', compact('escorts', 'count'));
    }

    public function getGirls($nbr)
    {
        $girls = [];
        $role = Role::where('name', 'escort')->first();
        $girls_names = DB::table('girls_name')
                        ->inRandomOrder()
                        ->whereNotIn('Name', function ($query) use ($role) {
                            $query->select('name')
                                ->from('users')
                                ->where('role_id', $role->id)
                                ->get();
                        })
                        ->limit($nbr)
                        ->get();
        foreach ($girls_names as $girl_name) {
            $files=[];
            if(File::exists(public_path('storage/attachments/escorts/'.$girl_name->Name))){
                $directory = public_path('storage/attachments/escorts/'.$girl_name->Name);
                $files = File::files($directory);
                $allMedia=[];
                $i=0;
                foreach ($files as $file){
                    $i++;
                    $imgs = pathinfo($file);
                    $allMedia[$i] = $imgs['basename'];
                }
                
                $girls[$girl_name->Name] =  [
                    "images" => $allMedia,
                    "images_count" => count($allMedia),
                ];
            }
        }

        return response()->json(['girls_names' => $girls_names, 'girls' => $girls], Response::HTTP_OK);
    }

    public function getPrenom()
    {
        $prenom = DB::table('prenoms')
                        ->Where('gender', 'F')
                        ->orWhere('Gender', 'M,F')
                        ->orWhere('Gender', 'F,M')
                        ->inRandomOrder()
                        ->whereNotIn('Name', function ($query) {
                            $query->select('name')
                                ->from('users')
                                ->get();
                        })
                        ->first();
        return response()->json(['prenom' => $prenom], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Users.Escorts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'way' => ['required', 'string'],
            'abonnes' => ['required', 'integer', 'min:30', 'max:200'],
            'names' => ['required', 'array'],
            'names.*' => ['required', 'string', 'unique:users,name'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ])->sometimes('files', 'required|array', function ($request) {
            return $request->way == 'manual';
        })->sometimes('files.*', 'image|mimes:jpg,png,jpeg|max:5120', function ($request) {
            return $request->way == 'manual';
        })->sometimes('girls_images', 'required|array', function ($request) {
            return $request->way == 'auto';
        })->sometimes('girls_images.*.images.*', 'string|ends_with:.jpg,.png,.jpeg', function ($request) {
            return $request->way == 'auto';
        })->validate(); 
            
        $success = null;
        $fail = null;

        foreach ($request['names'] as $key => $name) {
            $ch_locations = DB::table('ch_departments')->get();
            $fr_locations = DB::table('fr_departments')->get();
            $countries = ["Suisse", "France"];
            $i = array_rand($countries);
            $location = '';
            $indicatif = '';
            if($countries[$i] == "France"){
                $location = $fr_locations->random();
                $indicatif = "+33";
            } 
            if($countries[$i] == "Suisse"){
                $location = $ch_locations->random();
                $indicatif = "+41";
            }

            list($email, $services, $fr, $en, $es, $de, $fr_maitrise, $en_maitrise, $es_maitrise, $de_maitrise, $tarif30M, $tarif1H, $tarif1N, $tarif1W, $eyes, $hair, $pubic_hair, $mobility, $breasts, $origin, $height, $weight, $age) = $this->generateEscortInfos($name);

            //get escort role
            $role = Role::where('name', 'escort')->first();
            //first register user
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'email_verified_at' => now(),
                'password' => Hash::make($request['password']),
                'role_id' => $role->id,
                'avatar' => 'users-avatar/escorts/avatar.png',
            ]);
            //second save escort info
            $escort = Escort::create([
                'lang_fr' => $fr,
                'lang_fr_maitrise' => $fr_maitrise,
                'lang_en' => $en,
                'lang_en_maitrise' => $en_maitrise,
                'lang_es' => $es,
                'lang_es_maitrise' => $es_maitrise,
                'lang_de' => $de,
                'lang_de_maitrise' => $de_maitrise,
                'height' => $height,
                'weight' => $weight,
                'age' => $age,
                'eyes' => $eyes,
                'origin' => $origin,
                'country' => $countries[$i],
                'location' => $location->name,
                'breasts' => $this->breasts[random_int(0, count($this->breasts) - 1)],
                'services' => $services,
                'tr_30M' => $tarif30M,
                'tr_1H' => $tarif1H, 
                'tr_1N' => $tarif1N,
                'tr_1W' => $tarif1W,
                'mobility' => $mobility,
                // 'biography' => "Vous n'avez pas rempli votre biographie. Ecrivez quelque chose pour être mieux visible!",
                // 'about' => "Veuillez renseigner toute information sur vous que vous jugez utile de partager!",
                'hair' => $hair,
                'pubic_hair' => $pubic_hair,
                'contact' => $indicatif.''.random_int(7777777777, 9999999999),
                'user_id' => $user->id,
            ]);

            if($request['way'] == 'auto'){
                $path = 'attachments/escorts/'.$name;
                foreach($request->girls_images[$name]['images'] as $imageName)
                {
                    DB::table('photos')->insert(
                        [
                            'image_name'     =>   $imageName, 
                            'image_path'   =>   $path.'/'.$imageName,
                            'stories' => null,
                            'user_id' => $user->id,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]
                    );
                }
            }

            if($request['way'] == 'manual'){
                $photos = $this->uploadFiles($request, $user->id);
                foreach($photos as $imageFile)
                {
                    list($imageName, $imagePath) = $imageFile;
                    DB::table('photos')->insert(
                        [
                            'image_name'     =>   $imageName, 
                            'image_path'   =>   $imagePath.'/'.$imageName,
                            'stories' => null,
                            'user_id' => $user->id,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]
                    );
                }
            }
            $avatar = DB::table('photos')->Where('user_id', $user->id)->inRandomOrder()->first();
            $user->update([
                'avatar' => $avatar->image_path
            ]);
            $this->generateFollowers($user->id, $request->abonnes);
            $occ=0;
            if($escort){
                if ($request->way == 'manual') {
                    $success = "Escorte ajoutée avec succès.";
                }
                if ($request->way == 'auto') {
                    $occ++;
                }
            }else{
                $fail = "OOOPS!! Quelque chose s\'est mal passé";
            }
        }

        if($occ>=1)
            $success = $occ.' escortes ajoutées avec succès.';
        
        return response()->json(['success' => $success, 'fail' => $fail], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Escort  $escort
     * @return \Illuminate\Http\Response
     */
    public function show(Escort $escort)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Escort  $escort
     * @return \Illuminate\Http\Response
     */
    public function edit(Escort $escort)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Escort  $escort
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $escort)
    {
        Validator::make($request->all(), [
            'name' => ['string', 'max:255'],
            'monnetisation' => ['required', 'integer'],
            'abonnes' => ['nullable', 'integer', 'max:30', 'min:5'],
            'email' => ['string', 'email', 'max:255', "unique:users,email,{$escort->id}"],
        ])->validate();

        $escort->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'monnetisation' => $request['monnetisation'],
        ]);
        if($request->abonnes >= 5)
            $this->generateFollowers($escort->id, $request->abonnes);

         return redirect()->route('admin.escorts.index')->with('succes', 'Modifications effectuées avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Escort  $escort
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $escort)
    {
        $escort->delete();

        return redirect()->route('admin.escorts.index')->with('succes', 'Escorte supprimé avec succès.');
    }
}
