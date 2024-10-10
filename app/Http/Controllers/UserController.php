<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function login(Request $request){
        $email=$request->email;
        $password=$request->password;

           $k=Auth::attempt(['email'=>$email,'password'=>$password]);

        if($k){
            $user = Auth::user();
            $userArray = $user->getAttributes();
            Session::put('user_data', [$userArray]);
            return redirect('dashboard');
        }
        else{
            $msg="Invalid login";
            return view('login', compact('msg'));
        }
    }
    public function view($id){
         $userInfo=User::where('id',$id)->first();
        return view ('Admin.Profile',compact('userInfo'));
    }

    public function edit($id,Request $request){
        $userInfo = User::find($id);
        $userInfo->first_name = $request->input('first_name');
        $userInfo->last_name = $request->input('last_name');
        $userInfo->role=$request->input('role');
        $userInfo->contact_no=$request->input('contact_no');
        $userInfo->email = $request->input('email');

        $userInfo->save();
        
 
        $userInfo=User::where('id',$id)->first();
        return view ('Admin.Profile',compact('userInfo'));
    }

    public function password($id,Request $request){
        $userInfo=User::find($id);
        
        if (!$userInfo) {
            return back()->withErrors(['error' => 'User not found.']);
        }
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'newpassword' => 'required',
            'renewpassword' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        if (!Hash::check($request->input('password'), $userInfo->password)) {
            return back()->withErrors(['password' => 'The current password is incorrect.']);
        }

        $userInfo->password = bcrypt($request->input('newpassword'));
        
        $userInfo->save();

        $userInfo=User::where('id',$id)->first();
      
        return view ('Admin.Profile',compact('userInfo'));
    }

    }

