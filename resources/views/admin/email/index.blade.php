@extends('admin.layout.master')

@section('title')
    email
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">email</h2>
        <a href="{{ route("admin.email.create") }}" class="btn btn-sm btn-success">Create</a>
    </section>

    <section class="table-responsive">
        <table class="table table-striped table-">
            <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>status</th>
                    <th>published at</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($email as $itememail)
                    <tr>
                        <td>{{ $itememail->id }}</td>
                        <td>{{ $itememail->title }}</td>
                        <td>{{ ($itememail->status == 1) ? "فعال" : "غیر فعال" }}</td>
                        <td>{{ jalaliDate($itememail->published_at) }}</td>
                        <td class="d-flex">
                            <a href="{{ route('admin.email.SendEmail',$itememail) }}" class="btn btn-primary btn-sm mr-2">Send Now</a>

                            <a href="{{ route('admin.email.edit',$itememail) }}" class="btn btn-info btn-sm">Edit</a>

                            <form action="{{ route('admin.email.destroy',$itememail) }}" method="post">
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