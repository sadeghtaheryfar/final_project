@extends('admin.layout.master')
@section('styles')
    @parent
    <link href="{{ asset('jalalidatepicker/persian-datepicker.min.css') }}" rel="stylesheet" type="text/css">

    <style>
        .box-item-ticketPage {
            margin-top: 3rem;
            direction: rtl !important;
        }


        .box-item-ticketPage .item {
            padding: 1rem;
            margin-bottom: 1rem;
            direction: rtl !important;
        }


        .box-item-ticketPage .send {
            color: white;
            background: #7007fa;
            border-radius: 20px 0px 20px 20px;
            text-align: right;
        }


        .box-item-ticketPage .send .time {
            font-size: 12px;
            margin-bottom: 0.5rem;
            padding-bottom: 0.5rem;
            color: white;
            border-bottom: 1px solid #ffffff70;
        }


        .box-item-ticketPage .recive {
            color: #7007FA;
            background: #7171713d;
            border-radius: 0px 20px 20px 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            justify-content: left;
        }


        .box-item-ticketPage .recive .time {
            text-align: left;
            margin-bottom: 0.5rem;
            padding-bottom: 0.5rem;
            width: 100%;
            border-bottom: 1px solid #7007FA;
        }


        .box-item-ticketPage .recive .file {
            margin-top: 1rem;
            display: flex;
            justify-content: right;
            width: 100%;
        }


        .box-item-ticketPage .recive a {
            color: #7007FA !important;
            border: 1px solid #7007FA;
        }


        .box-item-ticketPage a {
            color: white !important;
            border: 1px solid white;
            padding: 0.3rem 0.9rem;
            border-radius: 100px;
        }


        .box-item-ticketPage .file {
            margin-top: 1rem;
            display: flex;
            justify-content: left;
        }
    </style>
@endsection

@section('title')
    show tickets
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">tickets #{{ $myTicket->id }}</h2>
    </section>

    <section class="row my-3">
        <section class="col-12">

            <form method="post" action="{{ route('admin.tickets.update',$myTicket) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                    <select name="category_id" id="category_id" class="form-control" disabled autofocus>
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
                    <select name="user_id" id="user_id" class="form-control" disabled autofocus>
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
                    <select name="priority_id" id="priority_id" class="form-control" disabled autofocus>
                        @foreach ($priorities as $priority)
                            <option value="{{ $priority->id }}"
                                @if ($priority->id == old('cat_id')) selected @endif>
                                {{ $priority->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group my-4">
                    <label for="status">وضعیت</label>
                    <select name="status" id="status" class="form-control" required autofocus>
                        <option value="0" @if ($myTicket->status == 0) selected @endif>بسته
                        </option>
                        <option value="1" @if ($myTicket->status == 1) selected @endif>باز
                        </option>
                    </select>
                </div>

                <div class="form-group my-2">
                    <label for="file">file (jpeg,jpg,png,txt)</label>
                    <input type="file" id="file" name="file" class="form-control-file" autofocus>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">submit</button>
            </form>

            <div class="box-item-ticketPage" dir="rtl">

                @foreach ($TicketsAnswear as $item)
                    @if ($item->user_id === null)
                        <div class="item send">
                            <div class="time"><span>{{ jalalidate("$item->created_at") }}</span></div>
                            <div class="message">
                                <p>{!! $item->description !!}</p>
                            </div>
                            @if ($item->file)
                                <div class="file">
                                    <a target="_blank" href="{{ asset($item->file->file_path) }}">فایل</a>
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="item recive">
                            <div class="time"><span>{{ jalalidate("$item->created_at") }}</div>
                            <div class="message">
                                <p>{!! $item->description !!}</p>
                            </div>
                            @if ($item->file)
                                <div class="file">
                                    <a target="_blank" href="{{ asset($item->file->file_path) }}">فایل</a>
                                </div>
                            @endif
                        </div>
                    @endif
                @endforeach

                <div class="item recive">
                    <div class="time"><span>{{ jalalidate("$myTicket->created_at") }}</span></div>
                    <div class="message">
                        {!! $myTicket->description !!}
                    </div>
                    @if ($myTicket->file)
                        <div class="file">
                            <a target="_blank" href="{{ asset($myTicket->file->file_path) }}">فایل</a>
                        </div>
                    @endif
                </div>
            </div>
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
        })
    </script>
@endsection