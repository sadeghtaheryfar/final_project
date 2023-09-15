@extends('admin.layout.master')

@section('title')
    product
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">Products</h2>
        <a href="{{ route("admin.banners.create") }}" class="btn btn-sm btn-success">Create</a>
    </section>

    <section class="table-responsive">
        <table class="table table-striped table-">
            <thead>
                <tr>
                    <th>#</th>
                    <th>image</th>
                    <th>url</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td><img src="{{ asset($product->image) }}" alt="" width="100" height="100"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ Str::limit($product->introduction, 50) }}</td>
                    <td>{{ $product->sold_number }}</td>
                    <td class="d-flex">
                        <a href="{{ route('admin.product.edit',$product) }}" class="btn btn-info btn-sm">Edit</a>

                        <a href="{{ route('admin.gallery',$product) }}" class="btn btn-info btn-sm ml-2">Gallery</a>

                        <a href="{{ route('admin.feature',$product) }}" class="btn btn-info btn-sm ml-2">Feature</a>

                        <form action="{{ route('admin.product.destroy',$product) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach --}}
            </tbody>
        </table>
    </section>
@endsection