@extends('admin.layout.master')
@section('styles')
    @parent
    <link href="{{ asset('jalalidatepicker/persian-datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('title')
    edit role
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">Edit role #{{ $role->name }}</h2>
    </section>

    <section class="row my-3">
        <section class="col-12">

            <form method="post" action="{{ route('admin.role.UpdatePermission',$role) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" disabled class="form-control" id="name" name="name" value="{{ $role->name }}"
                        placeholder="Enter name ..." required autofocus>
                </div>

                <div class="form-group">
                    <label for="description">description</label>
                    <input type="text" disabled class="form-control" id="description" name="description" value="{{ $role->description }}"
                        placeholder="Enter description ..." required autofocus>
                </div>
                
                <hr>

                <div class="d-flex my-2">
                    @php
                        $rolePermissionsArray = $role->permissions->pluck('id')->toArray();
                    @endphp
                    @foreach ($permissions as $permission)
                        <div class="form-chec mx-3">
                            <input type="checkbox" class="form-check-input" value="{{ $permission->id }}"
                                id="{{ $permission->id }}" @if(in_array($permission->id, $rolePermissionsArray)) checked @endif name="permission[]" value='{{ old(" $permission->id ") }}'>
                            <label class="form-check-label" for="{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary btn-sm">store</button>
            </form>
        </section>
    </section>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('jalalidatepicker/persian-datepicker.min.js') }}"></script>
    <script src="{{ asset('jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <script>
        $(document).ready(function() {
            CKEDITOR.replace('introduction')
            $('#published_at_view').persianDatepicker({
                observer: true,
                format: 'YYYY/MM/DD',
                altField: '#published_at'
            })
        })
    </script>
@endsection