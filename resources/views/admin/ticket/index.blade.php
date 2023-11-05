@extends('admin.layout.master')

@section('title')
    tickets
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">tickets</h2>
        <div>
            <a href="{{ route('admin.tickets.index') }}" class="btn btn-info btn-sm">all</a>
            <a href="{{ route('admin.tickets.open') }}" class="btn btn-primary btn-sm">open</a>
            <a href="{{ route('admin.tickets.close') }}" class="btn btn-danger btn-sm">close</a>
            <a href="{{ route('admin.tickets.create') }}" class="btn btn-sm btn-success ml-3">Create</a>
        </div>
    </section>

    <section class="table-responsive">
        <table class="table table-striped table-">
            <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>user</th>
                    <th>time</th>
                    <th>status</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->subject }}</td>
                        <td>{{ $ticket->user->email . ' - ' . $ticket->user->mobile }}</td>
                        <td>{{ jalaliDate($ticket->created_at) }}</td>
                        <td>{{ $ticket->status === 0 ? 'close' : 'open' }}</td>
                        <td class="d-flex">
                            <a href="{{ route('admin.tickets.show', $ticket) }}" class="btn btn-info btn-sm">Show</a>

                            <form action="{{ route('admin.tickets.destroy', $ticket) }}" method="post">
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
