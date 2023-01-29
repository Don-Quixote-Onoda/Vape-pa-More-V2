<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();

        return $orders;
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
        Order::create([
            'product_id' => 1,
            'user_id' => 2,
            'order_number' => '3355',
            'status' => 1,
            'product_quantity' => 20,
            'total_price' =>4000.10
        ]);

        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'price' => 'required',
            'status' => 'required',
            'product_type' => 'required',
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
                'product_id' => 1,
                'user_id' => 2,
                'order_number' => '3355',
                'status' => 1,
                'product_quantity' => 20,
                'total_price' =>4000.10
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
