<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
  public function index(User $user)
  {
    return view('profiles.index', compact('user'));
  }

  public function edit(User $user)
  {
    // dd($user);
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
      // 'media' => ['image', 'nullable']
    ]);

    auth()->user()->profile->update($data);
    return redirect("/profile/{$user->id}");
  }


}
