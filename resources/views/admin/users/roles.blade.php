@extends('admin.layout.master')
@section('styles')
    @parent
    <link href="{{ asset('jalalidatepicker/persian-datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('title')
    create Role
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">Role</h2>
    </section>

    <section class="row">
        <section class="col-12">

            <form method="post" action="{{ route('admin.users.RolesStore',$user) }}" enctype="multipart/form-data">
                @csrf
                <div class="d-flex my-2">
                    @php
                        $roleUsersArray = $user->roles->pluck('id')->toArray();
                    @endphp
                    @foreach ($roles as $role)
                        <div class="form-chec mx-3">
                            <input type="checkbox" class="form-check-input" value="{{ $role->id }}"
                                id="{{ $role->id }}" name="roles[]" @if (in_array($role->id,$roleUsersArray)) checked @endif value='{{ old(" $role->id ") }}'>
                            <label class="form-check-label" for="{{ $role->id }}">{{ $role->name }}</label>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary btn-sm">store</button>
            </form>
        </section>
    </section>
@endsection