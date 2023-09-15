@extends('admin.layout.master')

@section('title')
    create gallery
@endsection

@section('content')
    <form action="{{ route('admin.feature.store',$product) }}" method="post">
        @csrf
        <section class="form-group">
            <label for="title">title</label>
            <input type="text" class="form-control" name="title" id="title" required>
        </section>

        <section class="form-group">
            <label for="description">description</label>
            <input type="text" class="form-control" name="description" id="description" required>
        </section>

        <button type="submit" class="btn btn-primary">submit</button>
    </form>
@endsection