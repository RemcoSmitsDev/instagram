@extends('layouts.app')

@section('content')
<div id="app" class="mt-20 container max-w-3xl mx-auto">
    <div class="my-12 px-10 py-4 flex items-center justify-start overflow-x-auto space-x-3 bg-white">
        @foreach($users as $user)
        <a href="/profile/{{ $user->id }}">
            <div class="flex flex-col items-center">

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
                    <span class="p-2 flex item-center justify-between">
                        <a class="inline-flex items-center" href="/profile/{{ $post->user->id }}">
                            <img class="mr-3 w-8 h-8 rounded-full shadow"
                                src="{{ $post->user->profile->profileImage() }}" alt="">
                            <div>
                                <h3 class="text-sm font-semibold">{{ $post->user->name }}</h3>
                                <h3 class="text-xs">{{ $post->user->username }}</h3>
                            </div>
                        </a>
                        <div class="dropdown mt-1 px-3 inline-block text-indigo-500">
                            <button class="inline-flex space-x-px">
                                <span class="rounded-full h-1 w-1 bg-gray-400"></span>
                                <span class="rounded-full h-1 w-1 bg-gray-400"></span>
                                <span class="rounded-full h-1 w-1 bg-gray-400"></span>
                            </button>

                            <div
                                class="-ml-64 dropdown-menu block rounded overflow-y-hidden absolute hidden text-gray-700 bg-white">
                                <div class="p-5 flex flex-col">
                                    <span>
                                        <h3 class="text-gray-600 text-lg">Deel bericht</h3>
                                        <input class="px-4 py-1 bg-gray-300 select-all" type="text"
                                            value="localhost:8000/p/{{ $post->id }}">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </span>
                </div>
                <div class="w-full h-auto">
                    <a href="/p/{{ $post->id }}">
                        <img src="/storage/{{$post->image}}" alt="">
                    </a>
                    <div class="flex items-center px-4 py-2 space-x-3">
                        <button>
                            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                        </button>
                        <button>
                            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                        </button>
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
