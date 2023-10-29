@extends('admin.layout.master')

@section('title')
    Create Ticket Admins
@endsection

@section('content')
    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">Create Ticket Admins</h1>
    </section>
    <section class="row my-3">
        <section class="col-12">
            <form method="post" action="{{ route('admin.tickets-admins.store') }}">
                @csrf
                <div class="form-group">
                    <label for="user_id">user</label>
                    <select name="user_id" id="user_id" class="form-control" required autofocus>

                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @if (old('user_id') == $user->id) selected @endif>
                                {{ $user->email . " -  " . $user->mobile }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">status</label>
                    <select name="status" id="status" class="form-control" required autofocus>
                            <option value="0" @if (old('status') == 1) selected @endif>enable</option>
                            <option value="1" @if (old('status') == 0) selected @endif>disable</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Store</button>
            </form>
        </section>
    @endsection