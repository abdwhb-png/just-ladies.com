<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function register()
    {
        return view('Users.Members.register');
    }

    public function error()
    {
        return back()->withStatus(__('ERREUR pour le membre : Vous ne pouvez pas créer un compte.'));
    }
}
