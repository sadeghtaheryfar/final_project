@extends('admin.layout.master')

@section('title')
tickets
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">tickets</h2>
        <div>
            <a href="" class="btn btn-info btn-sm">all</a>
            <a href="" class="btn btn-primary btn-sm">open</a>
            <a href="" class="btn btn-danger btn-sm">close</a>
            <a href="{{ route("admin.tickets.create") }}" class="btn btn-sm btn-success ml-3">Create</a>
        </div>
    </section>

    <section class="table-responsive">
        <table class="table table-striped table-">
            <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>body</th>
                    <th>status</th>
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