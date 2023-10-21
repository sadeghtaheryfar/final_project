@extends('admin.layout.master')

@section('title')
    admins
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">admins</h2>
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