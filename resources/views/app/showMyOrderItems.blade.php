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
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                {{-- <span>تاریخچه سفارشات</span> --}}
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>
                    <!-- end vontent header -->


                    <!-- start content header -->
                    <section class="content-header mb-3">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title content-header-title-small">
                                لیست اقلام سفارشات
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>
                    <!-- end content header -->


                    <section class="order-wrapper">

                        @foreach ($order->orderItems as $orderItem)
                            <section class="order-item">
                                <section class="d-flex justify-content-between">
                                    <section>
                                        <section class="order-item-date"><i class="fa fa-calendar-alt"></i> نام محصول {{$orderItem->product->name}}</section>
                                        <section class="order-item-id"><i class="fa fa-id-card-alt"></i>قیمت محصول :{{ round($orderItem->product->price) }}</section>
                                        <section class="order-item-status"><i class="fa fa-clock"></i>گروه محصول  {{ $orderItem->product->category->name}}</section>
                                    </section>

                                    <section class="order-item-products">
                                        <img src="{{asset($orderItem->product->image)}}" width="100" height="100" alt="">
                                    </section>
                        </section>
                        @endforeach
                    </section>


                </section>
            </main>
        </section>
    </section>
</section>
<!-- end body -->


@endsection