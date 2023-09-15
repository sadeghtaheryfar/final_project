{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> 

 --}}




@extends('auth.layouts.master')

@section('title', 'فراموشی رمز عبور')
    
@section('content')


<form method="post" action="{{ route('password.email') }}"  class="vh-100 d-flex justify-content-center align-items-center pb-5">
    @csrf
    <section class="login-wrapper mb-5">
        <section class="login-logo">
           
            <img src="{{ asset('assets/images/logo/4.png') }}" alt="">
        </section>

        <section class="login-title ">فراموشی رمز ورود</section>
        @include('auth.layouts.partials.error')


        <section class="login-input-text">
            <input type="text" class="mb-2 mt-2"name="email" value="{{ old('email') }}" placeholder="ایمیل خود را وارد کنید" >
        </section>



        <section class="login-btn d-grid g-2">
            <button class="btn btn-danger">باز یابی </button>
        </section>

        <section class="login-terms-and-conditions">


               
        
        </section>
    </section>
</form>


@endsection