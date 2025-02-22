<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductQuestionResource;
use App\Models\ProductQuestion;
use Illuminate\Http\Request;
use App\Helpers\ApiResponseHelper;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Get pagination limit from request or config
    $limit = $request->get('limit', config('pagination.pagination_limit'));

    // Start the query with active product questions
    $query = ProductQuestion::isActive();

    // Filter by subcategory_id if provided
    if ($request->has('subcategory_id') && $request->get('subcategory_id') !== null) {
        $query->where('subcategory_id', $request->get('subcategory_id'));
    }

    // Filter by question_type if provided
    if ($request->has('question_type') && $request->get('question_type') !== null) {
        $questionTypes = ['mcq', 'brand', 'text', 'image', 'video', 'document', 'long_text', 'select', 'numeric'];
        
        // Ensure the question_type is valid
        if (in_array($request->get('question_type'), $questionTypes)) {
            $query->where('question_type', $request->get('question_type'));
        }
    }

    // Order the results by sort_order first, then by question_text
    $productQuestion = $query->orderBy('sort_order', 'asc')->orderBy('question_text', 'asc')->paginate($limit);

    // Transform the product question collection to the resource format
    $data = ProductQuestionResource::collection($productQuestion);

    // Return the response
    return ApiResponseHelper::createResponse(__('All ProductQuestion Data'), true, 200, $data);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $productQuestion = ProductQuestion::findOrFail($id);
            $data = new ProductQuestionResource($productQuestion);

            return ApiResponseHelper::createResponse(__('Product Question Details'), true, 200, $data);
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::createResponse(__('Product Question Not Found'), false, 404);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
