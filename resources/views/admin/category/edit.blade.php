


@extends('admin.layout.master')

@section('title')
    Edit Category
@endsection

@section('content')
    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">edit Category</h1>
    </section>
    <section class="row my-3">
        <section class="col-12">
            <form method="post" action="{{ route('admin.product-category.update', $ProductCategory) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" class="form-control" id="name"
                        value="{{ old('name', $ProductCategory->name) }}" name="name" placeholder="Enter name ...">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </form>
        </section>
    @endsection
