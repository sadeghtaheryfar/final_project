@extends('layout.master')


@section('title')
    Comparison page
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
                                    <span>لیست مقایسه ها</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>

                        <section>
                            <table class="table table-bordered">
                                <tbody>
                                    @forelse ($ComparisonsProducts as $ComparisonsProduct)
                                        <tr>
                                            <th>عکس محصول</th>
                                            <td>قیمت محصول</td>
                                            <td>نام محصول</td>
                                            <td>تنظیمات</td>
                                        </tr>
                                        <tr>
                                            <th><img width="100" height="100" src="{{ $ComparisonsProduct->product->image }}">
                                            </th>
                                            <td>{{ $ComparisonsProduct->product->price }}</td>
                                            <td>{{ $ComparisonsProduct->product->name }}</td>
                                            <td><a class="text-decoration-none cart-delete btn btn-danger text-white"
                                                    href="{{ route('products.RemoveComparisonProduct', $ComparisonsProduct) }}"><i
                                                        class="fa fa-trash-alt"></i> حذف از لیست مقایسه </a></td>
                                        </tr>
                                    @empty
                                        <span>محصولی در لیست مقایسه شما وجود ندارد . </span>
                                    @endforelse
                                </tbody>
                            </table>
                        </section>
                    </section>
                </main>
            </section>
        </section>
    </section>
    <!-- end body -->
@endsection
