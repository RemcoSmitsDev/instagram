@extends('layouts.app')

@section('content')

<div class="flex justify-center items-center h-screen">

    <div class=" md:block hidden" hover:border-indigo-600>
        <div class="relative">
            <img src="https://www.instagram.com/static/images/homepage/home-phones.png/43cc71bb1b43.png" alt="">
            <div class="absolute top-0 right-0 mt-24 pt-1 mr-16">
                <img src="https://www.instagram.com/static/images/homepage/screenshot1.jpg/d6bf0c928b5a.jpg" alt="">
            </div>
        </div>
    </div>
    <div>
        <div class="bg-white border px-10">

            <div class="p-5 flex justify-center">
                <h1 class="text-4xl italic font-semibold">Instagram</h1>
            </div>
            <form class="space-y-2 bg-white" method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <input id="username" type="username"
                        class="text-sm w-64 px-4 py-2 border rounded hover:border-blue-400 appearance-none @error('username') is-invalid @enderror"
                        name="username" value="{{ old('username') }}" required autocomplete="username"
                        placeholder="Gebruikersnaam">

                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div>
                    <input id="name" type="text"
                        class="text-sm w-64 px-4 py-2 border rounded hover:border-blue-400 appearance-none @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Volledige naam">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div>
                    <input id="email" type="email"
                        class="text-sm w-64 px-4 py-2 border rounded hover:border-blue-400 appearance-none @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div>
                    <input id="password" type="password"
                        class="text-sm w-64 px-4 py-2 border rounded hover:border-blue-400 appearance-none @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" placeholder="Wachtwoord">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div>
                    <input id="password-confirm" type="password"
                        class="text-sm w-64 px-4 py-2 border rounded hover:border-blue-400 appearance-none"
                        name="password_confirmation" required autocomplete="new-password"
                        placeholder="Herhaal wachtwoord">
                </div>

                <div>
                    <button type="submit" class="w-full mt-3 mb-4 px-4 py-1 rounded bg-blue-400 text-white font-medium">
                        Registreren
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-4 p-5 text-sm flex items-center justify-center bg-white border px-10">
            <span>Al een account?<a class="ml-1 text-indigo-600" href="/login">Log dan in.</a></span>
        </div>
    </div>
</div>
@endsection
