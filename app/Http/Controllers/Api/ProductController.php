<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreProductRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use \Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */

    public function index(): AnonymousResourceCollection
    {
        $products = Product::with(['currency', 'prices.currency'])
            ->paginate(10);

            return ProductResource::collection($products);             
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(StoreProductRequest $request)
    {

             $product = Product::create($request->validated());
        $product->load(['currency', 'prices.currency']);

        return response()->json([
            'message' => 'Product created successfully',
            'data' => new ProductResource($product)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */

    public function show(Product $product): JsonResponse
    {

       $product->load(['currency', 'prices.currency']);

        return response()->json([
            'data' => new ProductResource($product)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */

    public function update(UpdateProductRequest $request, Product $product): JsonResponse
    {
 
      $product->update($request->validated());
        $product->load(['currency', 'prices.currency']);

        return response()->json([
            'message' => 'Product updated successfully',
            'data' => new ProductResource($product)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */

    public function destroy(Product $product): JsonResponse
    {
    
        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }
}
