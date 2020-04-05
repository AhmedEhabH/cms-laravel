<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
        //

        // upload the image
        $image = $request->image->store('images/posts');
        // $request->image->move(public_path('images/posts'), $image);

        // create the post
        Post::create([
            "title" => $request->title,
            "description" => $request->description,
            "content" => $request->content,
            "image" => $image,
            "publish_at" => $request->publish_at,
        ]);

        // flash images
        session()->flash('success', 'Post created successfully.');

        // redirect user
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('posts.create')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
        $data = $request->only('title', 'description', 'published_at', 'content');

        // Check if new image
        // // upload it
        // // delete old one
        if($request->hasFile('image')){
            $image = $request->image->store('image/posts');

            if(Storage::exists($post->path)){
                Storage::delete($post->image);
            }

            $data['image'] = $image;
        }

        // update attributes
        $post->update($data);

        // flash message
        session()->flash("success", "Post updated successfully");

        // redirect user
        return redirect(route('posts.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if($post->trashed()){
            if(Storage::exists($post->image))
            {
                Storage::delete($post->image);
            }
            $post->forceDelete();
        } else {
            $post->delete();
        }

        // flash images
        session()->flash('success', 'Post deleted successfully.');

        // redirect user
        return redirect(route('posts.index'));
    }

    /**
     * Desplay a list of all trashed posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $trashed = Post::withTrashed()->get();

        return view('posts.index')->withPosts($trashed); // withPosts($trashed); === with('posts', $trashed);
    }
}
