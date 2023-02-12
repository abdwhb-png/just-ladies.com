<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo(){
        $admin = Role::where('name', 'admin')->first();
        $author = Role::where('name', 'author')->first();
        $escort = Role::where('name', 'escort')->first();
        $member = Role::where('name', 'member')->first();
        if(Auth::user()){

            User::where('id', Auth::id())
                ->update(['active_status' => 1]);

            if(Auth::user()->role_id == $admin->id){
                return ('/admin');
            }elseif (Auth::user()->role_id == $author->id) {
                return ('/admin');
            }elseif (Auth::user()->role_id == $escort->id) {
                return ('users/escort');
            }elseif (Auth::user()->role_id == $member->id) {
                return ('users/member');
            }
        }else{
             return ('/');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
