@extends('admin.layout.master')

@section('title')
    category
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">Gallery product #{{ $product->id }}</h2>
        <a href="{{ url("admin/gallery/" . $product->id . "/add") }}" class="btn btn-sm btn-success">add</a>
    </section>

    <section class="table-responsive">
        <table class="table table-striped table-">
            <thead>
                <tr>
                    <th>#</th>
                    <th>img</th>
                    <th>product name</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product->images as $image)
                <tr>
                    <td>{{ $image->id }}</td>
                    <td><img src="{{ asset($image->image) }}" alt="" width="100" height="100"></td>
                    <td>{{ $image->product->name }}</td>
                    <td class="d-flex">
                        <form action="{{ route('admin.gallery.delete',$image)  }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection