@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
        <img class="img-fluid" src="{{ Config::get('app.url').'/storage/'.$post->image }}">
        </div>
        <div class="col-md-5">
            <h2>{{ $post->caption }}</h2>
        <p><a href="{{ route('profile.show', $post->user_id)}}">{{'@'.$post->user->username}}</p>
        </div>
</div>
@endsection
