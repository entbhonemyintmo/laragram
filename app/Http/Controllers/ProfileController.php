<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{
  public function index(User $user)
  {
    $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
    return view('profiles.index', compact('user', 'follows'));
  }

  public function edit(User $user)
  {
    $this->authorize('update', $user->profile);
    return view('profiles.edit', compact('user'));
  }

  public function update(User $user)
  {
    $this->authorize('update', $user->profile);
    $data = request()->validate([
      'title' => ['string', 'required'],
      'description' => ['string', 'required'],
      'url' => ['url', 'nullable'],
      'media' => ['image', 'nullable']
    ]);

    if (request('media')) {
      $mediaPath = request('media')->store('profiles', 'public');
      $image = Image::make(public_path("storage/{$mediaPath}"))->fit(1200, 1200);
      $image->save();

      $imageArray = ['media' => $mediaPath];
    }

    auth()->user()->profile->update(array_merge(
      $data,
      $imageArray ?? []
    ));
    return redirect("/profile/{$user->id}");
  }
}
