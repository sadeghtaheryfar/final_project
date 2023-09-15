{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
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
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>



 --}}



@extends('auth.layouts.master')

@section('title', 'بازیابی پسورد')
    
@section('content')


<form method="post" action="{{ route('password.store') }}"  class="vh-100 d-flex justify-content-center align-items-center pb-5">
    @csrf
     <!-- Password Reset Token -->
     <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <section class="login-wrapper mb-5">
        <section class="login-logo">
           
            <img src="{{ asset('assets/images/logo/4.png') }}" alt="">
        </section>

        <section class="login-title ">رمز جدید</section>
        @include('auth.layouts.partials.error')



        <section class="login-input-text">
            <input type="text" class="mb-2 mt-2"name="email" value="{{old('email', $request->email)}}"  placeholder="ایمیل خود را وارد کنید" >
        </section>

        <!-- Password -->
        <section class="login-input-text">
            <input type="password" class="mb-2" name="password" value="{{old('Password')}}"  placeholder="پسورد جدید خود را وارد کنید">
        </section>

         <!-- Confirm Password -->
         <section class="login-input-text">
            <input type="password" class="mb-2" name="password_confirmation"  value="{{old('Confirm Password')}}" placeholder="پسورد جدید خود را تکرار کنید">
        </section>

        <section class="login-btn d-grid g-2"><button class="btn btn-danger">بازیابی پسورد</button></section>

    </section>
</form>


@endsection