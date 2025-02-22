<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InquiryValuation\InquiryValuationRequest;
use App\Jobs\InquiryValuation\CreateInquiryValuation;
use App\Jobs\InquiryValuation\DeleteInquiryValuation;
use App\Jobs\InquiryValuation\UpdateInquiryValuation;
use App\Models\InquiryValuation;
use Illuminate\Http\Request;

class InquiryValuationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(InquiryValuationRequest $request)
    {
        $inquiryValuation = dispatch_sync(new CreateInquiryValuation($request->validated()));
        return redirect()->route('inquiry.index')->with('success', 'Inquiry Valuation successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $inquiry_assigned_id)
    {
        
        $valuations = InquiryValuation::where('inquiry_assigned_id', $inquiry_assigned_id)
            ->with('user')
            ->get();
    
        return response()->json($valuations);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $valuation = InquiryValuation::findOrFail($id);
        return response()->json($valuation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InquiryValuationRequest $request, $id)
    {
        $valuation = dispatch_sync(new UpdateInquiryValuation($id, $request->validated()));

        return redirect()->route('inquiry.index')->with('success', 'Inquiry Valuation  updated successfully.');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = dispatch_sync(new DeleteInquiryValuation($id));
    
        if ($result) {
            return response()->json(['message' => 'Inquiry Valuation deleted successfully.'], 200);
        }
    
        return response()->json(['error' => 'Error deleting Inquiry Valuation'], 500);
    }
}
