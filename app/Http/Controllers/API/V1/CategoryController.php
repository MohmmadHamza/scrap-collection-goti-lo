<?php

namespace App\Http\Controllers\API\V1;

use App\Helpers\ApiResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Jobs\Category\CreateCategory;
use App\Jobs\Category\UpdateCategory;
use App\Jobs\Category\DeleteCategory;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $limit = $request->get('limit', config('pagination.pagination_limit'));
        
        $searchTerm = $request->get('search'); 
    
     
        $query = Category::isActive();
    
     
        if ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }
    
        
        $categories = $query->orderBy('name', 'asc')->paginate($limit);
    
        
        $data = CategoryResource::collection($categories);
    
        
        return ApiResponseHelper::createResponse(__('category List'), true, 200, $data);
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
    public function store(CategoryRequest $request)
    {
        $category = dispatch_sync(new CreateCategory($request->validated()));

      
        return ApiResponseHelper::createResponse(
            "Category created successfully",
            true,
            201,
            $category
        );
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $category = Category::findOrFail($id);
            $data = new CategoryResource($category);

            return ApiResponseHelper::createResponse(__('messages.category_details_success'), true, 200, $data);
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::createResponse(__('messages.category_not_found'), false, 404);
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
    public function update(CategoryRequest $request, $id)
    {
        $category = dispatch_sync(new UpdateCategory($id, $request->validated()));

        // Use ApiResponseHelper to format the response
        return ApiResponseHelper::createResponse(
            __('messages.category_updated_success'),
            true,
            201,
            $category
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            dispatch_sync(new DeleteCategory($id));

            return ApiResponseHelper::createResponse(__('messages.category_deleted_success'), true, 200);
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::createResponse(__('messages.category_not_found'), false, 404);
        }
    }
}
