<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductQuestion\ProductQuestionRequest;
use App\Jobs\ProductQuestion\CreateProductQuestion;
use App\Jobs\ProductQuestion\DeleteManyProductQuestion;
use App\Jobs\ProductQuestion\DeleteProductQuestion;
use App\Jobs\ProductQuestion\UpdateProductQuestion;
use App\Models\Category;
use App\Models\ProductQuestion;
use App\Models\SubCategory;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;


class ProductQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product_question.list')->with('title', 'Product Question');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::isActive()->get();
        return view('admin.product_question.form', compact('categories'));
    }


   

    public function list(Request $request)
    {
        $query = ProductQuestion::with('subcategory');


        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }


        $productQuestions = $query->select(['id', 'subcategory_id', 'question_text', 'question_type', 'created_at', 'status']);

        return DataTables::of($productQuestions)

            ->addColumn('created_at', function ($productQuestion) {
                return Carbon::parse($productQuestion->created_at)->format('M d, Y');
            })

            ->addColumn('status', function ($productQuestion) {
                $badge = $productQuestion->status == 'active' ?
                    '<span class="badge bg-label-success">Active</span>' :
                    '<span class="badge bg-label-secondary">Inactive</span>';
                return $badge;
            })
            ->addColumn('actions', function ($productQuestion) {
                return '
                    <div class="d-flex align-items-center">
                        <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill" 
                           onclick="confirmDelete(\'' . route('product-question.destroy', $productQuestion->id) . '\')">
                            <i class="ti ti-trash ti-md"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="ti ti-dots-vertical ti-md"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end m-0">
                            <a href="' . route('product-question.edit', $productQuestion->id) . '" class="dropdown-item">Edit</a>
                            <a href="javascript:;" class="dropdown-item suspend-record" data-id="' . $productQuestion->id . '">Suspend</a>
                        </div>
                    </div>
                ';
            })

            ->rawColumns(['created_at', 'status', 'actions'])
            ->make(true);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductQuestionRequest $request)
    {
        $productQuestion = dispatch_sync(new CreateProductQuestion($request->validated()));
        return redirect()->route('product-question.index')->with('success', 'Product Question created successfully.');
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
    public function edit(ProductQuestion $productQuestion)
    {
        $categories = Category::isActive()->get();
        $subcategories = SubCategory::where('category_id', $productQuestion->subcategory->category_id)->isActive()->get();
        return view('admin.product_question.form', compact('categories', 'subcategories', 'productQuestion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductQuestionRequest $request, $id)
    {
        $productQuestion = dispatch_sync(new UpdateProductQuestion($id, $request->validated()));

        return redirect()->route('product-question.index')->with('success', 'Product Question updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $result = dispatch_sync(new DeleteProductQuestion($id));

        if ($result) {
            return response()->json(['message' => 'Product Question deleted successfully.'], 200);
        }

        return response()->json(['error' => 'Error deleting ProductQuestion'], 500);

    }

    public function destroyMany(Request $request)
    {

        try {
            $payload = $request->all();
            $selected = array_keys($payload['Checkboxes']);

            dispatch(new DeleteManyProductQuestion($selected));

            return redirect()->route('product.index')->with('success', 'Product  deletion successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }
}
