<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InquiryPickup\InquiryPickupRequest;
use App\Jobs\InquiryPickup\CreateInquiryPickup;
use App\Jobs\InquiryPickup\DeleteInquiryPickup;
use App\Jobs\InquiryPickup\UpdateInquiryPickup;
use App\Models\InquiryPickup;
use Illuminate\Http\Request;

class InquiryPickupController extends Controller
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
    public function store(InquiryPickupRequest $request)
    {
        $inquiryPickup = dispatch_sync(new CreateInquiryPickup($request->validated()));
        return redirect()->route('inquiry.index')->with('success', 'Inquiry Valuation successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $inquiry_assigned_id)
    {
        $inquiryPickup = InquiryPickup::where('inquiry_assigned_id', $inquiry_assigned_id)
            ->with('user')
            ->get();
    
        return response()->json($inquiryPickup);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $inquiryPickup = InquiryPickup::findOrFail($id);
        return response()->json($inquiryPickup);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InquiryPickupRequest $request, string $id)
    {
      
        $inquiryPickup = dispatch_sync(new UpdateInquiryPickup($id, $request->validated()));

        return redirect()->route('inquiry.index')->with('success', 'Inquiry Pickup  updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = dispatch_sync(new DeleteInquiryPickup($id));
    
        if ($result) {
            return response()->json(['message' => 'Inquiry Pickup deleted successfully.'], 200);
        }
    
        return response()->json(['error' => 'Error deleting Inquiry Pickup'], 500);
    }
}
