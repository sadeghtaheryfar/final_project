




@extends('admin.layout.master')

@section('title')
    Ticket Admins
@endsection

@section('content')
    <div class="mb-2 d-flex justify-content-between align-items-center">
        <h1 class="h5"><i class="fas fa-newspaper"></i> Ticket Admins</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a role="button" href="{{ route('admin.tickets-admins.create') }}" class="btn btn-sm btn-success">Create
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-">
            <thead>
                <tr>
                    <th>#</th>
                    <th>admin email - mobile</th>
                    <th>status</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($TicketAdmins as $TicketAdmin)
                    <tr>
                        <td>{{ $TicketAdmin->id }}</td>
                        <td>{{ $TicketAdmin->user->email . " -  " . $TicketAdmin->user->mobile }}</td>
                        <td>{{ ($TicketAdmin->status === 1) ?"disable" : "enable" }}</td>
                        <td>
                            <a role="button" href="{{ route('admin.tickets-admins.edit', $TicketAdmin->id) }}"
                                class="btn btn-sm btn-info my-0 mx-1 text-white">Edit</a>
                            <form class="d-inline"
                                action="{{ route('admin.tickets-admins.destroy', $TicketAdmin->id) }}"
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