@extends('admin.layout.master')

@section('title')
    dashboard
@endsection

@section('content')
    <section style="min-height: 80vh;" class="d-flex justify-content-center align-items-center">
        <section>
            <h1>PHP Tutorial</h1>
            <ul class="mt-2 li">
                <li><h3>PDO Connection</h3></li>
                <li><h3>File upload</h3></li>
                <li><h3>Blog (categories and posts)</h3></li>
            </ul>
        </section>
    </section>
@endsection