<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;
use Illuminate\Support\Facades\Validator;

class ProductTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_types = ProductType::orderBy('id', 'desc')
        ->where('is_deleted', 0)
        ->get();
        return $product_types;
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' =>  400,
                'errors' => $validator->messages()
            ]);
        }
        else {

            ProductType::create([
                'name' => $request['name'],
                'type' => $request['type'],
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
        $product_type = ProductType::find($id);

        return response()->json([
            'producttype' => $product_type,
            'status' => 200
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
            'name' => 'required',
            'type' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' =>  400,
                'errors' => $validator->messages()
            ]);
        }
        else {
            $producttype = ProductType::find($id);
            $producttype->update([
                'name' => $request['name'],
                'type' => $request['type'],
                'is_deleted' => 0,
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Product Type Added Successfully!'
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
        $producttype = ProductType::find($id);
        
        if($producttype) {
            $producttype->is_deleted = 1;
            $producttype->save();

            return response()->json([
                'status' => 200,
                'message' => 'Product Type Deleted Successfully!'
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
