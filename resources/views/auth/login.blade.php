{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}






@extends('auth.layouts.master')

@section('title', 'ورود به سایت')

@section('content')


    <form method="post" action="{{ route('login') }}" class="vh-100 d-flex justify-content-center align-items-center pb-5">
        @csrf
        <section class="login-wrapper mb-5">
            <section class="login-logo">

                <img src="{{ asset('assets/images/logo/4.png') }}" alt="">
            </section>

            <section class="login-title ">ورود</section>
            @include('auth.layouts.partials.error')


            <section class="login-input-text">
                <input type="text" class="mb-2 mt-2"name="email" value="{{ old('email') }}"
                    placeholder="ایمیل خود را وارد کنید">
            </section>

            <section class="login-input-text">
                <input type="password" class="mb-2" name="password" placeholder="پسورد خود را وارد کنید">
            </section>


            <section class="login-btn d-grid g-2"><button class="btn btn-danger">ورود به آمازون</button></section>

            <section class="login-terms-and-conditions">


                <a class="btn btn-primary" href="{{ route('password.request') }}" role="button">
                    بازیابی پسورد
                </a>
                <a class="btn btn-primary" href="{{ route('register') }}" role="button">
                    حساب کاربری ندارید ؟
                </a>


            </section>
        </section>
    </form>


@endsection