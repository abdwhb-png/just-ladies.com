<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function register()
    {
        return view('Users.Members.register');
    }

    public function xxx()
    {
        $error = 'ERREUR (action non autorisé) : Vous ne pouvez pas créer un compte!';
        return view('members-registration')->with('error', $error);
    }
}
