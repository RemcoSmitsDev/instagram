@extends('layouts.app')

@section('content')
<div id="app" class="flex items-center justify-center h-screen max-w-3xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 shadow w-full overflow-x-hidden">
        <div class="w-full">
            <img class="max-w-sm" src="/storage/{{ $post->image }}" alt="">
        </div>
        <div class=" divide-y">
            <span class="p-2 flex item-center justify-between">
                <a class="inline-flex items-center" href="/profile/{{ $post->user->id }}">
                    <img class="mr-3 w-12 h-12 rounded-full shadow" src="{{ $post->user->profile->profileImage() }}"
                        alt="">
                    <h3 class="text-lg font-semibold">{{ $post->user->username }}</h3>
                </a>
                <like-btn :post="{{ $post->id }}"></like-btn>
                @can('update', $post->user->profile)
                <span class="px-3 inline-flex items-center text-indigo-500">
                    <a href="/p/{{ $post->id }}/edit">Edit post</a>
                </span>
                @endcan
            </span>
            <div class="p-3">
                <p class="text-sm">{{ $post->caption }}</p>
            </div>

        </div>
    </div>

</div>
@endsection
