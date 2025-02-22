<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductQuestionAnswer\ProductQuestionAnswerRequest;
use App\Http\Resources\ProductQuestionAnswerResource;
use App\Jobs\ProductQuestionAnswer\CreateProductQuestionAnswer;
use App\Models\ProductQuestionAnswer;
use Illuminate\Http\Request;
use App\Helpers\ApiResponseHelper;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class ProductQuestionAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->get('limit', config('pagination.pagination_limit'));

        $productQuestionAnswer = ProductQuestionAnswer::orderBy('created_at', 'asc')->paginate($limit);
      
        $data = ProductQuestionAnswerResource::collection($productQuestionAnswer);

      
        return ApiResponseHelper::createResponse(__('All Product Question Answer Data'), true, 200, $data);
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
    public function store(ProductQuestionAnswerRequest $request)
    {
        $productQuestionAnswer = dispatch_sync(new CreateProductQuestionAnswer($request->validated()));

      
        return ApiResponseHelper::createResponse(
            "Product Question Answer created successfully",
            true,
            201,
            $productQuestionAnswer
        );  
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $product = ProductQuestionAnswer::findOrFail($id);
            $data = new ProductQuestionAnswerResource($product);

            return ApiResponseHelper::createResponse(__('Product Question Answer Details'), true, 200, $data);
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::createResponse(__('Product Question Answer Not Found'), false, 404);
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
