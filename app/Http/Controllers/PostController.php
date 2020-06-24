<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', ['posts' => Post::all()]);    
    }

    public function show(Post $post)
    {
        return view('blog-post', compact('post'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $inputs=request()->validate([ 
            'title' => 'required|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required'
        ]);
        
        if(request('post_image'))
        {
            $inputs['post_image'] =request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);
        session()->flash('created-message', 'Post is created');
        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    } 

    public function delete(Post $post)
    {
        $post->delete();

        session()->flash('message', 'Post is deleted');

        return back();
    }

    public function update(Post $post)
    {
        $inputs=request()->validate([ 
            'title' => 'required|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required'
        ]);
        
        if(request('post_image'))
        {
            $inputs['post_image'] =request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];
        //$post->save();
        auth()->user()->posts()->save($post);
        session()->flash('update-message', 'Post is updated');
        return redirect()->route('posts.index');

    }
}
