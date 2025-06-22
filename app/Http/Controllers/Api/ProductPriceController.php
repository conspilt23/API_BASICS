<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductPriceRequest;
use App\Http\Resources\ProductPriceResource;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductPriceController extends Controller
{
    /**
     * Display a listing of the product prices.
     */
    public function index(Product $product): AnonymousResourceCollection
    {
        $prices = $product->prices()->with('currency')->get();
        
        return ProductPriceResource::collection($prices);
    }

    /**
     * Store a newly created product price.
     */
    public function store(StoreProductPriceRequest $request, Product $product): JsonResponse
    {
        $data = $request->validated();
        $data['product_id'] = $product->id;

        // Check if price already exists for this currency
        $existingPrice = ProductPrice::where('product_id', $product->id)
            ->where('currency_id', $data['currency_id'])
            ->first();

        if ($existingPrice) {
            $existingPrice->update(['price' => $data['price']]);
            $existingPrice->load('currency');
            
            return response()->json([
                'message' => 'Product price updated successfully',
                'data' => new ProductPriceResource($existingPrice)
            ]);
        }

        $productPrice = ProductPrice::create($data);
        $productPrice->load('currency');

        return response()->json([
            'message' => 'Product price created successfully',
            'data' => new ProductPriceResource($productPrice)
        ], 201);
    }
}
