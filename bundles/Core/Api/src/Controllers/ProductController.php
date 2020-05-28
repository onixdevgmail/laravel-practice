<?php

namespace Core\Api\Controllers;

use App\Http\Controllers\ApiController;
use Core\Api\Models\Product;
use Core\Api\Requests\ProductCreateRequest;
use Core\Api\Requests\ProductUpdateRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class ProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return Product[]|Collection
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductCreateRequest $request
     *
     * @return JsonResponse
     */
    public function store(ProductCreateRequest $request)
    {
        $product = Product::create($request->all());

        return response()->json($product);
    }

    /**
     * Display the specified resource.
     *
     * @param int $product
     *
     * @return JsonResponse
     */
    public function show($product)
    {
        return Product::findOrFail($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductUpdateRequest $request
     * @param int                  $product
     *
     * @return JsonResponse
     */
    public function update(ProductUpdateRequest $request, $product)
    {
        $product = Product::findOrFail($product);
        $product->update($request->all());

        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $product
     *
     * @return JsonResponse
     */
    public function destroy($product)
    {
        $product = Product::findOrFail($product);
        $product->delete();

        return response()->json(["success" => true]);
    }
}
