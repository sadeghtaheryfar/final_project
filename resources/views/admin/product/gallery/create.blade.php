@extends('admin.layout.master')

@section('title')
    create gallery
@endsection

@section('content')
    <form action="{{ route('admin.gallery.store',$product) }}" enctype="multipart/form-data" method="post">
        @csrf
        <section class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="image" required>
        </section>

        <button type="submit" class="btn btn-primary">submit</button>
    </form>
@endsection