<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Validator;

class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_details = OrderDetail::orderBy('id','desc')->get();
        return $order_details;
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
        try {
            OrderDetail::create([
                'total_amount' => $request['total_amount'],
                'user_id' => $request['user_id'],
                'order_number' => $request['order_number'],
                'is_deleted' =>0
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Orders Added Successfully!'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' =>  400,
                'errors' => $th
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
        $order_detail = OrderDetail::find($id);
        return $order_detail;
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
        try {
            $order_detail = OrderDetail::find($id);
            $order_detail->update([
                'total_amount' => $request['total_amount'],
                'user_id' => $request['user_id'],
                'order_number' => $request['order_number']
            ]);

            return [
                'success' => 1,
                'results' => $order_detail
            ];
        } catch (\Throwable $th) {
            //throw $th;
            return [
                'error' => 0
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order_detail = OrderDetail::find($id);
        $order_detail->delete();

        return [
            'success' => 1,
            'result' => $order_detail
        ];
    }
}
