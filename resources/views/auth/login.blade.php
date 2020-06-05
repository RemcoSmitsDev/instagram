@extends('layouts.app')

@section('content')

<div class="flex items-center justify-center h-screen">

    <div class=" md:block hidden">
        <div class="relative">
            <img src="https://www.instagram.com/static/images/homepage/home-phones.png/43cc71bb1b43.png" alt="">
            <div class="absolute top-0 right-0 mt-24 pt-1 mr-16">
                <img src="https://www.instagram.com/static/images/homepage/screenshot1.jpg/d6bf0c928b5a.jpg" alt="">
            </div>
        </div>
    </div>
    <div class="">
        <div class="bg-white border px-10">

            <div class="p-5 flex justify-center">
                <h1 class="text-4xl italic font-semibold">Instagram</h1>
            </div>
            <form class="space-y-2 bg-white" method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <input id="email" type="email"
                        class="text-sm w-64 px-4 py-2 border rounded appearance-none @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div>
                    <input id="password" type="password"
                        class="text-sm w-64 px-4 py-2 rounded border appearance-none @error('password') is-invalid @enderror"
                        name="password" required placeholder="Wachtwoord" autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="">
                    <button type="submit" class="w-full mt-3 px-4 py-1 rounded bg-blue-400 text-white font-medium">
                        Aanmelden
                    </button>
                </div>
                <div>
                    <div class="mt-4 flex items-center">
                        <div class="border h-px w-full">
                        </div>
                        <span class="-mt-1 mx-4 font-semibold text-sm text-gray-500">Of</span>
                        <div class="border h-px w-full">
                        </div>
                    </div>
                </div>
                <div class="text-sm pb-4 text-center">
                    @if (Route::has('password.request'))
                    <a class="" href="{{ route('password.request') }}">
                        Wachtwoord vergeten?
                    </a>
                    @endif
                </div>
            </form>
        </div>

        <div class="mt-4 p-5 text-sm flex items-center justify-center bg-white border px-10">
            <span>Geen account?<a class="ml-1 text-indigo-600" href="/register">Registreer je dan.</a></span>
        </div>
    </div>
</div>
@endsection
