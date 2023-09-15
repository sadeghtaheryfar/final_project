@extends('layout.master')


@section('title')
    cart page
@endsection
@section('content')

 <!-- start body -->
 <section class="">
    <section id="main-body-two-col" class="container-xxl body-container">
        <section class="row">
            <aside id="sidebar" class="sidebar col-md-3">


                <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
                    <!-- start sidebar nav-->
                    @include('profile.layout.sidebar')
                    <!--end sidebar nav-->
                </section>

            </aside>
            <main id="main-body" class="main-body col-md-9">
                <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

                    <!-- start vontent header -->
                    <section class="content-header mb-4">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>اطلاعات حساب</span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>
                    <!-- end vontent header -->

                   
                    <form  method="POST" enctype="multipart/form-data" action="{{route('myProfile.updateMyProfile')}}">
                        @csrf
                       @method('put')
                    <section class="row">
                        <section class="col-6 border-bottom mb-2 py-2">
                            <section class="field-title">نام</section>
                            <section>
                            <input type="text"  value={{Auth::user()->first_name}} name="first_name" class="form-control form-control-sm" id="first_name" placeholder="نام ...">
                             </section>

                             <section class="field-title"> نام خانوادگی</section>
                            <section>
                             <input type="text"  value={{Auth::user()->last_name}} name="last_name" class="form-control form-control-sm" id="first_name" placeholder=" نام خانوادگی...">
                              </section>

                              <section class="field-title"> شماره تلفن همراه</section>
                              <section>
                              <input type="text"  value={{Auth::user()->mobile}} name="mobile" @disabled(true) class="disabled form-control form-control-sm" id="first_name" placeholder="ایمیل ...">
                              </section>
                       
                              <section class="field-title">ایمیل</section>
                              <section>
                              <input type="text"  value={{Auth::user()->email}} name="email" @disabled(true) class="disabled form-control form-control-sm" id="first_name" placeholder="ایمیل ...">
                              </section>

                              <section class="field-title">کد ملی</section>
                              <section>
                              <input type="text"  value={{Auth::user()->national_code}} name="national_code" class="form-control form-control-sm" id="first_name" placeholder="کد ملی ...">
                              </section>



                    </section>

                    <button type="submit" class="btn btn-sm btn-primary">به روز رسانی</button>


                </section>
            </form>
            </main>
        </section>
    </section>
</section>
<!-- end body -->


@endsection