@extends('admin.layout.master')
@section('styles')
    @parent
    <link href="{{ asset('jalalidatepicker/persian-datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('title')
    edit discount celing
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">edit discount celing #{{ $discountCode->id }}</h2>
    </section>

    <section class="row my-3">
        <section class="col-12">

            <form method="post" action="{{ route('admin.discount-code.update',$discountCode) }}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="code">code</label>
                    <input type="text" class="form-control" id="code" name="code" value="{{ $discountCode->code }}" placeholder="Enter code ..." required autofocus>
                </div>

                <div class="form-group">
                    <label for="amount_type">amount type</label>
                    <select name="amount_type" id="amount_type" class="form-control" required autofocus>
                        <option value="0" @if ($discountCode->amount_type == 0) selected @endif>percentage</option>
                        <option value="1" @if ($discountCode->amount_type == 1) selected @endif>price unit</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="amount">amount</label>
                    <input type="text" id="amount" name="amount" class="form-control" value="{{ $discountCode->amount }}"
                        required autofocus>
                </div>

                <div class="form-group">
                    <label for="discount_celing">discount celing</label>
                    <input type="text" id="discount_celing" name="discount_celing" class="form-control"
                    value="{{ $discountCode->discount_celing }}" autofocus @if($discountCode->amount_type == 1) @disabled(true) @endif>
                </div>

                <div class="form-group">
                    <label for="type">type</label>
                    <select name="type" id="type" class="form-control" required autofocus>
                        <option value="0" @if ($discountCode->type == 0) selected @endif>common</option>
                        <option value="1" @if ($discountCode->type == 1) selected @endif>privet</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="user_id">user</label>
                    <select name="user_id" id="user_id" class="form-control" required autofocus @if($discountCode->type == 0) @disabled(true) @endif>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @if ($discountCode->user_id == $user->id) selected @endif>{{ $user->email }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="start_date">start date</label>
                    <input type="text" class="form-control d-none" value="{{ $discountCode->start_date }}" id="start_date" name="start_date" required
                        autofocus>
                    <input type="text" class="form-control" value="{{ $discountCode->start_date }}" id="start_date_view" required autofocus>
                </div>

                <div class="form-group">
                    <label for="end_date">end date</label>
                    <input type="text" class="form-control d-none" value="{{ $discountCode->end_date }}" id="end_date" name="end_date" required
                        autofocus>
                    <input type="text" class="form-control" value="{{ $discountCode->end_date }}" id="end_date_view" required autofocus>
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
            $('#start_date_view').persianDatepicker({
                observer: true,
                format: 'YYYY/MM/DD',
                altField: '#start_date'
            })
            $('#end_date_view').persianDatepicker({
                observer: true,
                format: 'YYYY/MM/DD',
                altField: '#end_date'
            })
        })

        $('#type').change(function() {
            if ($('#type').find(':selected').val() == '1') {
                $('#user_id').removeAttr('disabled');
            }else{
                $('#user_id').attr('disabled', 'disabled');
            }
        })

        $('#amount_type').change(function() {
            if ($('#amount_type').find(':selected').val() == '1') {
                $('#discount_celing').attr('disabled', 'disabled');
            }else{
                $('#discount_celing').removeAttr('disabled');
            }
        })
    </script>
@endsection