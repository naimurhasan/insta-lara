@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body pb-2"><h4 class="card-title">Home</h4></div>
            </div>
        </div>
    </div>
    <div class="row my-1">
        @if (count($posts) > 0)
            @foreach ($posts as $post)
                <div class="col-md-4 mb-4"><a href="{{ route('post.show', $post->id) }}"><img class="img-fluid" src="{{ Config::get('app.url').'/storage/'.$post->image }}"></a></div>
            @endforeach
        @else
        <div class="alert alert-warning">No posts two show. Please follow some profiles. (/profile/{user_id})</div>
        @endif
    </div>
    {{ $posts->links() }}

</div>
@endsection
