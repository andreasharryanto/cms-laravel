<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    function login(Request $request) {
        $this->validation($request);

        $user = Users::where('email', $request->email)->first();
        if(isset($user)){
            if(Hash::check($request->password, $user->pw)){
                session(['userid' => $user->id, 'priv' => $user->priv]);
                return redirect(route('profile', ['userid' => $user->id]));
            }
            else{
                $hm = 'wrong password';
                var_dump($hm);
            }
        }
        else{
            $hm = "wrong email";
            var_dump($hm);
        }
    }

    function validation(Request $request){
        return $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
    }

    function logout(){
        session()->forget('priv');
        session()->forget('userid');
        Auth::logout();
        return redirect('index');
    }
}
