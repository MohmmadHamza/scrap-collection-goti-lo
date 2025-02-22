<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inquiry\InquiryFollowupRequest;
use App\Http\Requests\Inquiry\InquiryRequest;
use App\Http\Resources\InquiryResource;
use App\Jobs\Inquiry\CreateInquiry;
use App\Jobs\Inquiry\DeleteInquiry;
use App\Jobs\Inquiry\UpdateInquiry;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Helpers\ApiResponseHelper;
class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get the pagination limit from the request or use the default
        $limit = $request->get('limit', config('pagination.pagination_limit'));
    
        // Get the search parameters from the request
        $userId = $request->get('user_id');
        $status = $request->get('status');
    
        // Start the query for inquiries
        $query = Inquiry::orderBy('created_at', 'asc');
    
        // If user_id is provided, filter inquiries by user_id
        if ($userId) {
            $query->where('user_id', $userId);
        }
    
        // Define the allowed status values
        $allowedStatuses = [
            'Awaiting Response from Vendor',
            'Awaiting Response from Zolio',
            'In Process',
            'Awaiting Customer Confirmation',
            'Pickup Scheduled',
            'Completed',
            'Cancelled',
            'Closed'
        ];
    
        // If status is provided, filter inquiries by status
        if ($status && in_array($status, $allowedStatuses)) {
            $query->where('status', $status);
        }
    
        // Paginate the results
        $inquiryQuestions = $query->paginate($limit);
    
        // Transform the inquiries using the InquiryResource
        $data = InquiryResource::collection($inquiryQuestions);
    
        // Return the response with the inquiry data
        return ApiResponseHelper::createResponse(__('All Inquiry Data'), true, 200, $data);
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
    public function store(InquiryFollowupRequest $request)
    {
       
      
        $inquiry = dispatch_sync(new CreateInquiry($request->validated()));

      
        return ApiResponseHelper::createResponse(
            "Inquiry Followup created successfully",
            true,
            201,
            $inquiry
        );  
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $inquiry = Inquiry::findOrFail($id);
            $data = new InquiryResource($inquiry);

            return ApiResponseHelper::createResponse(__('Inquiry Details'), true, 200, $data);
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::createResponse(__('Inquiry Not Found'), false, 404);
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
    public function update(InquiryFollowupRequest $request,$id)
    {
        $inquiry = dispatch_sync(new UpdateInquiry($id, $request->validated()));

        // Use ApiResponseHelper to format the response
        return ApiResponseHelper::createResponse(
            __('Inquiry Updated..'),
            true,
            201,
            $inquiry
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            dispatch_sync(new DeleteInquiry($id));

            return ApiResponseHelper::createResponse(__('Inquiry Deleted...'), true, 200);
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::createResponse(__('Inquiry Not Found'), false, 404);
        }
    }
}
