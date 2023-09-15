{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}



@extends('auth.layouts.master')

@section('title', 'ثبت نام در سایت')
    
@section('content')


<form method="post" action="{{ route('register') }}"  class="vh-100 d-flex justify-content-center align-items-center pb-5">
    @csrf
    <section class="login-wrapper mb-5">
        <section class="login-logo">
           
            <img src="{{ asset('assets/images/logo/4.png') }}" alt="">
        </section>

        <section class="login-title">ثبت نام </section>
        @include('auth.layouts.partials.error')

        {{-- <section class="login-info">نام  خود را وارد کنید</section> --}}
        <section class="login-input-text">
            <input type="text" class="mb-2 mt-2" name="first_name" value="{{ old('first_name') }}" placeholder="نام خود را وارد کنید">
        </section>
        {{-- <section class="login-info">نام خانوادگی خود را وارد کنید</section> --}}
        <section class="login-input-text">
            <input type="text" class="mb-2" name="last_name" value="{{ old('last_name') }}" placeholder="نام  خانوادگی خود را وارد کنید">
        </section>

        {{-- <section class="login-info">ایمیل خود را وارد کنید</section> --}}
        <section class="login-input-text">
            <input type="text" class="mb-2"name="email" value="{{ old('email') }}" placeholder="ایمیل خود را وارد کنید" >
        </section>

        {{-- <section class="login-info">شماره موبایل خود را وارد کنید</section> --}}
        <section class="login-input-text">
            <input type="text" class="mb-2" name="mobile" value="{{ old('mobile') }}" placeholder="موبایل خود را وارد کنید">
        </section>



        {{-- <section class="login-info">پسورد خود را وارد کنید</section> --}}
        <section class="login-input-text">
            <input type="password" class="mb-2" name="password"  placeholder="پسورد خود را وارد کنید">
        </section>
        {{-- <section class="login-info">پسورد خود را مجددا وارد  کنید</section> --}} 
     <section class="login-input-text">
            <input type="password" class="mb-2" name="password_confirmation"  placeholder="پسورد را مجددا وارد کنید" >
        </section> 


        <section class="login-btn d-grid g-2"><button class="btn btn-danger">ورود به آمازون</button></section>
        <section class="login-terms-and-conditions"><a href="#">شرایط و قوانین</a> را خوانده ام و پذیرفته ام</section>
    </section>
</form>


@endsection