<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Jobs\Product\CreateProduct;
use App\Jobs\Product\DeleteProduct;
use App\Jobs\Product\UpdateProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\ApiResponseHelper;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get pagination limit from request or config
        $limit = $request->get('limit', config('pagination.pagination_limit'));
    
        // Start the query with the active products
        $query = Product::isActive();
    
        // Filter by category_id if provided
        if ($request->has('category_id') && $request->get('category_id') !== null) {
            $query->where('category_id', $request->get('category_id'));
        }
    
        // Filter by subcategory_id if provided
        if ($request->has('subcategory_id') && $request->get('subcategory_id') !== null) {
            $query->where('subcategory_id', $request->get('subcategory_id'));
        }
    
        // Filter by brand_id if provided
        if ($request->has('brand_id') && $request->get('brand_id') !== null) {
            $query->where('brand_id', $request->get('brand_id'));
        }
    
        // Filter by user_id if provided
        if ($request->has('user_id') && $request->get('user_id') !== null) {
            $query->where('user_id', $request->get('user_id'));
        }
    
        // Filter by name if provided
        if ($request->has('name') && $request->get('name') !== null) {
            $query->where('name', 'like', '%' . $request->get('name') . '%');
        }
    
        // Order the results by name
        $products = $query->orderBy('name', 'asc')->paginate($limit);
    
        // Transform the product collection to the resource format
        $data = ProductResource::collection($products);
    
        // Return the response
        return ApiResponseHelper::createResponse(__('Product list'), true, 200, $data);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = dispatch_sync(new CreateProduct($request->validated()));

      
        return ApiResponseHelper::createResponse(
            "Product created successfully",
            true,
            201,
            $product
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $product = Product::findOrFail($id);
            $data = new ProductResource($product);

            return ApiResponseHelper::createResponse(__('product Details'), true, 200, $data);
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::createResponse(__('product Not Found'), false, 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request,$id)
    {
        $product = dispatch_sync(new UpdateProduct($id, $request->validated()));

        // Use ApiResponseHelper to format the response
        return ApiResponseHelper::createResponse(
            __('Product Updated..'),
            true,
            201,
            $product
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            dispatch_sync(new DeleteProduct($id));

            return ApiResponseHelper::createResponse(__('Product Deleted...'), true, 200);
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::createResponse(__('Product Not Found'), false, 404);
        }
    }
}
