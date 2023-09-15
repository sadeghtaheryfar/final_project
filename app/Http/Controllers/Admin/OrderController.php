<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\Date;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $orders = Order::all();
        foreach ($orders as $order) {
            $date = $order->created_at;
            $addTime = $order->delivery->delivery_time;
            $addTimeUnit = $order->delivery->delivery_time_unit;
            if ($addTimeUnit == 'day') {
                $date = $date->addDays($addTime);
            } else if ($addTimeUnit == 'hour') {
                $date = $date->addHours($addTime);
            }
            if (now() > $date) {
                $order->update(['order_status' => '1']);
            } else {
                $order->update(['order_status' => '0']);
            }
        }

        $orders = Order::all();


        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {

        $date = $order->created_at;
        $addTime = $order->delivery->delivery_time;
        $addTimeUnit = $order->delivery->delivery_time_unit;
        if ($addTimeUnit == 'day') {
            $date = $date->addDays($addTime);
        } else if ($addTimeUnit == 'hour') {
            $date = $date->addHours($addTime);
        }
        return view('admin.order.show', compact('order', 'date'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return back();
    }

    //     public function changeStatus(string $id){

    //         $order=Order::find($id);
    // // dd($order);
    //         if($order->order_status==1){
    //             $order->update(['order_status'=> '0']);
    //         }
    //         else{
    //             $order->update(['order_status'=> '1']);

    //         }
    //         return back();
    //     }
}
