@extends('admin.layout.master')

@section('title')
    order page
@endsection
@section('content')
<div class="card-body">
    <!-- Course table START -->



    <form class="">

        <div class="row">
            <div class="col">
                <label for="exampleInputPassword1">email:  </label>
                <input type="text" class="disabled form-control" @disabled(true) value="{{$order->user->email}}">
            </div>
            <div class="col">
                <label for="exampleInputPassword1">mobile:</label>
                <input type="text" class="disabled form-control" @disabled(true) value="{{$order->user->mobile}}">
            </div>
          </div>


          <div class="row">
            <div class="col">
                <label for="exampleInputPassword1">first_name:</label>
                <input type="text" class="disabled form-control" @disabled(true) value="{{$order->user->first_name}}">
            </div>
            <div class="col">
                <label for="exampleInputPassword1">last_name:</label>
                <input type="text" class="disabled form-control" @disabled(true) value="{{$order->user->last_name}}">
            </div>
          </div>


    
    <div class="row">
        <div class="col">
            <label for="exampleInputPassword1">payment date: </label>
            <input type="text" class="disabled form-control" @disabled(true) value="{{jdate($order->user->offlinePayment->pay_date)}}">
        </div>
        <div class="col">
            <label for="">payment amount:</label>
            <input type="text" class="disabled form-control" @disabled(true) value="{{$order->user->offlinePayment->amount}}">
        </div>
      </div>



    <div class="container form-group">   
        <br>
        <br>
        <label class="" >order item:</label>
       
        <div class="row">
        @foreach ($order->orderItems as $orderItem)
        <div class="col">
            <label for="">item{{$loop->iteration}}</label>
            <input type="text" class="disabled form-control" @disabled(true) value="{{$orderItem->product->name}}">
            <input type="text" class="disabled form-control" @disabled(true) value="{{$orderItem->product->price}}">
        </div>
        @endforeach
       
       
    </div>
    <br>
       <br>
    </div>


    
    <div class="row">
        <div class="col">
            <label for="exampleInputPassword1">delivery_type:</label>
            <input type="text" class="disabled form-control" @disabled(true) value="{{ $order->delivery->name }}">
        </div>
        <div class="col">
            <label for="exampleInputPassword1">status:</label>
            <input type="text" class="disabled form-control" @disabled(true) value="{{($order->order_status==0)?'in process':'deliverd'}}">
            
        </div>
      </div>
  
     
      <div class="row">
        <div class="col">
            <label for="exampleInputPassword1">order time:</label>
            <input type="text" class="disabled form-control" @disabled(true) value="{{$order->created_at }}">
        </div>
        <div class="col">
            <label for="exampleInputPassword1">deliver time:</label>
            <input type="text" class="disabled form-control" @disabled(true) value="{{$date}}">
            
        </div>
      </div>

      <div class="row">
        <div class="col">
            <label for="exampleInputPassword1">transaction_id:</label>
            <input type="text" class="disabled form-control" @disabled(true) value="{{$order->user->offlinePayment->transaction_id}}">
        </div>
        <div class="col">
           
            
        </div>
      </div>
            
    <!-- Course table END -->
</div>
    
@endsection

</form>