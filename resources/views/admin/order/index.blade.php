@extends('admin.layout.master')

@section('title')
    order page
@endsection
@section('content')
<div class="card-body">
    <!-- Course table START -->
    <div class="table-responsive border-0 rounded-3">
        <!-- Table START -->
        <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
            <!-- Table head -->
            <thead>
                <tr>
                    <th scope="col" class="border-0 rounded-start">#</th>
                    <th scope="col" class="border-0"> user name</th>
                    <th scope="col" class="border-0">payment date</th>
                    <th scope="col" class="border-0">payment amount</th>
                    <th scope="col" class="border-0">delivery_type</th>
                    <th scope="col" class="border-0">status</th>
                    <th scope="col" class="border-0 rounded-end">تنظیمات</th>
                    
                </tr>
            </thead>
            
            <!-- Table body START -->
            <tbody>
                
                @foreach ($orders  as $order)
                    
             
                <!-- Table row -->
                <tr>
                    <!-- Table data -->
                    <td>
                        <div class="d-flex align-items-center position-relative">
                           
                            <!-- Title -->
                            <h6 class="table-responsive-title mb-0 ms-2">	
                                <a href="#" class="stretched-link">{{$loop->iteration}}</a>
                            </h6>
                        </div>
                    </td>

                    <!-- Table data -->
                    <td>
                        <div class="d-flex align-items-center mb-3">
                            <!-- Avatar -->
                        
                            <!-- Info -->
                            <div class="ms-2">
                                <h6 class="mb-0 fw-light">{{$order->user->email}}</h6>
                            </div>
                        </div>
                    </td>

                    <!-- Table data -->
                    {{-- <td>{{jdate($order->user->offlinePayment->pay_date)}}</td> --}}

                    <!-- Table data -->
                    {{-- <td> <span class="badge text-bg-primary">{{$order->user->offlinePayment->amount}}</span> </td> --}}

                    <!-- Table data -->
                    <td>{{ $order->delivery->name }}</td>

                    <!-- Table data -->
                    <td> <span class="badge  bg-opacity-15 text-warning">{{($order->order_status==0)?'in process':'deliverd'}}</span> </td>

                    <!-- Table data -->
                    <td>
                        <div class="container ">
                        <a href="{{route('admin.order.show',$order)}}" class="inline-block btn btn-success btn-sm btn-success-soft me-1 mb-1 mb-md-0">show</a>
                        </div>
                        <div class="container">
                        {{-- <form action="{{ url('admin/order/changeStatus/' . $order->id)}}" class="d-inline" method="POST">
                            @csrf
                            @method("PUT")
                            <button type="submit" class="btn inline-block bg-opacity-15 btn-success btn-sm">{{($order->order_status==0)? 'active':'pasive'}}</button>
                        </form> --}}
                        </div>
                        <div class="container">
                        <form action="{{ route('admin.order.destroy',$order)}}" class="d-inline" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn inline-block btn-danger btn-sm">delete</button>
                        </form>
                        </div>
                    </td>
                </tr>

                @endforeach
            </tbody>
            <!-- Table body END -->
        </table>
        <!-- Table END -->
    </div>
    <!-- Course table END -->
</div>
    
@endsection