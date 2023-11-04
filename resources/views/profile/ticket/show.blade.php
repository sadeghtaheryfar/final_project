@extends('layout.master')
@section('styles')
    @parent

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
    tickets
@endsection
@section('content')
    <!-- start body -->
    <section class="">
        <section id="main-body-two-col" class="container-xxl body-container">
            <section class="row">
                <aside id="sidebar" class="sidebar col-md-3">


                    <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
                        <!-- start sidebar nav-->
                        @include('profile.layout.sidebar')
                        <!--end sidebar nav-->
                    </section>

                </aside>
                <main id="main-body" class="main-body col-md-9">
                    <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

                        <!-- start vontent header -->
                        <section class="content-header mb-4">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>تیکت های # {{ $myTicket->id }}</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- end vontent header -->

                        <section>
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif

                            <form method="post" action="{{ route('myTickets.update', $myTicket) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group my-2">
                                    <label for="description">توضیحات</label>
                                    <textarea class="form-control cke_rtl" id="description" name="description" placeholder="توضیحات ..." rows="5"
                                        required autofocus></textarea>
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

                                <div class="form-group my-4">
                                    <label for="image">file (jpeg,jpg,png,txt)</label>
                                    <input type="file" id="file" name="file" class="form-control-file" autofocus>
                                </div>

                                <button type="submit" class="btn btn-primary btn-sm">ارسال</button>
                            </form>

                            <div class="box-item-ticketPage" dir="rtl">


                                @foreach ($TicketsAnswear as $item)
                                    @if ($item->user_id === null)
                                        <div class="item recive">
                                            <div class="time"><span>{{ jalalidate("$item->created_at") }}</span></div>
                                            <div class="message">
                                                <p>{!! $item->description !!}</p>
                                            </div>
                                            <div class="file"><a href="http://server.elfiro.com/htp:awfa awf/awf">فایل</a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="item send">
                                            <div class="time"><span>{{ jalalidate("$item->created_at") }}</div>
                                            <div class="message">
                                                <p>{!! $item->description !!}</p>
                                            </div>
                                            <div class="file"><a href="http://server.elfiro.com/">فایل</a></div>
                                        </div>
                                    @endif
                                @endforeach

                                <div class="item recive">
                                    <div class="time"><span>{{ jalalidate("$myTicket->created_at") }}</span></div>
                                    <div class="message">
                                        {!! $myTicket->description !!}
                                    </div>
                                    <div class="file"><a href="http://server.elfiro.com/htp:awfa awf/awf">فایل</a></div>
                                </div>
                            </div>
                        </section>
                    </section>
                </main>
            </section>
        </section>
    </section>
    <!-- end body -->
@endsection
