<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Escort;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ChMessage as Message;
use File;

class MainController extends Controller
{
    public function test(){
        //
    }
    public function index()
    {
        $actuals_fr_towns = Escort::where('country', 'France')
                                    ->orWhere('country', 'Françe')
                                    ->groupBy('location')
                                    ->select('location', 'country')
                                    ->get();
        $actuals_ch_towns = Escort::where('country', 'Suisse')
                                    ->groupBy('location')
                                    ->select('location', 'country')
                                    ->get();
        return view('welcome', compact('actuals_fr_towns', 'actuals_ch_towns'));
    }
    public function girls($name, $id)
    {
        $escort = User::Where('id', $id)->where('role_id', 3)->first();
        if($escort)
            return view('girls', compact('escort'));
        else 
            abort(404);  
    }
    public function gallery($name, $id)
    {
        $escort = User::Where('id', $id)->where('role_id', 3)->first();
        if($escort)
        return view('gallery', compact('escort'));
        else 
            abort(404); 
    }
    public function girlsResults(Request $request)
    {
        $escort_role = Role::Where('name', 'escort')->first();
        if($request->keyword != "" || $request->region != null){
            $girls = DB::table('users')
                    ->join('escorts', 'users.id', '=', 'escorts.user_id')
                    ->Where('users.role_id', $escort_role->id)
                    ->Where('users.name', 'LIKE','%'.$request->keyword.'%')
                    ->Where('escorts.country', 'LIKE','%'.$request->region.'%')
                    ->OrderBy('users.name')->get();
        }else{ 
            $girls = DB::table('users')
                    ->join('escorts', 'users.id', '=', 'escorts.user_id')
                    ->Where('users.role_id', $escort_role->id)
                    ->inRandomOrder()
                    ->OrderBy('users.created_at', 'desc')
                    ->get();
        }
        return response()->json(['girls' => $girls], Response::HTTP_OK);
    }
    public function vueCarousel()
    {
        $carousel =  DB::table('users')
                    ->join('photos', 'users.id', '=', 'photos.user_id')
                    ->inRandomOrder()
                    ->groupBy('photos.user_id')
                    ->limit(20)
                    ->get();
        return response()->json(['carousel' => $carousel], Response::HTTP_OK);
    }
    public function girlGallery($id)
    {
        $girlGallery =  DB::table('photos')->where('user_id', $id)->get();
        return response()->json(['girlGallery' => $girlGallery], Response::HTTP_OK);
    }
    public function girlInfos($id)
    {
        $girlInfos =  Escort::where('user_id', $id)->first();
        return response()->json(['girlInfos' => $girlInfos], Response::HTTP_OK);
    }

    public function admin()
    {
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

        return view('Admin.dashboard', compact('chatters'));
    }

    public function tarifs()
    {
        return view('pages.tarifs');
    }
    public function conditionsGenerales()
    {
        return view('pages.conditions_generales');
    }
    public function confidentialite()
    {
        return view('pages.confidentialite');
    }
    public function contact()
    {
        return view('pages.contact');
    }
    public function fonctionnement()
    {
        return view('pages.fonctionnement');
    }
    public function faq()
    {
        return view('pages.faq');
    }
    public function ourValues()
    {
        return view('pages.our_values');
    }
    public function whoAreWe()
    {
        return view('pages.who_are_we');
    }
    public function becomeEscort()
    {
        return view('pages.become_escort');
    }
    public function escortsCasting()
    {
        return view('pages.casting_escort');
    }
    public function testimonials()
    {
        return view('pages.testimonials');
    }
    public function escortGlossary()
    {
        return view('pages.escort_glossary');
    }
    public function blog()
    {
        return view('pages.blog');
    }
    public function communityMember()
    {
        return view('pages.community_member');
    }
}
