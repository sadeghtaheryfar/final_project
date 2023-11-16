@extends('admin.layout.master')

@section('title')
    permissions
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">permissions</h2>
        <a href="{{ route('admin.permission.create') }}" class="btn btn-sm btn-success">Create</a>
    </section>

    <section class="table-responsive">
        <table class="table table-striped table-">
            <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>description</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->description }}</td>
                        <td class="d-flex">
                            <a href="{{ route('admin.permission.edit', $permission) }}" class="btn btn-info btn-sm">Edit</a>
                            <form action="{{ route('admin.permission.destroy', $permission) }}" method="post">
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
