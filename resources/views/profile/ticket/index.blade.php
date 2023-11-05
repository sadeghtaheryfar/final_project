@extends('layout.master')


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
                                    <span>تیکت های من</span>
                                </h2>
                                <section class="content-header-link">
                                    <a class="btn btn-primary text-white h-[0.5rem]"
                                        href="{{ route('myTickets.create') }}">ساخت تیکیت</a>
                                </section>
                            </section>
                        </section>
                        <!-- end vontent header -->

                        <section class="table-responsive">
                            <table class="table table-striped table-">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>عنوان تیکت</th>
                                        <th>کاربر</th>
                                        <th>وضعیت</th>
                                        <th>تاریخ</th>
                                        <th>تنظیمات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket)
                                        <tr>
                                            <td>{{ $ticket->id }}</td>
                                            <td>{{ $ticket->subject }}</td>
                                            <td>{{ $ticket->user->email . ' - ' . $ticket->user->mobile }}</td>
                                            <td>{{ $ticket->status === 0 ? 'بسته' : 'باز' }}</td>
                                            <td>{{ jalaliDate($ticket->created_at) }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('myTickets.show', $ticket) }}"
                                                    class="btn btn-info btn-sm">نمایش</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </section>
                    </section>
                </main>
            </section>
        </section>
    </section>
    <!-- end body -->
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
