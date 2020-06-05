@extends('layouts.app')

@section('content')
<div id="app" class="mt-20 container max-w-3xl mx-auto">
    <div class="my-12 pl-4 py-4 flex items-baseline justify-start overflow-x-auto space-x-6 bg-white">
        @foreach($users as $user)
        <a href="/profile/{{ $user->id }}">
            <div class="flex flex-col items-center rounded-full">
                <div class="relative p-px instagram-border rounded-full">
                    <div class="rounded-full p-px bg-white overflow-hidden shadow-lg">
                        <img class="h-10 w-10 rounded-full flex-no-wrap" src="{{ $user->profile->profileImage() }}"
                            alt="">
                    </div>
                </div>
                <span>
                    <h3>{{ $user->name }}</h3>
                </span>
            </div>
        </a>
        @endforeach
    </div>
    <div class="sm:flex justify-center mb-20">

        <div class="md:space-y-10">

            @foreach($posts as $post)
            <div class="shadow border rounded overflow-hidden max-w-xl divide-y bg-white">

                <div class=" divide-y">
                    <span class="py-2 px-4 flex item-center justify-between">
                        <a class="inline-flex items-center" href="/profile/{{ $post->user->id }}">
                            <img class="mr-3 w-8 h-8 rounded-full shadow"
                                src="{{ $post->user->profile->profileImage() }}" alt="">
                            <div>
                                <h3 class="text-sm font-semibold">{{ $post->user->name }}</h3>
                                <h3 class="text-xs">{{ $post->user->username }}</h3>
                            </div>
                        </a>
                        <dropdown post-id="{{ $post->id }}" post-caption="{{ $post->caption }}"></dropdown>
                    </span>
                </div>
                <div class="w-full h-auto">
                    <a href="/p/{{ $post->id }}">
                        <img src="/storage/{{$post->image}}" alt="">
                    </a>
                    <div class="flex items-center px-4 py-2 space-x-3">
                        <like-btn post="{{ $post->id }}" liked="{{ $post->like }}"></like-btn>
                        <comment-btn user-id="{{ $post->user_id }}" post-id="{{ $post->id }}"></comment-btn>

                    </div>
                </div>
                <div class="p-3">
                    <p class="text-sm">{{ $post->caption }}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>

</div>
@endsection
