<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    function login(Request $request){
        $email=$request->email;
        $password=$request->password;

           $k=Auth::attempt(['email'=>$email,'password'=>$password]);

        if($k){
            return redirect('dashboard');
        }
        else{
            $msg="Invalid login";
            return view('login', compact('msg'));
        }
    }

    }

