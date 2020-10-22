@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
           <img class="img-fluid rounded-circle" src="{{ Config::get('app.url').'/storage/'}}{{$user->profile->image ?? 'profiles/vHQ88cC5PHdIwvUz8HS5UYVCjawZVB756Oki8YNB.jpeg'}}">
        </div>
        <div class="col-md-8 py-4">
            <div class="d-flex justify-content-between">
                <h2>{{ $user->profile->title }}</h2>
            <div><button-component user-id="{{$user->id}}" follows="{{ $follows }}"></button-component></div>
            </div>
            <div>
                @can('update', $user->profile)
                    <a class="btn btn-primary btn-sm" href="{{ route('profile.edit', $user->id) }}">Edit Profile</a>                    
                @endcan
            </div>
            <div>
                <span class="mr-3"><strong>{{ $postsCount }}</strong> posts</span>
                <follower-count-component ref="followercountcomponent" count="{{ $followersCount }}"></follower-count-component>
                <span class="mr-3"><strong>{{ $followingCount }}</strong> following</span>   
            </div>
            <p class="mt-4"><strong><a href="{{ $user->profile->url }}">{{ $user->profile->url }}</a></strong></p>
            <p class="card-text" style="width: 30rem;">{{ $user->profile->description }}</p>
        </div>
    </div>
    <div class="row my-5">
        @if (count($user->posts) > 0)
            @foreach ($user->posts as $post)
                <div class="col-md-4 mb-4"><a href="{{ route('post.show', $post->id) }}"><img class="img-fluid" src="{{ Config::get('app.url').'/storage/'.$post->image }}"></a></div>
            @endforeach
        @else
        <div class="alert alert-warning">This profile has no public posts to show.</div>
        @endif
       
    </div>
</div>
@endsection
