<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$request->validate([
            'body'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
   
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        $input['image'] = auth()->user()->profile_image;
    
        Comment::create($input);
   
        return back();
    }
}
