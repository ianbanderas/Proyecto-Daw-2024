<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <title>Document</title>
</head>
<body>


<x-guest-layout>

    <x-auth-card>
        <x-slot name="logo">
    <img id="myImage" >
        </x-slot>
            

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('message.Name')" />

                <x-text-input id="email" class="block mt-1 w-full" type="text" name="nombre" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('message.Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center font-semibold">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm">{{ __('message.Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                 <a class="underline text-sm font-semibold hover:text-gray-900 mr-4 a-color" href="{{ route('register') }}">
                        {{ __('message.Register') }}
                    </a>
                <!--
                @if (Route::has('password.request'))
                    <a class="underline text-sm font-semibold hover:text-gray-900 a-color" href="{{ route('password.request') }}">
                        {{ __('message.Forgot your password?') }}
                    </a>
                @endif
                -->
                <x-primary-button class="ml-3">
                    {{ __('message.Log in') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

</body>
</html>


    <script src="{{ asset('js\hola.js')}}"> </script>
