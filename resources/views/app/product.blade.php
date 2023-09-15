@extends('layout.master')


@section('title')
    cart page
@endsection
@section('content')
    
<main id="main-body-one-col" class="main-body">

    <!-- start cart -->
    <section class="mb-4">
        <section class="container-xxl" >
            <section class="row">
                <section class="col">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>نمایش محصولات </span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>

            @foreach ($products as $product)
                
        
                    <section class="row mt-4">
                        <!-- start image gallery -->
                        <section class="col-md-4">
                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">
                                <section class="product-gallery">
                                    <section class="product-gallery-selected-image mb-3">
                                        <img src="{{asset($product->image)}}" alt="">
                                    </section>
                                </section>
                            </section>
                        </section>
                        <!-- end image gallery -->

                        <!-- start product info -->
                        <section class="col-md-5">

                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                <!-- start vontent header -->
                                <section class="content-header mb-3">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            {{$product->name}}
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <section class="product-info">

                                    <p><span>رنگ : قهوه ای</span></p>
                                    <p>
                                        <span style="background-color: #523e02;" class="product-info-colors me-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="قهوه ای تیره"></span>
                                        <span style="background-color: #0c4128;" class="product-info-colors me-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="سبز یشمی"></span>
                                        <span style="background-color: #fd7e14;" class="product-info-colors me-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="نارنجی پرتقالی"></span>
                                    </p>
                                    <p><i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i> <span> گارانتی اصالت و سلامت فیزیکی کالا</span></p>
                                    <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>{{$product->marketable_number}}کالا موجود در انبار</span></p>
                                    <p><a class="btn btn-light  btn-sm text-decoration-none" href="{{route('products.AddToFavorite',$product)}}"><i class="fa fa-heart text-danger"></i> افزودن به علاقه مندی</a></p>
                                    <section>
                                        {{-- <section class="cart-product-number d-inline-block ">
                                            <button class="cart-number-down" type="button">-</button>
                                            <input class="" type="number" min="1" max="5" step="1" value="1" readonly="readonly">
                                            <button class="cart-number-up" type="button">+</button>
                                        </section> --}}
                                    </section>
                                    <p><a class="btn btn-light  btn-sm text-decoration-none" href="{{route('products.show',$product)}}"><i class="fa fa-hand-o-left text-danger"></i> نمایش مشخصات محصول</a></p>
                                    
                                </section>
                            </section>

                        </section>
                        <section class="col-md-3">
                            <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">قیمت کالا</p>
                                    <p class="text-muted">{{round($product->price)}} <span class="small">تومان</span></p>
                                </section>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">تخفیف کالا</p>
                                    <p class="text-danger fw-bolder">000 <span class="small">تومان</span></p>
                                </section>

                                <section class="border-bottom mb-3"></section>

                                <section class="d-flex justify-content-end align-items-center">
                                    <p class="fw-bolder">{{round($product->price)}} <span class="small">تومان</span></p>
                                </section>

                                <section class="">
                                    <a id="next-level" href="{{route('cartItem.storeToCartItem',$product)}}" class="btn btn-danger d-block">افزودن به سبد خرید</a>
                                </section>
                                

                            </section>
                        </section>

                        @endforeach
                    </section>
                </section>
            </section>

        </section>
    </section>
    <!-- end cart -->



    <!-- start product lazy load -->
  
    <!-- end description, features and comments -->

</main>


@endsection