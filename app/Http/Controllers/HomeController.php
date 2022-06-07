<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    // Main page
    function index() {
        // $content = Content::find(410);
        // $users = DB::table('users')->find(74);
        // var_dump($users->email, $content->title);
        $contents = Content::where('navBarDisplay', 'y')->where('priv', '<=', session('priv') ?? 0)->get();
        return view('index', ['contents' => $contents]);
    }

    // Profile page
    function profile($userid){
        $user = Users::find($userid);
        $contents = Content::where('navBarDisplay', 'y')->where('priv', '<=', session('priv') ?? 0)->get();

        return view('profile', ['contents' => $contents, 'user' => $user]);
    }

    function editProfile(Request $request){
        $this->validationEditProfile($request);

        $image_path = $request->file('avatar')->store('images', 'public');

        $user = Users::find($request->id);
        $user->email = $request->email;
        $user->pw = Hash::make($request->password);
        $user->fname = $request->fname;
        $user->sname = $request->sname;
        $user->avatar = $image_path;
        $user->save();
    }

    function validationEditProfile(Request $request){
        return $request->validate([
            'email' => 'required',
            'password' => 'required',
            'fname' => 'required',
            'sname' => 'required',
            'avatar' => 'required|image'
        ]);
    }

    // manage pages
    function pageAdministration(){
        $contents = Content::where('navBarDisplay', 'y')->where('priv', '<=', session('priv') ?? 0)->get();
        return view('pageManagement', ['contents' => $contents]);
    }

    // manage users
    function userAdministration(){
        $contents = Content::where('navBarDisplay', 'y')->where('priv', '<=', session('priv') ?? 0)->get();
        return view('userAdministration', ['contents' => $contents]);
    }

    // About us, Service page
    function pageManagement($cid){
        $page = Content::find($cid);
        $contents = Content::where('navBarDisplay', 'y')->where('priv', '<=', session('priv') ?? 0)->get();
        return view('pageManagement', ['contents' => $contents, 'page' => $page]);
    }
}
