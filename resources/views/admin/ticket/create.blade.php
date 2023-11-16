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
            <form method="post" action="{{ route('admin.tickets.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group my-2">
                    <label for="subject">subject</label>
                    <input class="form-control" id="subject" name="subject" placeholder="subject ..."
                        rows="5" required autofocus>
                </div>

                <div class="form-group my-2">
                    <label for="description">description</label>
                    <textarea class="form-control cke_rtl" id="description" name="description" placeholder="description ..." rows="5"
                        required autofocus></textarea>
                </div>

                <div class="form-group my-2">
                    <label for="category_id">category</label>
                    <select name="category_id" id="category_id" class="form-control" required autofocus>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                @if ($category->id == old('cat_id')) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group my-2">
                    <label for="user_id">useres</label>
                    <select name="user_id" id="user_id" class="form-control" required autofocus>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                @if ($user->id == old('cat_id')) selected @endif>
                                {{ $user->email . " " . $user->mobile }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group my-2">
                    <label for="priority_id">priority</label>
                    <select name="priority_id" id="priority_id" class="form-control" required autofocus>
                        @foreach ($priorities as $priority)
                            <option value="{{ $priority->id }}"
                                @if ($priority->id == old('cat_id')) selected @endif>
                                {{ $priority->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group my-2">
                    <label for="file">file (jpeg,jpg,png,txt)</label>
                    <input type="file" id="file" name="file" class="form-control-file" autofocus>
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