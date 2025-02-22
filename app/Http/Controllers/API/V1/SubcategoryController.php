<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory\SubCategoryRequest;
use App\Http\Resources\SubcategoryResource;
use App\Jobs\SubCategory\CreateSubCategory;
use App\Jobs\SubCategory\DeleteSubCategory;
use App\Jobs\SubCategory\UpdateSubCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Helpers\ApiResponseHelper;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->get('limit', config('pagination.pagination_limit'));
        $categoryId = $request->get('category_id');
        $searchTerm = $request->get('search'); // Adjusted from 'name' to 'search' for consistency
    
        $query = SubCategory::isActive()->orderBy('name', 'asc');
    
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }
    
        if ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }
    
        $sub_categories = $query->paginate($limit);
        $data = SubcategoryResource::collection($sub_categories);
    
        return ApiResponseHelper::createResponse(__('Sub Category List'), true, 200, $data);
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
    public function store(SubCategoryRequest $request)
    {
        
        $sub_category = dispatch_sync(new CreateSubCategory($request->validated()));

      
      
        return ApiResponseHelper::createResponse(
            "Sub Category created successfully",
            true,
            201,
            $sub_category
        );
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $sub_category = SubCategory::findOrFail($id);
            $data = new SubcategoryResource($sub_category);

            return ApiResponseHelper::createResponse(__('messages.sub_category_details_success'), true, 200, $data);
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::createResponse(__('messages.sub_category_not_found'), false, 404);
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
    public function update(SubCategoryRequest $request, $id)
    {
        $category = dispatch_sync(new UpdateSubCategory($id, $request->validated()));

        // Use ApiResponseHelper to format the response
        return ApiResponseHelper::createResponse(
            __('messages.sub_category_updated_success'),
            true,
            201,
            $category
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            dispatch_sync(new DeleteSubCategory($id));

            return ApiResponseHelper::createResponse(__('Sub Category Deleted...'), true, 200);
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::createResponse(__('Sub Category Not Found'), false, 404);
        }
    }
    
}
