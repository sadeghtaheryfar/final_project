@extends('admin.layout.master')
@section('styles')
    @parent
    <link href="{{ asset('jalalidatepicker/persian-datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('title')
    create tickets
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">tickets</h2>
    </section>

    <section class="row my-3">
        <section class="col-12">
            <form method="post" action="" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="introduction">body</label>
                    <textarea class="form-control" id="body" name="body" placeholder="body ..." rows="5" required autofocus></textarea>
                </div>

                <div class="form-group">
                    <label for="cat_id">user</label>
                    <select name="user" id="user" class="form-control" required autofocus>
                        <option value="1">1</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">file (jpeg,jpg,png,txt)</label>
                    <input type="file" id="file" name="file" class="form-control-file" required autofocus>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">submit</button>
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
