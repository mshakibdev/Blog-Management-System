<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsCreateRequest;
use App\Photo;
use App\Post;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // fetching all post from database
        $posts = Post::all();
    
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // here showing category option in  'create post page' for user so that he/she can choose the category
        // for post
        $category = Category::lists('name','id')->all();
        return view('admin.posts.create',compact('category'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        $user = Auth::user();//authenticating user if login or not
        
        $input=$request->all();
        
        //storing photo for each post with validation
        
        if($file = $request->file('photo_id')){
    
            $name = time().$file->getClientOriginalName();
    
            $file ->move('images',$name);
    
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id']= $photo->id;
        
        }
        $user->post()->create($input);
        return redirect('admin/posts');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.posts.show');
    
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrfail($id);
        
        // for editing category
        $category = Category::lists('name','id')->all();
    
        return view('admin.posts.edit',compact('post','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
        $input=$request->all();
        //storing photo for each post with validation
    
        if($file = $request->file('photo_id')){
        
            $name = time().$file->getClientOriginalName();
        
            $file ->move('images',$name);
        
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id']= $photo->id;
        }
        
        // only logged in valid user can update their post
        
        Auth::user()->post()->whereId($id)->first()->update($input);
        return redirect('admin/posts');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =Post::findOrFail($id);
        
        //with deleting user we are removing the public path of the photo in image folder
        unlink(public_path() . $post->photo->file );
        $post->delete();
        return redirect('admin/posts');
    }
}
