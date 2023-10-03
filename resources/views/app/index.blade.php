@extends('layout.master')

@section('title')
    home
@endsection

@section('content')
    <main id="main-body-one-col" class="main-body">

        <!-- start slideshow -->
        <section class="container-xxl my-4">
            <section class="row">
                <section class="col-md-8 pe-md-1 ">
                    <section id="slideshow" class="owl-carousel owl-theme">
                        @forelse ($banners as $banner)
                            <section class="item">
                                <a class="w-100 d-block h-auto text-decoration-none" href="{{ $banner->url }}">
                                    <img class="w-100 rounded-2 d-block h-auto" src="{{ asset($banner->image) }}" alt="">
                                </a>
                            </section>
                        @empty
                            
                        @endforelse
                    </section>
                </section>
                <section class="col-md-4 ps-md-1 mt-2 mt-md-0">
                    <section class="mb-2"><a href="#" class="d-block"><img class="w-100 rounded-2"
                                src="assets/images/slideshow/12.gif" alt=""></a></section>
                    <section class="mb-2"><a href="#" class="d-block"><img class="w-100 rounded-2"
                                src="assets/images/slideshow/11.jpg" alt=""></a></section>
                </section>
            </section>
        </section>
        <!-- end slideshow -->

        <!-- start product lazy load -->
        <section class="mb-3">
            <section class="container-xxl">
                <section class="row">
                    <section class="col">
                        <section class="content-wrapper bg-white p-3 rounded-2">
                            <!-- start vontent header -->
                            <section class="content-header">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title">
                                        <span>پربازدیدترین کالاها</span>
                                    </h2>
                                    <section class="content-header-link">
                                        <a href="#">مشاهده همه</a>
                                    </section>
                                </section>
                            </section>
                            <!-- start vontent header -->
                            <section class="lazyload-wrapper">
                                <section class="lazyload light-owl-nav owl-carousel owl-theme">

                                    @foreach ($last_products as $product)
                                        <section class="item">
                                            <section class="lazyload-item-wrapper">
                                                <section class="product">
                                                    <section class="product-add-to-cart"><a
                                                            href="{{ route('cartItem.storeToCartItem', $product) }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="left"
                                                            title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a>
                                                    </section>
                                                    <section class="product-add-to-favorite"><a
                                                            href="{{ route('cartItem.addTOMyFavourite', $product) }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="left"
                                                            title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a>
                                                    </section>
                                                    <a class="product-link" href="{{ route('products.show', $product) }}">
                                                        <section class="product-image">
                                                            <img class="" src="{{ asset($product->image) }}"
                                                                alt="">
                                                        </section>
                                                        <section class="product-colors"></section>
                                                        <section class="product-name">
                                                            <h3>{{ Str::limit($product->name, 15) }}</h3>
                                                        </section>
                                                        <section class="product-price-wrapper">
                                                            <section class="product-discount">
                                                                <span
                                                                    class="product-old-price">{{ round($product->price) }}</span>
                                                                <span class="product-discount-amount">10%</span>
                                                            </section>
                                                            <section class="product-price">{{ round($product->price) }}
                                                                تومان</section>
                                                        </section>
                                                        <section class="product-colors">
                                                            <section class="product-colors-item"
                                                                style="background-color: white;"></section>
                                                            <section class="product-colors-item"
                                                                style="background-color: blue;"></section>
                                                            <section class="product-colors-item"
                                                                style="background-color: red;"></section>
                                                        </section>
                                                    </a>
                                                </section>
                                            </section>
                                        </section>
                                    @endforeach
                                </section>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
        <!-- end product lazy load -->



        <!-- start ads section -->
        <section class="mb-3">
            <section class="container-xxl">
                <!-- two column-->
                <section class="row py-4">
                    <section class="col-12 col-md-6 mt-2 mt-md-0"><img class="d-block rounded-2 w-100"
                            src="assets/images/ads/two-col-1.jpg" alt=""></section>
                    <section class="col-12 col-md-6 mt-2 mt-md-0"><img class="d-block rounded-2 w-100"
                            src="assets/images/ads/two-col-2.jpg" alt=""></section>
                </section>

            </section>
        </section>
        <!-- end ads section -->


        <!-- start product lazy load -->
        <section class="mb-3">
            <section class="container-xxl">
                <section class="row">
                    <section class="col">
                        <section class="content-wrapper bg-white p-3 rounded-2">
                            <!-- start vontent header -->
                            <section class="content-header">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title">
                                        <span>پیشنهاد آمازون به شما</span>
                                    </h2>
                                    <section class="content-header-link">
                                        <a href="#">مشاهده همه</a>
                                    </section>
                                </section>
                            </section>
                            <!-- start vontent header -->
                            <section class="lazyload-wrapper">
                                <section class="lazyload light-owl-nav owl-carousel owl-theme">

                                    @foreach ($suggestion_products as $product)
                                        <section class="item">
                                            <section class="lazyload-item-wrapper">
                                                <section class="product">
                                                    <section class="product-add-to-cart"><a
                                                            href="{{ route('cartItem.storeToCartItem', $product) }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="left"
                                                            title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a>
                                                    </section>
                                                    <section class="product-add-to-favorite"><a
                                                            href="{{ route('cartItem.addTOMyFavourite', $product) }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="left"
                                                            title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a>
                                                    </section>
                                                    <a class="product-link" href="{{ route('products.show', $product) }}">
                                                        <section class="product-image">
                                                            <img class="" src="{{ asset($product->image) }}"
                                                                alt="">
                                                        </section>
                                                        <section class="product-colors"></section>
                                                        <section class="product-name">
                                                            <h3>{{ Str::limit($product->name, 15) }}</h3>
                                                        </section>
                                                        <section class="product-price-wrapper">
                                                            <section class="product-discount">
                                                                <span
                                                                    class="product-old-price">{{ round($product->price) }}</span>
                                                                <span class="product-discount-amount">10%</span>
                                                            </section>
                                                            <section class="product-price">{{ round($product->price) }}
                                                                تومان</section>
                                                        </section>
                                                        <section class="product-colors">
                                                            <section class="product-colors-item"
                                                                style="background-color: white;"></section>
                                                            <section class="product-colors-item"
                                                                style="background-color: blue;"></section>
                                                            <section class="product-colors-item"
                                                                style="background-color: red;"></section>
                                                        </section>
                                                    </a>
                                                </section>
                                            </section>
                                        </section>
                                    @endforeach

                                </section>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
        <!-- end product lazy load -->


        <!-- start ads section -->
        <section class="mb-3">
            <section class="container-xxl">
                <!-- one column -->
                <section class="row py-4">
                    <section class="col"><img class="d-block rounded-2 w-100" src="assets/images/ads/one-col-1.jpg"
                            alt=""></section>
                </section>

            </section>
        </section>
        <!-- end ads section -->



        <!-- start brand part-->
        <section class="brand-part mb-4 py-4">
            <section class="container-xxl">
                <section class="row">
                    <section class="col">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex align-items-center">
                                <h2 class="content-header-title">
                                    <span>برندهای ویژه</span>
                                </h2>
                            </section>
                        </section>
                        <!-- start vontent header -->
                        <section class="brands-wrapper py-4">
                            <section class="brands dark-owl-nav owl-carousel owl-theme">
                                <section class="item">
                                    <section class="brand-item">
                                        <a href="#"><img class="rounded-2" src="assets/images/brand/huawei.jpg"
                                                alt=""></a>
                                    </section>
                                </section>
                                <section class="item">
                                    <section class="brand-item">
                                        <a href="#"><img class="rounded-2" src="assets/images/brand/adata.png"
                                                alt=""></a>
                                    </section>
                                </section>
                                <section class="item">
                                    <section class="brand-item">
                                        <a href="#"><img class="rounded-2" src="assets/images/brand/casio.jpg"
                                                alt=""></a>
                                    </section>
                                </section>
                                <section class="item">
                                    <section class="brand-item">
                                        <a href="#"><img class="rounded-2" src="assets/images/brand/gplus.jpg"
                                                alt=""></a>
                                    </section>
                                </section>
                                <section class="item">
                                    <section class="brand-item">
                                        <a href="#"><img class="rounded-2" src="assets/images/brand/logitech.jpg"
                                                alt=""></a>
                                    </section>
                                </section>
                                <section class="item">
                                    <section class="brand-item">
                                        <a href="#"><img class="rounded-2" src="assets/images/brand/nokia.jpg"
                                                alt=""></a>
                                    </section>
                                </section>
                                <section class="item">
                                    <section class="brand-item">
                                        <a href="#"><img class="rounded-2" src="assets/images/brand/pakshoma.png"
                                                alt=""></a>
                                    </section>
                                </section>
                                <section class="item">
                                    <section class="brand-item">
                                        <a href="#"><img class="rounded-2" src="assets/images/brand/panasonic.png"
                                                alt=""></a>
                                    </section>
                                </section>
                                <section class="item">
                                    <section class="brand-item">
                                        <a href="#"><img class="rounded-2" src="assets/images/brand/parskhazar.png"
                                                alt=""></a>
                                    </section>
                                </section>
                                <section class="item">
                                    <section class="brand-item">
                                        <a href="#"><img class="rounded-2" src="assets/images/brand/samsung.png"
                                                alt=""></a>
                                    </section>
                                </section>
                                <section class="item">
                                    <section class="brand-item">
                                        <a href="#"><img class="rounded-2" src="assets/images/brand/snowa.png"
                                                alt=""></a>
                                    </section>
                                </section>
                                <section class="item">
                                    <section class="brand-item">
                                        <a href="#"><img class="rounded-2" src="assets/images/brand/xvision.png"
                                                alt=""></a>
                                    </section>
                                </section>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
        <!-- end brand part-->

    </main>
@endsection
