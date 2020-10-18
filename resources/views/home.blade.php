@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <img class="img-fluid rounded-circle" src="https://naimurhasan.github.io/img/personal.jpg">
        </div>
        <div class="col-md-8 py-4">
            <h2>{{ $user->username }}</h2>
            <div>
                <span class="mr-3"><strong>32</strong> posts</span>
                <span class="mr-3"><strong>324</strong> followers</span>
                <span class="mr-3"><strong>154</strong> following</span>   
            </div>
            <p class="mt-4"><strong><a href="https://naimurhasan.github.io">naimurhasan.github.io</a></strong></p>
            <p class="card-text" style="width: 30rem;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, soluta nihil mollitia illum placeat voluptatum.</p>
        </div>
    </div>
    <div class="row my-5">
        <div class="col-md-4"><img class="img-fluid" src="https://naimurhasan.github.io/img/gallery/project-1.jpg"></div>
        <div class="col-md-4"><img class="img-fluid" src="https://naimurhasan.github.io/img/gallery/project-2.jpg"></div>
        <div class="col-md-4"><img class="img-fluid" src="https://naimurhasan.github.io/img/gallery/project-3.jpg"></div>
    </div>
</div>
@endsection
