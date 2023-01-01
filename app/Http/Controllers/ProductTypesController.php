<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;

class ProductTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_types = ProductType::orderBy('id', 'desc')->get();
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
        try {
            $this->validate($request, [
                'name' => 'required',
                'type' => 'required',
            ]);

            $product_type = ProductType::create([
                'name' => $request['name'],
                'type' => $request['type']
            ]);

            return [
                'success' => 1,
                'results' => $product_type
            ];
        } catch (\Throwable $th) {
            //throw $th;

            return ['error' => 0];
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

        return $product_type;
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
                'name' => 'required',
                'type' => 'required',
            ]);

            $product_type = ProductType::find($id);

            $product_type->update([
                'name' => $request['name'],
                'type' => $request['type']
            ]);

            return [
                'success' => 1,
                'results' => $product_type
            ];
        } catch (\Throwable $th) {
            //throw $th;

            return ['error' => 0];
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
        $product_type = ProductType::find($id);
        $product_type->delete();

        return [
            'success' => 1,
            'results' => $product_type
        ];
    }
}
