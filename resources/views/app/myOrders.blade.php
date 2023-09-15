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
                                <span>تاریخچه سفارشات</span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>
                    <!-- end vontent header -->


                    <section class="d-flex justify-content-center my-4">
                        <a class="btn btn-info btn-sm mx-1" href="{{route('myOrders',$filter='1')}}">مشاهده همه</a>
                        <a class="btn btn-success btn-sm mx-1" href="{{route('myOrders',$filter='2')}}">ارسال با پست</a>
                        <a class="btn btn-warning btn-sm mx-1" href="{{route('myOrders',$filter='3')}}">ارسال با پیک</a>
                        
                    </section>


                    <!-- start content header -->
                    <section class="content-header mb-3">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title content-header-title-small">
                                لیست سفارشات
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>
                    <!-- end content header -->


                    <section class="order-wrapper">
                        
                    @if(isset($myOrders))
                    
                        @foreach ($myOrders as $myOrder)
                            
                      
                        <section class="order-item">
                            <section class="d-flex justify-content-between">
                                <section>
                                    <section class="order-item-date"><i class="fa fa-calendar-alt"></i>{{ jdate($myOrder->created_at) }}</section>
                                    <section class="order-item-id"><i class="fa fa-id-card-alt"></i>کد سفارش : {{$myOrder->payment->transaction_id}}</section>
                                    <section class="order-item-status"><i class="fa fa-clock"></i> {{$myOrder->order_status==1?'تحویل داده شده':'در مسیر'}} </section>
                                    <section class="order-item-products">
                                        @foreach ($myOrder->orderItems as $orderItem)
                                        <a href="#"><img src="{{asset($orderItem->product->image)}}" alt=""></a>
                                        @endforeach
                                    </section>
                                </section>
                                <section class="order-item-link"><a href="{{route('myOrder.myOrderItems',$myOrder)}}">نمایش جزییات سفارش</a></section>
                            </section>
                        </section>


                        @endforeach
                            
                        @else
                        
                        <div>{{$orderMessage}}</div>

                        @endif

                       
                    </section>


                </section>
            </main>
        </section>
    </section>
</section>
<!-- end body -->


@endsection