<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function searchUser(Request $request){
        $user_list = Users::where('email', 'like', '%'.$request->text.'%')
            ->orWhere('fname', 'like', '%'.$request->text.'%')
            ->orWhere('sname', 'like', '%'.$request->text.'%')
            ->get();

        $contents = Content::where('navBarDisplay', 'y')->where('priv', '<=', session('priv') ?? 0)->get();
        return view('userAdministration', ['contents' => $contents, 'user_list' => $user_list]);
    }

    function addUser(Request $request){
        $image_path = $request->file('avatar')->store('images', 'public');

        $user = new Users;
        $user->email = $request->email;
        $user->pw = Hash::make($request->password);
        $user->fname = $request->fname;
        $user->sname = $request->sname;
        $user->priv = $request->priv;
        $user->active = $request->active;
        $user->avatar = $image_path;
        $user->save();

        $successMsg = "Records Inserted Successfully";
        $contents = Content::where('navBarDisplay', 'y')->where('priv', '<=', session('priv') ?? 0)->get();
        return view('userAdministration', ['contents' => $contents, 'successMessage' => $successMsg]);
    }

    function deleteUser($userid){
        $user = Users::find($userid);
        $user->delete();
        
        $successMsg = "Records Deleted Successfully";
        $contents = Content::where('navBarDisplay', 'y')->where('priv', '<=', session('priv') ?? 0)->get();
        return view('userAdministration', ['contents' => $contents, 'successMessage' => $successMsg]);
    }

    function editUser($userid){
        $user = Users::find($userid);

        $contents = Content::where('navBarDisplay', 'y')->where('priv', '<=', session('priv') ?? 0)->get();
        return view('editUser', ['contents' => $contents, 'user' => $user]);
    }

    function submitEditUser(Request $request){
        $image_path = $request->file('avatar')->store('images', 'public');

        $user = Users::find($request->id);
        $user->email = $request->email;
        $user->pw = Hash::make($request->password);
        $user->fname = $request->fname;
        $user->sname = $request->sname;
        $user->priv = $request->priv;
        $user->active = $request->active;
        $user->avatar = $image_path;
        $user->save();

        $successMsg = "Records Inserted Successfully";
        $contents = Content::where('navBarDisplay', 'y')->where('priv', '<=', session('priv') ?? 0)->get();
        return view('userAdministration', ['contents' => $contents, 'successMessage' => $successMsg]);
    }
}
