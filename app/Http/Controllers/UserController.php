<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function getDetail(){
        $user = Auth::user();
        return response()->json(
            ["user"=>$user ]
        );
    }
    function logout(){
        $user = Auth::logout();
        return redirect('/');
    }
}
