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
                                <span>لیست علاقه های من</span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>
                    <!-- end vontent header -->
                    @if ($favoriteProducts==null)
                    <div>شما هنوز علاقه مندی های خود را انتخاب نکرده اید</div>
                @else
     @foreach ($favoriteProducts as $favoriteProduct)
         
  
                    <section class="cart-item d-flex py-3">
                        <section class="cart-img align-self-start flex-shrink-1"><img src="{{asset($favoriteProduct->image)}}" alt=""></section>
                        <section class="align-self-start w-100">
                            <p class="fw-bold">{{$favoriteProduct->name}}</p>
                            <p><span style="background-color: #CCCCCC;" class="cart-product-selected-color me-1"></span> <span> توسی روشن</span></p>
                            <p><i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i> <span> گارانتی اصالت و سلامت فیزیکی کالا</span></p>
                            <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>{{$favoriteProduct->marketable_number}}کالا موجود در انبار</span></p>
                            <section>
                                <a class="text-decoration-none cart-delete btn btn-danger text-white" href="{{route('products.RemoveFromFavouriteProduct',$favoriteProduct)}}"><i class="fa fa-trash-alt"></i> حذف از لیست علاقه ها</a>
                            </section>
                        </section>
                        <section class="align-self-end flex-shrink-1">
                            <section class="text-nowrap fw-bold">{{ round($favoriteProduct->price)}} تومان</section>
                        </section>
                    </section>

                    @endforeach
               
                  @endif
                </section>
            </main>
        </section>
    </section>
</section>
<!-- end body -->


@endsection