<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::select("*")->where('is_deleted', 0)->orderBy('id', 'desc')->get();

        return response()->json([
            'orders' => $orders
        ]);
    }

    public function order_number() {

        $order_detail = OrderDetail::select("*")->where('is_deleted', 0)->orderBy('id', 'desc')->get();
        $order_number = 'VPM-'.$order_detail[0]->id;


        $orders = Order::select("*")
        ->where('order_number', $order_number)
        ->orderBy('id', 'asc')->get();

        $order_lists = array();
        $total_price = 0;

        foreach ($orders as $order) {
            $order_list = array(
                'id' => $order->id,
                'product_id' => $order->product_id,
                'user_id' => $order->user_id,
                'order_number' => $order->order_number,
                'quantity' => $order->quantity,
                'total_price'=> $order->total_price,
                'product' => $order->product
            );
            array_push($order_lists, $order_list);

            $total_price += $order->total_price;
        }

        return response()->json([
            'orders' => $order_lists,
            'total_price' => $total_price
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;

        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' =>  400,
                'errors' => $validator->messages()
            ]);
        }
        else {

            Order::create([
                'product_id' => $request['product_id'],
                'user_id' => $request['user_id'],
                'order_number' => $request['order_number'],
                'quantity' => $request['quantity'],
                'total_price' => $request['total_price'],
                'is_deleted' =>0
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Product Added Successfully!'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return $order;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
