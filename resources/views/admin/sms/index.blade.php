@extends('admin.layout.master')

@section('title')
    SMS
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">SMS</h2>
        <a href="{{ route("admin.sms.create") }}" class="btn btn-sm btn-success">Create</a>
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
                @foreach ($sms as $itemsms)
                    <tr>
                        <td>{{ $itemsms->id }}</td>
                        <td>{{ $itemsms->title }}</td>
                        <td>{{ ($itemsms->status == 1) ? "فعال" : "غیر فعال" }}</td>
                        <td>{{ jalaliDate($itememail->published_at) }}</td>
                        <td class="d-flex">
                            <a href="{{ route('admin.sms.SendSMS',$itemsms) }}" class="btn btn-primary btn-sm mr-2">Send Now</a>

                            <a href="{{ route('admin.sms.edit',$itemsms) }}" class="btn btn-info btn-sm">Edit</a>

                            <form action="{{ route('admin.sms.destroy',$itemsms) }}" method="post">
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