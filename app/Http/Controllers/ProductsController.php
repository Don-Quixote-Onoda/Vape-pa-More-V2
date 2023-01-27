<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::select("*")->where('is_deleted', 0)->orderBy('id', 'desc')->get();

        $product_lists = array();

        foreach ($products as $product) {
            $product_list = array(
                'id' => $product->id,
                'product_name' => $product->product_name,
                'price' => $product->price,
                'product_type_id' => $product->product_type_id,
                'quantity' => $product->quantity,
                'status'=> $product->status,
                'product_type' => $product->product_type
            );
            array_push($product_lists, $product_list);
        }

        return response()->json([
            'products' => $product_lists
        ]);
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

                

                Product::create([
                    'product_name' => $request['product_name'],
                    'price' => $request['price'],
                    'status' => $request['status'],
                    'product_type_id' => $request['product_type'],
                    'quantity' => $request['quantity'],
                    'is_deleted' => 0,
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
        $product = Product::find($id);

        return response()->json([
            'product' => $product
        ]);
        
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

            

            $product = Product::find($id);
            $product->update([
                'product_name' => $request['product_name'],
                'price' => $request['price'],
                'status' => $request['status'],
                'product_type_id' => $request['product_type'],
                'quantity' => $request['quantity']
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Product Updated Successfully!'
            ]);
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
        
        if($product) {
            $product->is_deleted = 1;
            $product->save();

            return response()->json([
                'status' => 200,
                'message' => 'Product Deleted Successfully!'
            ]);
        }
        else {
            return response()->json([
                'status' => 404,
                'message' => 'Product Not Found!'
            ]);
        }
    }
}
