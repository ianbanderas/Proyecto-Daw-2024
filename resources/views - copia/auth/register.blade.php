<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Document</title>
</head>
<body>

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <form method="POST" action="{{ route('registrar') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('message.Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="nombre" :value="old('name')" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

          

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('message.Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="pass"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('message.Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm font-semibold hover:text-gray-900 mr-4 a-color" href="{{ route('login') }}">
                    {{ __('message.Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('message.Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
</body>
</html>