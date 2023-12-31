<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class PostsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $users = auth()->user()->following()->pluck('profiles.user_id');
    $posts = Post::whereIN('user_id', $users)->latest()->paginate(5);
    return view('posts.index', compact('posts'));
  }

  public function create()
  {
    return view('posts.create');
  }

  public function store()
  {
    $data = request()->validate([
      'caption' => ['required'],
      'media' => ['required', 'image'],
    ]);

    $mediaPath = request('media')->store('uploads', 'public');
    $image = Image::make(public_path("storage/{$mediaPath}"))->fit(1200, 1200);
    $image->save();

    auth()->user()->posts()->create([
      'caption' => $data['caption'],
      'media' => $mediaPath,
    ]);

    return redirect('/profile/' . auth()->user()->id);
  }

  public function show(Post $post)
  {
    return view('posts.show', compact('post'));
  }

}
