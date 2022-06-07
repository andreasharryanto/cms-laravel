<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    function searchContent(Request $request){
        $content_list = Content::where('title', 'like', '%'.$request->text.'%')
            ->orWhere('h1', 'like', '%'.$request->text.'%')
            ->orWhere('link', 'like', '%'.$request->text.'%')
            ->orWhere('navBarText', 'like', '%'.$request->text.'%')
            ->get();
        $content_list = $content_list->where('active', '=', 'y')->all();
        $contents = Content::where('navBarDisplay', 'y')->where('priv', '<=', session('priv') ?? 0)->get();
        return view('pageManagement', ['contents' => $contents, 'content_list' => $content_list]);
    }

    function addContent(Request $request){

    }

    function deleteContent($cid){
        $content = Content::find($cid);
        $content->delete();
        
        $successMsg = "Records Deleted Successfully";
        $contents = Content::where('navBarDisplay', 'y')->where('priv', '<=', session('priv') ?? 0)->get();
        return view('pageManagement', ['contents' => $contents, 'successMessage' => $successMsg]);
    }

    function editContent($cid){
        var_dump($cid);
    }
    
    function submitEditContent(Request $request){

    }
}
