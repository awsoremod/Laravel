<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\BrandResource;
use App\Http\Requests\BrandIndexRequest;
use App\Http\Requests\BrandStoreRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BrandIndexRequest $request) // возвращает бренды
    {
        $request->validated();
        $id = $request->id;
        $stock = $request->stock;
        $addSqlStock = '';
        if ($stock === 'yes') {
            $addSqlStock = "JOIN product_shops ON products.id = product_shops.product_id";
        }
        $brands = DB::select(
            "SELECT DISTINCT brands.id AS id, brands.name AS name
        FROM products
        JOIN brands ON products.brand_id = brands.id
        {$addSqlStock}
        WHERE products.type_id = {$id}"
        );
        return BrandResource::collection($brands);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandStoreRequest $request)
    {
        $created_brand = Brand::create($request->validated());

        return new BrandResource($created_brand);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
