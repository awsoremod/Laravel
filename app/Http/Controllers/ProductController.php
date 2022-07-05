<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductIndexRequest;

class ProductController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(ProductIndexRequest $request)
	{
		$request->validated();
		$limit = $request->limit;
		$page = $request->page;
		$stock = $request->stock;
		$id = $request->id;
		$brands = $request->brands;

		$isWhere = false;
		$addSqlOrder = 'DESC';
		$addSqlShops = '';
		$addSqlWhere = '';
		$addSqlType = '';

		// if (sort === 'yes') {
		// 	$addSqlOrder = 'ASC';
		// }
		// if (stock === 'yes') {
		// 	$addSqlShops = 
		// 	"JOIN Shop_Product ON Product.product_id = Shop_Product.product_id";
		// }

		// if ($brands) {
		// 	for ($i of $brands) {
		// 		$obj = JSON.parse(i);
		// 		if ($isWhere) {
		// 			$addSqlWhere += "Product.brand_id = {$obj->id} OR ";
		// 		} else {
		// 			$addSqlWhere += "WHERE (Product.brand_id = {$obj->id} OR ";
		// 			$isWhere = true;
		// 		}
		// 	}
		// 	$addSqlWhere = $addSqlWhere.slice(0, $addSqlWhere.length - 3);
		// 	$addSqlWhere += ')';
		// }

		// 	if ($isWhere) {
		// 		$addSqlType = "AND Product.type_id = {$id}";
		// 	} else {
		// 		$addSqlType = "WHERE Product.type_id = {$id}";
		// 	}

		// 	$result = DB::select(
		// "WITH SOURCE AS (
		// 	SELECT ROW_NUMBER() OVER (ORDER BY product_price {$addSqlOrder}) AS RowNumber,
		// 	product_id AS id, type_name AS type, brand_name AS brand,
		// 	product_name AS name, product_price AS price
		// 	FROM (
		// 		SELECT DISTINCT Product.product_id, TypeProduct.type_name, Brand.brand_name,
		// 		Product.product_name, Product.product_price
		// 		FROM Product
		// 		JOIN Brand ON Product.brand_id = Brand.brand_id
		// 		JOIN TypeProduct ON Product.type_id = TypeProduct.type_id
		// 		{$addSqlShops}
		// 		{$addSqlWhere}
		// 		{$addSqlType}
		// 	) AS X
		// )
		// SELECT id, type, brand, name, price
		// FROM SOURCE
		// WHERE RowNumber > ({$limit} * {$page}) - {$limit}
		// AND RowNumber <= {$limit} * {$page}
		// SELECT count(*) AS [valueCount]
		// FROM (
		// 	SELECT DISTINCT Product.product_id FROM Product
		// 	{$addSqlShops}
		// 	{$addSqlWhere}
		// 	{$addSqlType}
		// ) AS G");
		// 	$response = [];
		// 	$response['count'] = $result.recordsets[1][0].valueCount;
		// 	$response['rows'] = $result.recordset;

		// return $response;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
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
