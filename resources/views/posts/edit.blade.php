@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center h-screen max-w-3xl mx-auto space-y-10">
    <form action="/p/{{ $post->id }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
        <div class="">
            <div>
                <label for="image" class="mr-2 text-md">{{ __('Post image') }}</label>
                <input class="" type="file" name="image" id="image" value="{{ old('image') ?? $post->image }}">
                @error('image')
                <strong>{{ $message }}</strong>
                @enderror
            </div>
            <label for="caption" class="mr-2 text-md">{{ __('Image caption') }}</label>
            <textarea id="caption" type="username" class="py-1 rounded-md border @error('caption') is-invalid @enderror"
                name="caption" required autocomplete="caption" autofocus>
                {{ old('caption') ?? $post->caption }}
            </textarea>
            @error('caption')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div>
            <button class="py-1 px-4 bg-blue-400 text-white rounded-lg" type="submit">Opslaan</button>
        </div>
    </form>
</div>
@endsection
