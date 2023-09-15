@extends('admin.layout.master')

@section('title')
    product
@endsection

@section('content')
    <section class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="h4">Products</h2>
        <a href="{{ route("admin.discount-code.create") }}" class="btn btn-sm btn-success">Create</a>
    </section>

    <section class="table-responsive">
        <table class="table table-striped table-">
            <thead>
                <tr>
                    <th>#</th>
                    <th>code</th>
                    <th>amount</th>
                    <th>discount celing</th>
                    <th>type</th>
                    <th>user email</th>
                    <th>start_date</th>
                    <th>end_date</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($DiscountCodes as $DiscountCode)
                <tr>
                    <td>{{ $DiscountCode->id }}</td>
                    <td>{{ $DiscountCode->code }}</td>
                    <td>{{ $DiscountCode->amount }}{{ ($DiscountCode->amount_type == 0) ? "%" : "$" }}</td>
                    <td>{{ ($DiscountCode->discount_celing == null) ? "--" : $DiscountCode->discount_celing}}</td>
                    <td>{{ ($DiscountCode->type == 0) ? "public" : "privet" }}</td>
                    <td>{{ ($DiscountCode->type == 1) ? $DiscountCode->user->email : "--" }}</td>
                    <td>{{ $DiscountCode->start_date }}</td>
                    <td>{{ $DiscountCode->end_date }}</td>
                    <td class="d-flex">
                        <a href="{{ route('admin.product.edit',$DiscountCode) }}" class="btn btn-info btn-sm">Edit</a>

                        <form action="{{ route('admin.product.destroy',$DiscountCode) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection