<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\InquiryQuestionAnswer\InquiryQuestionAnswerRequest;
use App\Http\Resources\InquiryQuestionAnswerResource;
use App\Jobs\InquiryQuestionAnswer\CreateInquiryQuestionAnswer;
use App\Models\InquiryQuestionAnswer;
use Illuminate\Http\Request;
use App\Helpers\ApiResponseHelper;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class InquiryQuestionAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->get('limit', config('pagination.pagination_limit'));

        $inquiryQuestionAnswer = InquiryQuestionAnswer::orderBy('created_at', 'asc')->paginate($limit);
      
        $data = InquiryQuestionAnswerResource::collection($inquiryQuestionAnswer);

      
        return ApiResponseHelper::createResponse(__('All Inquiry Question Answer Data'), true, 200, $data);
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
    public function store(InquiryQuestionAnswerRequest $request)
    {
       
        $inquiryQuestionAnswer = dispatch_sync(new CreateInquiryQuestionAnswer($request->validated()));

      
        return ApiResponseHelper::createResponse(
            "Inquiry Question Answer created successfully",
            true,
            201,
            $inquiryQuestionAnswer
        );  
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $inquiry = InquiryQuestionAnswer::findOrFail($id);
            $data = new InquiryQuestionAnswerResource($inquiry);

            return ApiResponseHelper::createResponse(__('Inquiry Question Answer Details'), true, 200, $data);
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::createResponse(__('Inquiry Question Answer Not Found'), false, 404);
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
