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
                                <span>سبد خرید شما</span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>

                    <section class="row mt-4">
                        <section class="mb-3 {{ ($cart==null) ? 'w-full' : 'col-md-9' }}">
                            <section class="content-wrapper bg-white p-3 rounded-2">
                                @if ($cart==null)
                                    <div>سبد خرید شما خالی است</div>
                                @else

                                @foreach ($cart->cartItems as $cartItem)
                                    
                                    <section class="cart-item d-md-flex py-3">
                                        <section class="cart-img align-self-start flex-shrink-1"><img src="{{asset($cartItem->product->image)}}" alt=""></section>
                                        <section class="align-self-start w-100">
                                            <p class="fw-bold">{{$cartItem->product->name}}</p>
                                            <p><span style="background-color: #523e02;" class="cart-product-selected-color me-1"></span> <span> قهوه ای</span></p>
                                            <p><i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i> <span> گارانتی اصالت و سلامت فیزیکی کالا</span></p>
                                            <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>{{$cartItem->product->marketable_number}} - کالا موجود در انبار</span></p>
                                            <section>
                                            
                                                <section class=" d-inline-block ">
                                                    
                                                    {{-- <input class="" name="number" type="number" min="0" max="{{$cartItem->product->marketable_number}}" step="1" value="1"> --}}
                                                
                                                </section>
                                            
                                                <form action="{{ route('cartItem.destroy',$cartItem)}}" class="d-inline text-decoration-none ms-4 cart-delete" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn inline-block btn-danger btn-sm">حذف از سبد</button>
                                                </form>
                                                
                                            </section>
                                        </section>
                                        <section class="align-self-end flex-shrink-1">
                                            <section class="text-nowrap fw-bold">{{ round($cartItem->product->price)}}
                                            تومان</section>
                                        </section>
                                    </section>
                                @endforeach
                            @endif
                            </section>
                        </section>

                        @if ($cart!=null)
                        <section class="col-md-3">
                            <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">تعداد کالاها ({{(Auth::user()->cart!=null)? Auth::user()->cart->cartItems->count():'0'}})</p>
                                    <p class="text-muted">{{$total}} تومان</p>
                                </section>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">تخفیف کالاها</p>
                                    <p class="text-danger fw-bolder">0 تومان</p>
                                </section>
                                <section class="border-bottom mb-3"></section>
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">جمع سبد خرید</p>
                                    <p class="fw-bolder">{{$total}} تومان</p>
                                </section>

                                <p class="my-3">
                                    <i class="fa fa-info-circle me-1"></i>کاربر گرامی  خرید شما هنوز نهایی نشده است. برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت پرداخت این سفارش صورت میگیرد.
                                </p>


                                <section class="">
                                    <a href="{{route('adress.index')}}" class="btn btn-danger d-block">تکمیل فرآیند خرید</a>
                                </section>

                            </section>
                        </section>
                 @endif

                    </section>
                </section>
            </section>

        </section>
    </section>
    <!-- end cart -->




    <section class="mb-4">
        <section class="container-xxl" >
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>کالاهای مرتبط با سبد خرید شما</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- start vontent header -->
                        <section class="lazyload-wrapper" >
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">

                    @foreach ($relatedProducts as $relatedProduct)

                                <section class="item">
                                    <section class="lazyload-item-wrapper">
                                        <section class="product">
                                            <section class="product-add-to-cart"><a href="{{route('cartItem.storeToCartItem',$relatedProduct)}}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                            <section class="product-add-to-favorite"><a href="{{route('cartItem.addTOMyFavourite',$relatedProduct)}}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                            <a class="product-link" href="{{ route('products.show', $relatedProduct) }}">
                                                <section class="product-image">
                                                    <img class="" src="{{asset($relatedProduct->image)}}" alt="">
                                                </section>
                                                <section class="product-name"><h3>{{$relatedProduct->name}}</h3></section>
                                                <section class="product-price-wrapper">
                                                    <section class="product-price">{{ round($relatedProduct->price)}} تومان</section>
                                                </section>
                                                <section class="product-colors">
                                                    <section class="product-colors-item" style="background-color: yellow;"></section>
                                                    <section class="product-colors-item" style="background-color: green;"></section>
                                                    <section class="product-colors-item" style="background-color: white;"></section>
                                                    <section class="product-colors-item" style="background-color: blue;"></section>
                                                    <section class="product-colors-item" style="background-color: red;"></section>
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




</main>


@endsection