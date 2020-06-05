@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center h-screen max-w-3xl mx-auto space-y-10">
    <div class="flex items-center justify-center">
        <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PATCH')
            <div class="text-center mb-4">
                <h1 class="text-3xl">Edit profile</h1>
            </div>
            <div class="">
                <label for="title" class="mr-2 text-md">title</label>
                <input id="title" type="text" class="py-1 rounded-md border @error('title') is-invalid @enderror"
                    name="title" value="{{ old('title') ?? $user->profile->title }}" required autocomplete="title"
                    autofocus>
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="">
                <label for="description" class="mr-2 text-md">description</label>
                <textarea id="description" type="text"
                    class="py-1 rounded-md border @error('description') is-invalid @enderror" name="description"
                    autocomplete="description"
                    autofocus>{{ old('description') ?? $user->profile->description }}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="">
                <label for="url" class="mr-2 text-md">url</label>
                <input id="url" type="text" class="py-1 rounded-md border @error('url') is-invalid @enderror" name="url"
                    value="{{ old('url') ?? $user->profile->url}}" autocomplete="url" autofocus>
                @error('url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div>
                <label for="image" class="mr-2 text-md">profile image</label>
                <input class="" type="file" name="image" id="image">
                @error('image')
                <strong>{{ $message }}</strong>
                @enderror
            </div>
            <div>
                <button class="py-1 px-4 bg-blue-400 text-white rounded-lg" type="submit">Save profile</button>
            </div>
        </form>

    </div>
</div>
@endsection
