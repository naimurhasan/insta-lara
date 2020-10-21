@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-2">
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group row">
                        <label for="caption" class="col-md-4 col-form-label text-md-right">{{ __('Caption: ') }}</label>

                        <div class="col-md-6">
                            <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

                            @error('caption')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image: ') }}</label>

                        <div class="col-md-6">
                            <input id="image" type="file" accept="image/*" class="form-control-file mt-1 @error('image') is-invalid @enderror" name="image" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <input type="submit" class="btn btn-primary" value="Create Post">
                        </div>
                    </div>

            </form>
        </div>
    </div>
</div>
@endsection
