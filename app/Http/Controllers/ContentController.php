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
        $content = new Content;
        $content->title = $request->title;
        $content->h1 = $request->h1;
        $content->link = $request->link;
        $content->navBarText = $request->navBarText;
        $content->navBarDisplay = $request->navBarDisplay;
        $content->navBarOrder = 1;
        $content->includes = $request->includes;
        $content->content = $request->content;
        $content->priv = $request->priv;
        $content->dtg = time();
        $content->active = $request->active;
        $content->save();

        $successMsg = "Records Inserted Successfully";
        $contents = Content::where('navBarDisplay', 'y')->where('priv', '<=', session('priv') ?? 0)->get();
        return view('pageManagement', ['contents' => $contents, 'successMessage' => $successMsg]);
    }

    function deleteContent($cid){
        $content = Content::find($cid);
        $content->delete();
        
        $successMsg = "Records Deleted Successfully";
        $contents = Content::where('navBarDisplay', 'y')->where('priv', '<=', session('priv') ?? 0)->get();
        return view('pageManagement', ['contents' => $contents, 'successMessage' => $successMsg]);
    }

    function editContent($cid){
        $content = Content::find($cid);

        $contents = Content::where('navBarDisplay', 'y')->where('priv', '<=', session('priv') ?? 0)->get();
        return view('editContent', ['contents' => $contents, 'content' => $content]);
    }
    
    function submitEditContent(Request $request){
        $content = Content::find($request->id);
        $content->title = $request->title;
        $content->h1 = $request->h1;
        $content->content = $request->content;
        $content->link = $request->link;
        $content->navBarText = $request->navBarText;
        $content->includes = $request->includes;
        $content->priv = $request->priv;
        $content->navBarDisplay = $request->navBarDisplay;
        $content->active = $request->active;
        $content->save();

        $successMsg = "Records Inserted Successfully";
        $contents = Content::where('navBarDisplay', 'y')->where('priv', '<=', session('priv') ?? 0)->get();
        return view('pageManagement', ['contents' => $contents, 'successMessage' => $successMsg]);
    }
}
