@extends('admin.layout.master')

@section('title')
    Notifacation
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">Notifacation</h2>
    </section>

    <section class="table-responsive">
        @forelse ($notifications as $notification)
            <div dir="rtl" class="alert alert-primary text-right d-flex justify-content-between" role="alert">
                <span>{{ $notification['data']['message'] }}</span>

                <span>{{ jalaliDate($notification['created_at']) }}</span>
            </div>
        @empty
        <div dir="rtl" class="alert alert-danger text-center" role="alert">
            اعلانی وجود ندارند .
        </div>
        @endforelse
    </section>
@endsection