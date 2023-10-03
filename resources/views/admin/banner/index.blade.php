@extends('admin.layout.master')

@section('title')
    Banners
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">Banners</h2>
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
                @foreach ($banners as $banner)
                <tr>
                    <td>{{ $banner->id }}</td>
                    <td><img src="{{ asset($banner->image) }}" alt="" width="100" height="100"></td>
                    <td>{{ $banner->url }}</td>
                    <td class="d-flex">
                        <a href="{{ route('admin.banners.edit',$banner) }}" class="btn btn-info btn-sm">Edit</a>

                        <form action="{{ route('admin.banners.destroy',$banner) }}" method="post">
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