@extends('admin.layout.master')

@section('title')
    admins
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">admins</h2>
    </section>

    <section class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>email</th>
                    <th>first name</th>
                    <th>roles</th>
                    <th>permissions</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>
                            @forelse ($user->roles as $role)
                                {{ $role->name }}
                                <br>
                            @empty
                                نقشی ندارد
                            @endforelse
                        </td>
                        <td>
                            @forelse ($user->permissions as $permission)
                                {{ $permission->name }}
                                <br>
                            @empty
                                سطوح دسترسی ای ندارد
                            @endforelse
                        </td>
                        <td class="d-flex">
                            @if ($user->user_type === 1)
                                <a href="{{ route('admin.users.AdminsSet', $user) }}" class="btn btn-primary btn-sm mr-2">
                                    Remove Admin</a>
                            @else
                                <a href="{{ route('admin.users.AdminsSet', $user) }}" class="btn btn-primary btn-sm mr-2">
                                    Add Admin</a>
                            @endif

                            <a href="{{ route('admin.users.Roles', $user) }}" class="btn btn-warning btn-sm">Roles</a>

                            <a href="{{ route('admin.users.Permissions', $user) }}"
                                class="btn btn-secondary btn-sm ml-2">Permissions</a>

                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-info btn-sm ml-2">Edit</a>

                            <form action="{{ route('admin.users.destroy', $user) }}" method="post">
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
