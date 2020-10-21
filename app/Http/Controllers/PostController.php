<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use \App\Models\Post;
class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $users = auth()->user()->following->pluck('user_id');
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(3);
        return view('posts.index', compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }

    public function show(Post $post){
        
        return view('posts.show', compact('post'));
    }

    public function store(){

        $data = request()->validate([
            'caption' => 'required | string | max:250',
            'image' => 'required | image'
        ]);
        
        $imagePath = request('image')->store('uploads', 'public');
         
        $img = Image::make(public_path('storage/'.$imagePath))->orientate()->fit(600, 600);
        $img->save();

        Auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);

        return redirect()->route('profile.show', auth()->user()->id);
    }
}
