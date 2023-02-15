<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::orderBy('id', 'desc')->get();
        return $payments;
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
            $payment = Payment::create([
                'user_id' => $request['user_id'],
                'order_detail_id' => $request['order_detail_id'],
                'purchase' => $request['purchase']
            ]);

            return [
                'success' => 1,
                'result' => $payment
            ];
        } catch (\Throwable $th) {
            //throw $th;
            return [
                'error' => 0
            ];
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
        $payment = Payment::find($id);
        return $payment;
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
            $payment = Payment::find($id);
            $payment->update([
                'user_id' => $request['user_id'],
                'order_detail_id' => $request['order_detail_id'],
                'purchase' => $request['purchase']
            ]);

            return [
                'success' => 1,
                'result' => $payment
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
        $payment = Payment::find($id);
        
        if($payment) {
            $payment->is_deleted = 1;
            $payment->save();

            return response()->json([
                'status' => 200,
                'message' => 'Payment Deleted Successfully!'
            ]);
        }
        else {
            return response()->json([
                'status' => 404,
                'message' => 'Payment Not Found!'
            ]);
        }
    }
}
