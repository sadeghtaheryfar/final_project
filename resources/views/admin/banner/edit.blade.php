@extends('admin.layout.master')
@section('styles')
    @parent
    <link href="{{ asset('jalalidatepicker/persian-datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('title')
    create Banners
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">Banner</h2>
    </section>

    <section class="row my-3">
        <section class="col-12">

            <form method="post" action="{{ route('admin.banners.update',$banner) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="url">url</label>
                    <input type="text" class="form-control" id="url" name="url" value="{{ $banner->url }}"
                        placeholder="Enter url ..." required autofocus>
                </div>

                <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" id="image" name="image" class="form-control-file" required autofocus>
                    <img class="mt-3" src="{{ asset($banner->image) }}" alt="" width="100" height="100">
                </div>

                <button type="submit" class="btn btn-primary btn-sm">store</button>
            </form>
        </section>
    </section>
@endsection