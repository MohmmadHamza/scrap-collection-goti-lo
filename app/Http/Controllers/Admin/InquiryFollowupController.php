<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inquiry\InquiryFollowupRequest;
use App\Jobs\InquiryFollowup\CreateInquiryFollowup;
use App\Jobs\InquiryFollowup\DeleteInquiryFollowup;
use App\Jobs\InquiryFollowup\UpdateInquiryFollowup;
use App\Models\InquiryFollowUp;
use Illuminate\Http\Request;

class InquiryFollowupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $inquiryId = $request->query('inquiry_id'); // Retrieve inquiryId from the query string
        $inquiryAssignedId = $request->query('inquiry_assigned_id'); // Retrieve inquiryAssignedId from the query string
    
        $followUps = InquiryFollowUp::where('inquiry_id', $inquiryId)
        ->where('inquiry_assigned_id', $inquiryAssignedId)
        ->get();

    return response()->json($followUps);
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
        $inquiryFollowup = dispatch_sync(new CreateInquiryFollowup($request->validated()));
        return redirect()->route('inquiry.index')->with('success', 'Inquiry Followup successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
     
        $inquiryFollowup = InquiryFollowUp::findOrFail($id);

       
        return response()->json($inquiryFollowup);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InquiryFollowupRequest $request, string $id)
    {
        
        $inquiryFollowup = dispatch_sync(new UpdateInquiryFollowup($id, $request->validated()));

        return redirect()->route('inquiry.index')->with('success', 'Inquiry Followup  updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = dispatch_sync(new DeleteInquiryFollowup($id));
    
        if ($result) {
            return response()->json(['message' => 'Inquiry Followup deleted successfully.'], 200);
        }
    
        return response()->json(['error' => 'Error deleting Inquiry Followup'], 500);
    }
}
