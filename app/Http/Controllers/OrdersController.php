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

        // DB::insert('insert into `orders` (`product_id`, `user_id`, `order_number`, `status`, `quantity`, `total_price`, `updated_at`, `created_at`) values ('.$request['product_id'].', '.$request['user_id'].', '.$request['order_number'].', '.$request['quantity'].', '.$request['total_price'].', '.date('Y-m-d h:i:s', time()).', '.date('Y-m-d h:i:s', time()).'))');
        // $order = new Order;
        // $order->quantity = $request['quantity'];
        // try {
        //     $this->validate($request, [
        //         'product_id' => 'required',
        //         'user_id' => 'required',
        //         'order_number' => 'required',
        //         'status' => 'required',
        //         'quantity' => 'required',
        //         'total_price' => 'required'
        //     ]);

        //     $order = Order::create([
        //         'product_id' => 4,
        //         'user_id' => 2,
        //         'order_number' => '0035',
        //         'status' => 1,
        //         'quantity' => 2,
        //         'total_price' => 1000
        //     ]);

        //     return [
        //         'success' => 1,
        //         'results' => $order
        //     ];
        // } catch (\Throwable $th) {
        //     //throw $th;

        //     return $th;

        //     return [
        //         'error' => 0
        //     ];
        // }
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
