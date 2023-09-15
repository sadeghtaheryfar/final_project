@extends('admin.layout.master')

@section('title')
    Comments
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5"><i class="fas fa-newspaper"></i> Comments</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            {{-- <a role="button" class="btn btn-sm btn-success disabled">create</a> --}}
        </div>
    </div>
    <section class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>List of comments</caption>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>user Email</th>
                    <th>product Name</th>
                    <th>Comment</th>
                    <th>Status</th>
                    <th>Setting</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td><a href="">{{ $loop->iteration }}</a>
                        </td>
                        <td>
                            {{ $comment->user->email }}
                        </td>
                        <td>
                            {{ $comment->product->name }}

                        </td>
                        <td>
                            {{ $comment->comment }}

                        </td>
                        <td>
                            {{ $comment->status == 1 ? 'seen' : 'approved' }}
                        </td>
                        <td>

                            @if ($comment->status == 1)
                                <a role="button" class="btn btn-sm btn-success text-white"
                                    href="{{ route('admin.comment.change', $comment->id) }}">click to approved</a>
                            @else
                                <a role="button" class="btn btn-sm btn-warning text-white"
                                    href="{{ route('admin.comment.change', $comment->id) }}">click not to approved</a>
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </section>
@endsection
