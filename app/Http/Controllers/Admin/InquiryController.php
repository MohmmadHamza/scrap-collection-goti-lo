<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inquiry\InquiryFollowupRequest;
use App\Jobs\Inquiry\CreateInquiry;
use App\Jobs\Inquiry\DeleteInquiry;
use App\Jobs\Inquiry\DeleteManyInquiry;
use App\Jobs\Inquiry\UpdateInquiry;
use App\Jobs\InquiryFollowup\CreateInquiryFollowup;
use App\Models\Category;
use App\Models\Inquiry;
use App\Models\InquiryAssigned;
use App\Models\InquiryFollowUp;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.inquiry.list', compact('users'))->with('title', 'Inquiry');
    }

  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();

        $categorys = Category::isActive()->get();


        return view('admin.inquiry.form', compact('categorys', 'users'));
    }



    public function list(Request $request)
    {
        $userId = Auth::id();


        $query = InquiryAssigned::with(['inquiry', 'user'])
            ->where('user_id', $userId)
            ->when($request->filled('status'), function ($query) use ($request) {

                $query->where('status', $request->status);
            })
            ->when($request->filled('user_id'), function ($query) use ($request) {

                $query->where('user_id', $request->user_id);
            })
            ->when($request->filled('category_id'), function ($query) use ($request) {

                $query->whereHas('inquiry', function ($query) use ($request) {
                    $query->where('category_id', $request->category_id);
                });
            })
            ->select(['id', 'user_id', 'status', 'created_at', 'inquiry_id']);


        return DataTables::of($query)
            ->addColumn('user', function ($inquiryAssigned) {
                return $inquiryAssigned->user->name ?? 'N/A';
            })
            ->addColumn('category', function ($inquiryAssigned) {
                return $inquiryAssigned->inquiry->category->name ?? 'N/A';
            })
            ->addColumn('sub_category', function ($inquiryAssigned) {
                return $inquiryAssigned->inquiry->subcategory->name ?? 'N/A';
            })
            ->addColumn('zolio_status', function ($inquiryAssigned) {
                return $inquiryAssigned->inquiry->zolio_status ?? 'N/A';
            })
            ->addColumn('created_at', function ($inquiryAssigned) {
                return Carbon::parse($inquiryAssigned->created_at)->format('M d, Y');
            })
            ->addColumn('status', function ($inquiryAssigned) {
                $statusColors = [
                    'Awaiting Response from Vendor' => 'bg-label-warning',
                    'Awaiting Response from Zolio' => 'bg-label-warning',
                    'In Process' => 'bg-label-info',
                    'Awaiting Customer Confirmation' => 'bg-label-primary',
                    'Pickup Scheduled' => 'bg-label-dark',
                    'Completed' => 'bg-label-success',
                    'Cancelled' => 'bg-label-danger',
                    'Closed' => 'bg-label-secondary',
                ];

                $statusText = $inquiryAssigned->status;
                $badgeClass = $statusColors[$statusText] ?? 'bg-label-secondary';

                return '<span class="badge ' . $badgeClass . '">' . $statusText . '</span>';
            })
            ->addColumn('actions', function ($inquiryAssigned) {
                return '
                <div class="d-flex align-items-center">
                    <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill" 
                       onclick="confirmDelete(\'' . route('inquiry.destroy', ['inquiry' => $inquiryAssigned->inquiry_id]) . '\')">
                        <i class="ti ti-trash ti-md"></i>
                    </a>
                    <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="ti ti-dots-vertical ti-md"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end m-0">
                        <a href="' . route('inquiry.edit', $inquiryAssigned->inquiry_id) . '" class="dropdown-item">Edit</a>
                       
                        <a href="javascript:;" class="dropdown-item suspend-record" 
                           data-id="' . $inquiryAssigned->inquiry_id . '" 
                           onclick="openFollowUpModal(\'add\',' . $inquiryAssigned->inquiry_id . ', ' . $inquiryAssigned->id . ')">
                           Follow Up
                        </a>
                         <a href="javascript:;" class="dropdown-item suspend-record" 
                           data-id="' . $inquiryAssigned->inquiry_id . '" 
                           onclick="openFollowUpModalList(' . $inquiryAssigned->inquiry_id . ', ' . $inquiryAssigned->id . ')">
                           Follow Up List
                        </a>

                       <a href="javascript:;" class="dropdown-item suspend-record" 
                        data-id="' . $inquiryAssigned->id . '" 
                        onclick="openValuation(' . $inquiryAssigned->id . ')">
                        Inquiry Valuation
                        </a>

                        <a href="javascript:;" class="dropdown-item suspend-record" 
                        data-id="' . $inquiryAssigned->id . '" 
                        onclick="openValuationList(' . $inquiryAssigned->id . ')">
                        Inquiry Valuation List
                        </a>

                         <a href="javascript:;" class="dropdown-item suspend-record" 
                        data-id="' . $inquiryAssigned->id . '" 
                        onclick="openInquiryPickup(\'add\',' . $inquiryAssigned->id . ')">
                        Inquiry Pickup
                        </a>

                         <a href="javascript:;" class="dropdown-item suspend-record" 
                        data-id="' . $inquiryAssigned->id . '" 
                        onclick="openInquiryPickupList(' . $inquiryAssigned->id . ')">
                        Inquiry Pickup List
                        </a>

                            
                    </div>
                </div>';
            })

            ->rawColumns(['status', 'actions'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InquiryFollowupRequest $request)
    {

        $inquiryFollowup = dispatch_sync(new CreateInquiryFollowup($request->validated()));
        return redirect()->route('inquiry_followup.index')->with('success', 'Inquery Followup created successfully.');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inquiry $inquiry)
    {

        $users = User::all();
        $categorys = Category::isActive()->get();
        $subcategories = SubCategory::where('category_id', $inquiry->category_id)->get();

        return view('admin.inquiry.form', compact('users', 'categorys', 'inquiry', 'subcategories'));
    }


    public function getSubcategories($categoryId)
    {
        $subcategories = SubCategory::where('category_id', $categoryId)->get();
        return response()->json($subcategories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InquiryFollowupRequest $request, $id)
    {
        $inquiry = dispatch_sync(new UpdateInquiry($id, $request->validated()));

        return redirect()->route('inquiry.index')->with('success', 'Inquiry updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $result = dispatch_sync(new DeleteInquiry($id));

        if ($result) {
            return response()->json(['message' => 'Inquiry deleted successfully.'], 200);
        }

        return response()->json(['error' => 'Error deleting Inquiry'], 500);

    }

    public function destroyMany(Request $request)
    {

        try {
            $payload = $request->all();
            $selected = array_keys($payload['Checkboxes']);

            dispatch(new DeleteManyInquiry($selected));

            return redirect()->route('inquiry.index')->with('success', 'Inquiry  deletion successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }
}
