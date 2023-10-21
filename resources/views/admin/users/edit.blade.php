@extends('admin.layout.master')
@section('styles')
    @parent
    <link href="{{ asset('jalalidatepicker/persian-datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('title')
    edit users
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">edit user #{{ $user->id }}</h2>
    </section>

    <section class="row my-3">
        <section class="col-12">

            <form method="post" action="{{ route('admin.users.update',$user) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" class="form-control" id="email" name="email" disabled value="{{ $user->email }}"
                        placeholder="Enter email ..." required autofocus>
                </div>

                <div class="form-group">
                    <label for="mobile">mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" disabled value="{{ $user->mobile }}"
                        placeholder="Enter mobile ..." required autofocus>
                </div>

                <div class="form-group">
                    <label for="first_name">first name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}"
                        placeholder="Enter first name ..." required autofocus>
                </div>

                <div class="form-group">
                    <label for="last_name">last name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}"
                        placeholder="Enter last name ..." required autofocus>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">store</button>
            </form>
        </section>
    </section>
@endsection