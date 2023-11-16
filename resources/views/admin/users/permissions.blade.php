@extends('admin.layout.master')
@section('styles')
    @parent
    <link href="{{ asset('jalalidatepicker/persian-datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('title')
    create permission
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">permission</h2>
    </section>

    <section class="row">
        <section class="col-12">

            <form method="post" action="{{ route('admin.users.PermissionsStore',$user) }}" enctype="multipart/form-data">
                @csrf
                <div class="d-flex my-2">
                    @php
                        $permissionUsersArray = $user->permissions->pluck('id')->toArray();
                    @endphp
                    @foreach ($permissions as $permission)
                        <div class="form-chec mx-3">
                            <input type="checkbox" class="form-check-input" value="{{ $permission->id }}"
                                id="{{ $permission->id }}" name="permission[]" @if (in_array($permission->id,$permissionUsersArray)) checked @endif value='{{ old(" $permission->id ") }}'>
                            <label class="form-check-label" for="{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary btn-sm">store</button>
            </form>
        </section>
    </section>
@endsection