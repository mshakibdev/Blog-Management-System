<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class BlogController extends Controller
{
    public function index()
    {
        // fetching all post from database
        $posts = Post::all();
        
        return view('layouts.blog-home',compact('posts'));
    }
    
    public function postDetails($id)
    {
        $post = Post::findOrfail($id);
    
        // for showing post
    
        return view('post',compact('post'));
        
        
    }
//    public function postListByUser($id)
//    {
//        $users = User::findOrfail($id);
//
//        // for showing post
//
//        return view('post-list',compact('users'));
//
//
//    }
    
    
}
