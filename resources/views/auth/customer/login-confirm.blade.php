@extends('auth.layouts.master')

@section('title', 'ورود به سایت')

@section('content')
    <form method="post" action="{{ route('auth.customer.login-confirm-store',$token) }}" class="vh-100 d-flex justify-content-center align-items-center pb-5">
        @csrf
        <section class="login-wrapper mb-5">
            <section class="login-logo">

                <img src="{{ asset('assets/images/logo/4.png') }}" alt="">
            </section>

            <section class="login-title mb-2">
                <a href="{{ route('auth.customer.login-register-form') }}">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </section>

            <section class="login-title">
                <span>کد تایید را وارد نمایید</span>
            </section>

            <section class="login-info">
                @if ($otp->type == 1)
                    <span>کد تایید برای شماره موبایل {{ $otp->login_id }} ارسال شد .</span>
                @else
                    <span>کد تایید برای ایمیل {{ $otp->login_id }} ارسال شد .</span>
                @endif
            </section>
            @include('auth.layouts.partials.error')

            <section class="login-input-text">
                <input type="text" class="mb-2 mt-2" name="otp"
                    placeholder="کد تایید ارسال شده شده را وارد کنید">
            </section>

            <section class="login-btn d-grid g-2"><button class="btn btn-danger">ورود به امازون </button></section>
        </section>
    </form>
@endsection
