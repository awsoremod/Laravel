<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Basket;
use App\Models\BasketProduct;
use App\Http\Resources\BasketResource;
use App\Http\Requests\BasketIndexRequest;
use App\Http\Requests\BasketStoreRequest;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BasketIndexRequest $request) // Возвращает продукты по id пользователя
    {
        $request->validated();
        $id = $request->id;      

        $products = Product::select('products.id', 'products.type_id', 'types.name', 'brands.name', 'products.name', 'products.price')
        ->join('brands', 'brands.id', '=', 'products.brand_id')
        ->join('types', 'types.id', '=', 'products.type_id')
        ->join('basket_products', 'basket_products.product_id', '=', 'products.id')
        ->where('basket_id', '=', [Basket::select('user_id')->where('user_id', '=', $id)->get()])
        ->get();


        /*$products = DB::select(
            "SELECT products.id, products.type_id, types.name,
            brands.name, products.name, products.price
            FROM products
            JOIN brands ON products.brand_id = brands.id
            JOIN types ON products.type_id = types.id
            JOIN basket_products ON products.id = basket_products.product_id
            WHERE basket_id = (
    		    SELECT id
                FROM baskets
                WHERE user_id = {$id})"
        );*/
        return BasketResource::collection($products); // тестить
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BasketStoreRequest $request) // Добовляет в корзину пользователя продукт
    {
        $request->validated();
        $idUser = $request->idUser;
        $idProduct = $request->idProduct;
        
      
       /* $added_product = BasketProduct::create(
            [
            ['basket_id' => [Basket::select('id')->where('user_id', '=', $idUser)->get()]],
            ['product_id' => $idProduct]
        ]);*/
       
        $added_product = DB::insert(
            "INSERT INTO basket_products (product_id, basket_id)
            VALUES ({$idProduct}, (
    		    SELECT id
                FROM baskets
                WHERE user_id = {$idUser}))"
        );
        return $added_product; // протестить
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
    public function destroy(BasketStoreRequest $request)
    {
        $request->validated();
        $idUser = $request->idUser;
        $idProduct = $request->idProduct;

        $deleted_product = DB::delete(
            "DELETE TOP (1)
            FROM basket_products
            WHERE product_id = {$idProduct}
            AND basket_id = (
            SELECT id
            FROM baskets
            WHERE user_id = {$idUser})"
        );

        return $deleted_product; // протестить
    }
}
