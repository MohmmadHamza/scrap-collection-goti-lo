<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InqueryQuestion\InqueryQuestionRequest;
use App\Jobs\InqueryQuestion\CreateInqueryQuestion;
use App\Jobs\InqueryQuestion\DeleteManyInquiryQuestion;
use App\Jobs\InqueryQuestion\UpdateInqueryQuestion;
use App\Jobs\InqueryQuestion\DeleteInquiryQuestion;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\InquiryQuestion;

use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class InquiryQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategorys = SubCategory::all();
        return view('admin.inquery_quetion.list',compact('subcategorys'))->with('title', 'Inquery Questions');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::isActive()->get();
       return view('admin.inquery_quetion.form',compact('categories'));
    }

    public function list(Request $request)
    {
        $query = InquiryQuestion::with('subcategory');

     
       
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        
        if ($request->filled('subcategory_id')) {
            $query->where('subcategory_id', $request->subcategory_id);
        }
       

        $inqueryQuestions = $query->select(['id','question_text','question_type','subcategory_id', 'created_at','status']);

        return DataTables::of($inqueryQuestions)
          
            ->addColumn('created_at', function ($inqueryQuestion) {
                return Carbon::parse($inqueryQuestion->created_at)->format('M d, Y');
            })
           
            ->addColumn('status', function ($inqueryQuestion) {
                $badge = $inqueryQuestion->status == 'active' ?
                    '<span class="badge bg-label-success">Active</span>' :
                    '<span class="badge bg-label-secondary">Inactive</span>';
                return $badge;
            })
            ->addColumn('actions', function ($inqueryQuestion) {
                return '
                    <div class="d-flex align-items-center">
                        <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill" 
                           onclick="confirmDelete(\'' . route('inquery-question.destroy', $inqueryQuestion->id) . '\')">
                            <i class="ti ti-trash ti-md"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="ti ti-dots-vertical ti-md"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end m-0">
                            <a href="' . route('inquery-question.edit', $inqueryQuestion->id) . '" class="dropdown-item">Edit</a>
                            <a href="javascript:;" class="dropdown-item suspend-record" data-id="' . $inqueryQuestion->id . '">Suspend</a>
                        </div>
                    </div>
                ';
            })
            
            ->rawColumns(['created_at','status', 'actions'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InqueryQuestionRequest $request)
    {
        $inqueryQuestion = dispatch_sync(new CreateInqueryQuestion($request->validated()));
        return redirect()->route('inquery-question.index')->with('success', 'Inquery Question created successfully.');
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
    public function edit(InquiryQuestion $inqueryQuestion)
    {
        $categories = Category::isActive()->get();
        $subcategories = SubCategory::where('category_id', $inqueryQuestion->subcategory->category_id)->isActive()->get();
        return view('admin.inquery_quetion.form',compact('categories','subcategories','inqueryQuestion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InqueryQuestionRequest $request,$id)
    {
        $inqueryQuestion = dispatch_sync(new UpdateInqueryQuestion($id, $request->validated()));

        return redirect()->route('inquery-question.index')->with('success', 'Inquery Question updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $result = dispatch_sync(new DeleteInquiryQuestion($id));
    
        if ($result) {
            return response()->json(['message' => 'Inquiry Question deleted successfully.'], 200);
        }
    
        return response()->json(['error' => 'Error deleting InquiryQuestion'], 500);
        
    }

    public function destroyMany(Request $request)
    {

        try {
            $payload = $request->all();
            $selected = array_keys($payload['Checkboxes']);

            dispatch(new DeleteManyInquiryQuestion($selected));

            return redirect()->route('inquery-question.index')->with('success', 'Inquiry Question  deletion successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }
}
