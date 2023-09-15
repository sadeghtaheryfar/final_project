{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>

 --}}



@extends('auth.layouts.master')

@section('title', 'تایید ایمیل')
    
@section('content')


<form method="post" action="{{ route('verification.send') }}"  class=" vh-100 d-flex justify-content-center align-items-center pb-5">
    @csrf
    <section class="login-wrapper mb-5">
        <section class="login-logo">
           
            <img src="{{ asset('assets/images/logo/4.png') }}" alt="">
        </section>

        <section class="login-title ">در انتظار تایید ایمیل</section>
        @include('auth.layouts.partials.error')


        <div class="mb-4 text-sm text-gray-600 ">
            {{ __('از ثبت نام شما سپاسگزاریم! قبل از شروع، آیا می توانید آدرس ایمیل خود را با کلیک کردن روی پیوندی که به تازگی برای شما ایمیل کرده ایم تأیید کنید؟ اگر ایمیلی را دریافت نکردید، با کمال میل یک ایمیل دیگر برای شما ارسال خواهیم کرد.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 alert-danger">
            {{ __('یک پیوند تأیید جدید به آدرس ایمیلی که هنگام ثبت نام ارائه کرده اید ارسال شده است.') }}
        </div>
        @endif

        <div class="mt-4 flex items-center justify-between ">
            <div class="d-inline-block">
                <form  method="POST" action="{{ route('verification.send') }} ">
                    @csrf
        
                    <div>
                        <button class="btn btn-info">ایمیل تایید را دوباره بفرست</button>
                    </div>
                </form>    
            </div>
            <div class="d-inline-block">
                   {{-- log out --}}
                <form  method="POST" action="{{ route('logout') }}">
                    @csrf
                        <button type="submit" class="btn btn-danger ">
                               خروج
                        </button>
                </form>    
            </div>


        
        </div>
        {{-- <section class="login-btn d-grid g-2"><button class="btn btn-danger">ورود به آمازون</button></section> --}}

        <section class="login-terms-and-conditions">

           
                    {{-- <a  class="btn btn-primary" href="#" role="button">
                            ارسال مجدد ایمیل
                    </a> --}}

               
        
        </section>
    </section>
</form>
<form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit" class="text-decoration-none text-white bg-transparent border-0">logout</button>
</form>


@endsection