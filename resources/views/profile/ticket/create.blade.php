@extends('layout.master')


@section('title')
    tickets
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
                                    <span>تیکت های من</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- end vontent header -->

                        <section>
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif

                            <form method="post" action="{{ route('myTickets.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group my-2">
                                    <label for="category_id">دسته بندی</label>
                                    <select name="category_id" id="category_id" class="form-control" required autofocus>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if ($category->id == old('cat_id')) selected @endif>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group my-2">
                                    <label for="priority_id">الویت</label>
                                    <select name="priority_id" id="priority_id" class="form-control" required autofocus>
                                        @foreach ($priorities as $priority)
                                            <option value="{{ $priority->id }}"
                                                @if ($priority->id == old('cat_id')) selected @endif>
                                                {{ $priority->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group my-2">
                                    <label for="subject">عنوان</label>
                                    <input class="form-control" id="subject" name="subject" placeholder="عنوان ..."
                                        rows="5" required autofocus>
                                </div>

                                <div class="form-group my-2">
                                    <label for="description">توضیحات</label>
                                    <textarea class="form-control cke_rtl" id="description" name="description" placeholder="توضیحات ..." rows="5"
                                        required autofocus></textarea>
                                </div>

                                <div class="form-group my-2">
                                    <label for="image">فایل (jpeg,jpg,png,txt)</label>
                                    <input type="file" id="file" name="file" class="form-control-file" autofocus>
                                </div>

                                <button type="submit" class="btn btn-primary btn-sm">ارسال</button>
                            </form>
                        </section>
                    </section>
                </main>
            </section>
        </section>
    </section>
    <!-- end body -->
@endsection
