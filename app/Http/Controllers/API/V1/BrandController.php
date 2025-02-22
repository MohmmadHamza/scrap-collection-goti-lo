<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\BrandRequest;
use App\Http\Resources\BrandResource;
use App\Jobs\Brand\CreateBrand;
use App\Jobs\Brand\DeleteBrand;
use App\Jobs\Brand\UpdateBrand;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Helpers\ApiResponseHelper;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       
        $limit = $request->get('limit', config('pagination.pagination_limit'));
    
       
        $searchTerm = $request->get('search');
    
       
        $query = Brand::isActive();
    
       
        if ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }
    
       
        $brands = $query->orderBy('name', 'asc')->paginate($limit);
    
       
        $data = BrandResource::collection($brands);
    
       
        return ApiResponseHelper::createResponse(__('Brand list'), true, 200, $data);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $brand = dispatch_sync(new CreateBrand($request->validated()));

      
        return ApiResponseHelper::createResponse(
            "Brand created successfully",
            true,
            201,
            $brand
        );  
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $brand = Brand::findOrFail($id);
            $data = new BrandResource($brand);

            return ApiResponseHelper::createResponse(__('Brand Details'), true, 200, $data);
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::createResponse(__('Brand Not Found'), false, 404);
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
    public function update(BrandRequest $request, $id)
    {
        $brand = dispatch_sync(new UpdateBrand($id, $request->validated()));

        // Use ApiResponseHelper to format the response
        return ApiResponseHelper::createResponse(
            __('Brand Updated..'),
            true,
            201,
            $brand
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            dispatch_sync(new DeleteBrand($id));

            return ApiResponseHelper::createResponse(__('Brand Deleted...'), true, 200);
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::createResponse(__('Brand Not Found'), false, 404);
        }
    }
}
