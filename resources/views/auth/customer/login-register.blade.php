@extends('auth.layouts.master')

@section('title', 'ورود به سایت')

@section('content')
    <form method="post" action="{{ route('auth.customer.login-register-store') }}" class="vh-100 d-flex justify-content-center align-items-center pb-5">
        @csrf
        <section class="login-wrapper mb-5">
            <section class="login-logo">

                <img src="{{ asset('assets/images/logo/4.png') }}" alt="">
            </section>

            <section class="login-title ">ورود و ثبت نام</section>
            @include('auth.layouts.partials.error')

            <section class="login-input-text">
                <input type="text" class="mb-2 mt-2"name="id" value="{{ old('id') }}"
                    placeholder="ایمیل / شماره خود را وارد کنید">
            </section>

            <section class="login-btn d-grid g-2"><button class="btn btn-danger">تایید</button></section>
    </form>
@endsection
