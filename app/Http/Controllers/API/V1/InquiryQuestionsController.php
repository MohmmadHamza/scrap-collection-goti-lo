<?php

namespace App\Http\Controllers\API\V1;


use App\Helpers\ApiResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\InqueryQuestionResource;
use Illuminate\Http\Request;
use App\Models\InquiryQuestion;

use App\Jobs\InqueryQuestion\CreateInqueryQuestion;
use App\Jobs\InqueryQuestion\UpdateInqueryQuestion;
use App\Jobs\InqueryQuestion\DeleteInquiryQuestion;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Requests\InqueryQuestion\InqueryQuestionRequest;

class InquiryQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */


   


    public function index(Request $request)
{
    // Get the pagination limit from the request or use the default
    $limit = $request->get('limit', config('pagination.pagination_limit'));

    // Get the subcategory ID from the request
    $subcategoryId = $request->get('subcategory_id');

    // Start the query for inquiry questions
    $query = InquiryQuestion::isActive();

    // If subcategory_id is provided, filter inquiry questions by subcategory_id
    if ($subcategoryId) {
        $query->where('subcategory_id', $subcategoryId);
    }

    // Sort the results by sort_order in ascending order
    $query->orderBy('sort_order', 'asc');

    // Paginate the results
    $inquiryQuestions = $query->paginate($limit);

    // Transform the inquiry questions using the InquiryQuestionResource
    $data = InqueryQuestionResource::collection($inquiryQuestions);

    // Return the response with the inquiry question data
    return ApiResponseHelper::createResponse(__('All InquiryQuestion Data'), true, 200, $data);
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

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $inquiryQuestion = InquiryQuestion::findOrFail($id);
            $data = new InqueryQuestionResource($inquiryQuestion);

            return ApiResponseHelper::createResponse(__('Inquiry Question Details'), true, 200, $data);
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::createResponse(__('Inquiry Question Not Found'), false, 404);
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
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
