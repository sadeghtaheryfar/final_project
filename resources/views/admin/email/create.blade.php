@extends('admin.layout.master')
@section('styles')
    @parent
    <link href="{{ asset('jalalidatepicker/persian-datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('title')
    create email
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">email</h2>
    </section>

    <section class="row my-3">
        <section class="col-12">

            <form method="post" action="{{ route('admin.email.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                        placeholder="Enter title ..." required autofocus>
                </div>

                <div class="form-group">
                    <label for="body">body</label>
                    <textarea class="form-control" id="body" name="body" placeholder="body ..." rows="5" required autofocus>{{ old('body') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">status</label>
                    <select name="status" id="status" class="form-control" required autofocus>
                        <option value="0">
                            disable
                        </option>

                        <option value="1" selected>
                            enable
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="published_at">published at</label>
                    <input type="text" class="form-control d-none" id="published_at" name="published_at" required
                        autofocus>
                    <input type="text" class="form-control" id="published_at_view" required autofocus>
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
            CKEDITOR.replace('body')
            $('#published_at_view').persianDatepicker({
                observer: true,
                format: 'LLLL',
                altField: '#published_at',
                timePicker: {
                    enabled: true,
                    meridiem: {
                        enabled: true
                    }
                }
            })
        })
    </script>
@endsection
