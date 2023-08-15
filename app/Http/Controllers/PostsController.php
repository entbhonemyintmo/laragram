<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
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
    auth()->user()->posts()->create([
      'caption' => $data['caption'],
      'media' => $mediaPath
    ]);

    return redirect('/profile/' . auth()->user()->id);
  }
}
