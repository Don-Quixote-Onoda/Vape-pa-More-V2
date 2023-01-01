<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();

        return $products;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            $this->validate($request, [
                'product_name' => 'required',
                'price' => 'required',
                'status' => 'required',
                'product_type_id' => 'required',
                'quantity' => 'required',
            ]);

            $product = Product::create([
                'product_name' => $request['product_name'],
                'price' => $request['price'],
                'status' => $request['status'],
                'product_type_id' => $request['product_type_id'],
                'quantity' => $request['quantity']
            ]);

            return [
                'success' => 1,
                'results' => $product
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
        $product = Product::find($id);

        return $product;
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
            $this->validate($request, [
                'product_name' => 'required',
                'price' => 'required',
                'status' => 'required',
                'product_type_id' => 'required',
                'quantity' => 'required',
            ]);

            $product = Product::find($id);
            $product->update([
                'product_name' => $request['product_name'],
                'price' => $request['price'],
                'status' => $request['status'],
                'product_type_id' => $request['product_type_id'],
                'quantity' => $request['quantity']
            ]);

            return [
                'success' => 1,
                'results' => $product
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
        $product = Product::find($id);
        $product->delete();

        return [
            'success' => 1,
            'results' => $product
        ];
    }
}
