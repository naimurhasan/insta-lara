<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use App\Models\User;

class ProfileController extends Controller
{   
    public function edit(User $user){
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user){
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required | string | max:250',
            'description' => 'required',
            'url' => 'nullable | url',
            'image' => 'image'
        ]);
        
        if( request('image') ){
            $imgPath = request('image')->store('profiles', 'public');

            $img = Image::make(public_path('storage/'.$imgPath))->fit(800, 800);
            $img->save();
            $data = array_merge($data, ['image'=> $imgPath]);
        }

        auth()->user()->profile->update($data);

        return redirect()->route('profile.show', auth()->user()->id);
    }

    public function show($user)
    {   
        $user = User::findOrFail($user);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postsCount = Cache::remember('post_count_'.$user->id, now()->addSeconds(30), function() use($user){
            return $user->posts->count();
        });

        $followersCount = Cache::remember('followers_count_'.$user->id, now()->addSeconds(30), function() use($user){
            return $user->profile->followers->count();
        });

        $followingCount = Cache::remember('followers_count_'.$user->id, now()->addSeconds(30), function() use($user){
            return $user->following->count();
        });

        return view('profiles.show', compact('user', 'follows', 'postsCount', 'followersCount', 'followingCount'));
    }

}
