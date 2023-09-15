@extends('admin.layout.master')

@section('title')
    category
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">Gallery product #{{ $product->id }}</h2>
        <a href="{{ url("admin/feature/" . $product->id . "/add") }}" class="btn btn-sm btn-success">add</a>
    </section>

    <section class="table-responsive">
        <table class="table table-striped table-">
            <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>description</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product->features as $feature)
                <tr>
                    <td>{{ $feature->id }}</td>
                    <td>{{ $feature->title }}</td>
                    <td>{{ $feature->description }}</td>
                    <td class="d-flex">
                        <form action="{{ route('admin.feature.delete',$feature)  }}" method="post">
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