@extends('layouts.app')

@section('content')
<div id="app" class="mt-20 container max-w-3xl mx-auto space-y-10">
    <div class="grid grid-cols-3 md:p-4 md:space-x-10 ">
        <div class="flex justify-center md:items-center">
            <div class="h-20 w-20 md:h-32 md:w-32 rounded-full overflow-hidden shadow">
                <img class="w-full h-full" src="{{ $user->profile->profileImage() }}">
            </div>
        </div>

        <div class="space-y-4 col-span-2">

            <div class="flex items-center space-x-3">
                <h1 class="text-2xl">{{ $user->username }}</h1>
                @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit profiel</a>
                <a href="/p/create">Add post</a>
                @else
                <follow-btn user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-btn>
                @endcan
            </div>

            <div class="flex items-center space-x-8 md:space-x-10 text-sm">
                <span class="flex md:flex-row flex-col items-center"><span
                        class="mr-1 font-semibold">{{ $postCount }}</span>
                    posts</span>
                <span class="flex md:flex-row flex-col items-center"><span
                        class="mr-1 font-semibold">{{ $followersCount }}</span>
                    followers</span>
                <span class="flex md:flex-row flex-col items-center"><span
                        class="mr-1 font-semibold">{{ $followingCount }}</span>
                    following</span>
            </div>
            <div class="w-full pr-4 -ml-24 md:ml-0">
                <h3 class="font-semibold">{{ $user->profile->title }}</h3>
                <p class="text-sm">{{ $user->profile->description }}</p>
                <a class="text-sm font-semibold text-indigo-900"
                    href="{{ $user->profile->url }}">{{ $user->profile->url }}</a>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-3 md:gap-6">
        @foreach($user->posts as $post)
        <div class="border-r border-b border-white h-auto w-full shadow overflow-hidden">
            <a class="md:h-64 h-32 md:w-auto w-64" href="/p/{{ $post->id }}">
                <div class="md:h-64 h-32 md:w-auto w-64 bg-cover bg-center bg-no-repeat"
                    style="background-image:url(/storage/{{$post->image}});">


                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
