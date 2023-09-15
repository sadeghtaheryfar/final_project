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
                                <span>{{$product->name}} </span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>

                    <section class="row mt-4">
                        <!-- start image gallery -->
                        <section class="col-md-4">
                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">
                                <section class="product-gallery">
                                    <section class="product-gallery-selected-image mb-3">
                                        <img src="{{asset($product->image)}}" alt="">
                                    </section>
                                    <section class="product-gallery-thumbs">

                                        <img class="product-gallery-thumb" src="{{asset($product->image)}}" alt="" data-input="{{asset($product->image)}}">

                                        @foreach ($product->images as $image)
                                            <img class="product-gallery-thumb" src="{{asset($image->image)}}" alt="" data-input="{{asset($image->image)}}">
                                        @endforeach
                                        
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
                                    <p><a class="btn btn-light  btn-sm text-decoration-none" href="{{route('products.AddToComparison',$product)}}"><i class="fa fa-bookmark	text-danger"></i> افزودن به لیست مقایسه</a></p>
                                    <p class="mb-3 mt-5">
                                        <i class="fa fa-info-circle me-1"></i>کاربر گرامی  خرید شما هنوز نهایی نشده است. برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت پرداخت این سفارش صورت میگیرد. پس از ثبت سفارش کالا بر اساس نحوه ارسال که شما انتخاب کرده اید کالا برای شما در مدت زمان مذکور ارسال می گردد.
                                    </p>
                                </section>
                            </section>

                        </section>
                        <!-- end product info -->

                        <section class="col-md-3">
                            <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">قیمت کالا</p>
                                    <p class="text-muted">{{ round($product->price)}} <span class="small">تومان</span></p>
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
                    </section>
                </section>
            </section>

        </section>
    </section>
    <!-- end cart -->



    <!-- start product lazy load -->
    <section class="mb-4">
        <section class="container-xxl" >
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>کالاهای مرتبط</span>
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
                                            <section class="product-add-to-favorite"><a href="{{route('products.AddToFavorite',$relatedProduct)}}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                            <a class="product-link" href="{{ route('products.show', $relatedProduct) }}">
                                                <section class="product-image">
                                                    <img class="" src="{{asset($relatedProduct->image)}}" alt="">
                                                </section>
                                                <section class="product-name"><h3>{{$relatedProduct->name}}</h3></section>
                                                <section class="product-price-wrapper">
                                                    <section class="product-price">{{$relatedProduct->price}} تومان</section>
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
    <!-- end product lazy load -->

    <!-- start description, features and comments -->
    <section class="mb-4">
        <section class="container-xxl" >
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start content header -->
                        <section id="introduction-features-comments" class="introduction-features-comments">
                            <section class="content-header">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title">
                                        <span class="me-2"><a class="text-decoration-none text-dark" href="#introduction">معرفی</a></span>
                                        <span class="me-2"><a class="text-decoration-none text-dark" href="#features">ویژگی ها</a></span>
                                        <span class="me-2"><a class="text-decoration-none text-dark" href="#comments">دیدگاه ها</a></span>
                                        <span class="me-2"><a class="text-decoration-none text-dark" href="#score">امتیاز</a></span>
                                    </h2>
                                    <section class="content-header-link">
                                        <!--<a href="#">مشاهده همه</a>-->
                                    </section>
                                </section>
                            </section>
                        </section>
                        <!-- start content header -->

                        <section class="py-4">

                            <!-- start vontent header -->
                            <section id="introduction" class="content-header mt-2 mb-4">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title content-header-title-small">
                                        معرفی
                                    </h2>
                                    <section class="content-header-link">
                                        <!--<a href="#">مشاهده همه</a>-->
                                    </section>
                                </section>
                            </section>
                            <section class="product-introduction mb-4">
                                خلاصه کتاب اثر مرکب «انتخاب‌های شما تنها زمانی معنی دار است که آنها را به دلخواه به رؤیاهای خود متصل کنید. انتخاب‌های شایسته و انگیزشی، همان‌هایی هستند که شما به عنوان هدف خود و هسته اصلی زندگی خود در بالاترین ارزش‌های خود تعین می‌کنید. شما باید چیزی را بخواهید و می‌دانید که چرا شما آن را می‌خواهید یا به راحتی می‌توانید آن از دست بدهید.» «اولین گام در جهت تغییر، آگاهی است. اگر می‌خواهید از جایی که هستید به جایی که می‌خواهید بروید، باید با درک انتخاب‌هایی که شما را از مقصد مورد نظر خود دور می‌کنند، شروع کنید.» «فرمول کامل برای به دست آوردن خوش شانسی: آماده‌سازی (رشد شخصی) + نگرش (باور / ذهنیت) + فرصت (چیز خوبی که راه را هموار می‌کند) + اقدام (انجام کاری در مورد نظر) = شانس» «ما همه می‌توانیم انتخاب‌های بسیار خوبی داشته باشیم. ما می‌توانیم همه چیز را کنترل کنیم. این در توانایی ماست که همه چیز را تغییر دهیم. به جای اینکه غرق در گذشته شویم، باید دوباره انرژی خود را جمع کنیم، می‌توانیم از تجربیات گذشته برای حرکت‌های مثبت و سازنده استفاده کنیم.» برای ایجاد تغییر، ما نیاز به این داریم که عادات و رفتار خوب را ایجاد کنیم، که در کتاب از آن به عنوان تکانش یاد می شود. تکانش بدین معنی که با ریتم منظم و دائمی و ثبات قدم همراه باشید. حرکت های افراطی و تفریطی، موضع های عجله ای و جوگیر شدن و عدم ریتم مناسب موجب خواهد شد که ثبات قدم نداشته باشیم و حتی شاید از مسیر اصلی دور شویم و تکانش ما با لرزه های فراوان و یا حتی سکون و سکوت مواجه شود. واقعیت رهرو آن است که آهسته و پیوسته رود اینجا پدیدار می گردد و باید همیشه بدانیم هیچ چیز مثل عدم ثبات قدم و نداشتن ریتم مناسب در زمان تغییر، نمی تواند تکانش را با مشکل مواجه کند! متن بالا شاید بهترین خلاصه ای باشد که می شود از کتاب نوشت!
                            </section>

                            <!-- start vontent header -->
                            <section id="features" class="content-header mt-2 mb-4">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title content-header-title-small">
                                        ویژگی ها
                                    </h2>
                                    <section class="content-header-link">
                                        <!--<a href="#">مشاهده همه</a>-->
                                    </section>
                                </section>
                            </section>
                            <section class="product-features mb-4 table-responsive">
                                <table class="table table-bordered border-white">
                                    @forelse ($product->features as $feature)
                                        <tr>
                                            <td>{{ $feature->title }}</td>
                                            <td>{{ $feature->description }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>این محصول فاقد ویژگی خاصی می باشد . </td>
                                        </tr>
                                    @endforelse
                                </table>
                            </section>

                            <!-- start vontent header -->
                            <section id="comments" class="content-header mt-2 mb-4">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title content-header-title-small">
                                        دیدگاه ها
                                    </h2>
                                    <section class="content-header-link">
                                        <!--<a href="#">مشاهده همه</a>-->
                                    </section>
                                </section>
                            </section>
                            <section class="product-comments mb-4">

                                @auth
                                <section class="comment-add-wrapper">
                                    <button class="comment-add-button" type="button" data-bs-toggle="modal" data-bs-target="#add-comment" ><i class="fa fa-plus"></i> افزودن دیدگاه</button>
                                    <!-- start add comment Modal -->
                                        <section class="modal fade" id="add-comment" tabindex="-1" aria-labelledby="add-comment-label" aria-hidden="true">
                                            <section class="modal-dialog">
                                                <section class="modal-content">
                                                    <section class="modal-header">
                                                        <h5 class="modal-title" id="add-comment-label"><i class="fa fa-plus"></i> افزودن دیدگاه</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </section>
                                                    <section class="modal-body">
                                                        <form class="row" method="POST" enctype="multipart/form-data" action="{{route('products.storeComment',$product)}}">
                                                            @csrf
                                                            <section class="col-12 mb-2">
                                                                <label for="comment" class="form-label mb-1">دیدگاه شما</label>
                                                                <textarea name="comment" class="form-control form-control-sm" id="comment" placeholder="دیدگاه شما ..." rows="4"></textarea>
                                                            </section>
                                                            
                                                            <section class="modal-footer py-1">
                                                                <button type="submit" class="btn btn-sm btn-primary">ثبت دیدگاه</button>
                                                                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">بستن</button>
                                                            </section>
                                                        </form>
                                                    </section>
                                                
                                                </section>
                                            </section>
                                        </section>
                                </section>
                                @endauth

                                @guest
                                    <span>برای ثبت نظر <a href="/login">وارد</a> شوید . </span>
                                @endguest


                                @forelse ($comments as $comment)
                                <section class="product-comment">
                                    <section class="product-comment-header d-flex justify-content-start">
                                        <section class="product-comment-date">{{jdate($comment->created_at)}}</section>
                                        <section class="product-comment-title">{{$comment->user->first_name.''.$comment->User->last_name}}</section>
                                    </section>
                                    <section class="product-comment-body">
                                    {{$comment->comment}}
                                    </section>
                                </section>
                                @empty  
                                    <span>این محصول فاقد نظر می باشد . </span>
                                @endforelse
                                </section>
                            </section>

                            <!-- start vontent header -->
                            <section id="score" class="content-header mt-2 mb-4">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title content-header-title-small">
                                        امتیاز ها
                                    </h2>
                                    <section class="content-header-link">
                                        <!--<a href="#">مشاهده همه</a>-->
                                    </section>
                                </section>
                            </section>
                            <section class="product-comments mb-4">
                                <section class="comment-add-wrapper">
                                    <span>امتیاز محصول</span>

                                    <span class="px-3">:</span>

                                    <span>{{ $product->ratingsAvg() ?? "شما اولین نفری باشید که امتیاز می دهید . " }}</span>
                                </section>

                                @auth
                                    <div>
                                        <form action="{{ route('products.storeRaiting',$product) }}" method="POST" class="d-flex align-middle justify-content-right align-items-center">
                                            @csrf
                                            <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                                                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star"></label>
                                                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 star"></label>
                                                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 star"></label>
                                                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 star"></label>
                                                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star"></label>
                                            </div>
    
                                            <div class="px-3">
                                                <button class="btn btn-danger">ثبت امتیاز</button>
                                            </div>
                                        </form>
                                    </div>	
                                @endauth

                                @guest
                                    <span>برای ثبت نظر <a href="/login">وارد</a> شوید . </span>
                                @endguest
                                </section>
                            </section>
                        </section>

                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end description, features and comments -->

</main>


@endsection