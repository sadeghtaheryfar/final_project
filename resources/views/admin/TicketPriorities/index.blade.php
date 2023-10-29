




@extends('admin.layout.master')

@section('title')
    Ticket Priorities
@endsection

@section('content')
    <div class="mb-2 d-flex justify-content-between align-items-center">
        <h1 class="h5"><i class="fas fa-newspaper"></i> Ticket Priorities</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a role="button" href="{{ route('admin.tickets-priorities.create') }}" class="btn btn-sm btn-success">Create
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($TicketPriorities as $TicketPriority)
                    <tr>
                        <td>
                            {{ $TicketPriority->id }}
                        </td>
                        <td>
                            {{ $TicketPriority->name }}
                        </td>
                        <td>
                            <a role="button" href="{{ route('admin.tickets-priorities.edit', $TicketPriority->id) }}"
                                class="btn btn-sm btn-info my-0 mx-1 text-white">Edit</a>
                            <form class="d-inline"
                                action="{{ route('admin.tickets-priorities.destroy', $TicketPriority->id) }}"
                                method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-sm btn-danger my-0 mx-1 text-white">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
