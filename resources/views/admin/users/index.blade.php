@extends('admin.layout.master')

@section('title')
    users
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">users</h2>
    </section>

    <section class="table-responsive">
        <table class="table table-striped table-">
            <thead>
                <tr>
                    <th>id</th>
                    <th>email</th>
                    <th>first name</th>
                    <th>last name</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td class="d-flex">
                        @if ($user->user_type === 1)
                            <a href="{{ route('admin.users.AdminsSet',$user) }}" class="btn btn-primary btn-sm mr-2">Click to Remove Admin</a>
                        @else
                            <a href="{{ route('admin.users.AdminsSet',$user) }}" class="btn btn-primary btn-sm mr-2">Click to Add Admin</a>
                        @endif

                        <a href="{{ route('admin.users.edit',$user) }}" class="btn btn-info btn-sm">Edit</a>

                        <form action="{{ route('admin.users.destroy',$user) }}" method="post">
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