@extends('admin.layout.master')
@section('styles')
    @parent
    <link href="{{ asset('jalalidatepicker/persian-datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('title')
    create product
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">Products</h2>
    </section>

    <section class="row my-3">
        <section class="col-12">

            <form method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                        placeholder="Enter name ..." required autofocus>
                </div>

                <div class="form-group">
                    <label for="introduction">introduction</label>
                    <textarea class="form-control" id="introduction" name="introduction" placeholder="introduction ..." rows="5" required autofocus>{{ old('introduction') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" id="image" name="image" class="form-control-file" required autofocus>
                </div>

                <div class="form-group">
                    <label for="price">price</label>
                    <input type="text" id="price" name="price" class="form-control" value="{{ old('price') }}" required autofocus>
                </div>

                <div class="form-group">
                    <label for="cat_id">category_id</label>
                    <select name="category_id" id="category_id" class="form-control" required autofocus>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if (old('cat_id') == $category->id) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="published_at">published at</label>
                    <input type="text" class="form-control d-none" id="published_at" name="published_at" required
                        autofocus>
                    <input type="text" class="form-control" id="published_at_view" required autofocus>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">store</button>
            </form>
        </section>
    </section>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('jalalidatepicker/persian-datepicker.min.js') }}"></script>
    <script src="{{ asset('jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <script>
        $(document).ready(function() {
            CKEDITOR.replace('introduction')
            $('#published_at_view').persianDatepicker({
                observer: true,
                format: 'YYYY/MM/DD',
                altField: '#published_at'
            })
        })
    </script>
@endsection