@extends('admin.layout.master')

@section('title')
    roles
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">roles</h2>
        <a href="{{ route('admin.role.create') }}" class="btn btn-sm btn-success">Create</a>
    </section>

    <section class="table-responsive">
        <table class="table table-striped table-">
            <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>description</th>
                    <th>permissions</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>
                            @forelse ($role->permissions as $permission)
                                {{ $permission->id . " _ " . $permission->name }} <br>
                            @empty
                                --
                            @endforelse
                        </td>
                        <td class="d-flex">
                            <a href="{{ route('admin.role.edit', $role) }}" class="btn btn-info btn-sm">Edit</a>
                            <a href="{{ route('admin.role.EditPermission', $role) }}" class="btn btn-primary btn-sm ml-2">Edit Permissions</a>

                            <form action="{{ route('admin.role.destroy', $role) }}" method="post">
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
