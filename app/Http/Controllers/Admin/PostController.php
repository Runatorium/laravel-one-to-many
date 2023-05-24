<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {
        return view('admin.posts.create');
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:15',
                'content' => 'nullable|max:300',
                'thumb' => 'nullable|max:300',
            ]
        );
        $form_data = $request->all();
        $newPost = new Post();
        $newPost->fill($form_data);
        $newPost->save();

        return redirect()->route('admin.posts.index');
    }


    public function show($post)
    {
        $post = Post::findOrFail($post);
        return view('admin.posts.post', compact('post'));
    }


    public function edit(Post $post)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate(
            [
                'title' => 'required|15',
                'content' => 'nullable|300',
                'thumb' => 'nullable|300',
            ]
        );
        $form_data = $request->all();
        $post->update($form_data);

        return redirect()->route('admin.posts.index');
    }


    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}