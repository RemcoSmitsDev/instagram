<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{


    public function index()
    {
        if (Auth::check()) {
            $users = Auth::User()->following()->pluck('profiles.user_id');
            $posten = Auth::User()->posts()->pluck('user_id');

            $posts = Post::whereIn('user_id', $users)->with('user')->latest()->get();

            $posts2 = Post::whereIn('user_id', $posten)->with('user')->latest()->get();
            $users = User::all();
            // dd($users);

            return view('posts.index', compact('posts', 'posts2', 'users'));
        } else {
            $posts = Post::orderBy('created_at', 'desc')->get();
            $users = User::all();

            return view('posts.index', compact('posts', 'users'));
        }
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"));
        $image->save();

        Auth::User()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . Auth::User()->id);
    }

    public function show(\App\Post $post)
    {
        return view('posts.show', compact('post'));
    }


    public function edit(\App\Post $post)
    {
        $this->authorize('update', $post->user->profile);
        return view('posts.edit', compact('post'));
    }

    public function update(\App\Post $post)
    {
        $this->authorize('update', $post->user->profile);
        $data = request()->validate([
            'image' => '',
            'caption' => 'required',
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('uploads', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"));
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        Auth::User()->posts()->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/p/{$post->id}");
    }


    public function like(Request $request)
    {
        $post = Post::find($request->post);
        $value = $post->like;
        $post->like = $value + 1;
        $post->save();
        return response()->json([
            'message' => 'Thanks',
        ]);
    }
    public function getlike(Request $request)
    {
        $post = Post::find($request->post);
        return response()->json([
            'post' => $post,
        ]);
    }
}
