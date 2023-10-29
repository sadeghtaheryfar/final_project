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
        <h2 class="h4">tickets #1</h2>
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
                    <label for="cat_id">status</label>
                    <select name="category_id" id="category_id" class="form-control" required autofocus>
                        <option value="0">بسته</option>
                        <option value="1">باز</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">file (jpeg,jpg,png,txt)</label>
                    <input type="file" id="file" name="file" class="form-control-file" required autofocus>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">submit</button>
            </form>

            <div class="box-item-ticketPage" dir="rtl">
                <div class="item send">
                    <div class="time"><span>دوشنبه, 22 خرداد 1402</span></div>
                    <div class="message"><span>awfawf</span></div>
                    <div class="file"><a href="http://server.elfiro.com/">فایل</a></div>
                </div>

                <div class="item recive">
                    <div class="time"><span>دوشنبه, 22 خرداد 1402</span></div>
                    <div class="message">
                        <p>awfawf</p>
                    </div>
                    <div class="file"><a href="http://server.elfiro.com/htp:awfa awf/awf">فایل</a></div>
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
