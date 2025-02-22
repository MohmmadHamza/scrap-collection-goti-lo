<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SubCategory\DeleteManySubCategory;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Jobs\SubCategory\CreateSubCategory;
use App\Jobs\SubCategory\UpdateSubCategory;
use App\Jobs\SubCategory\DeleteSubCategory;
use App\Http\Requests\SubCategory\SubCategoryRequest;

use Yajra\DataTables\Facades\DataTables;

use Carbon\Carbon;
class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      
        $categories = Category::all();
        return view('admin.subcategorie.list',compact('categories'))->with('title', 'Sub Categorys');
    }
    
   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::isActive()->get();
        return view('admin.subcategorie.form',compact('categories'));
    }

    public function list(Request $request)
    {
        $query = SubCategory::with('category');

     
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
       

        $subcategorys = $query->select(['id', 'name', 'category_id', 'description','created_at', 'status'])->get();

        return DataTables::of($subcategorys)
           
            ->addColumn('created_at', function ($subcategory) {
                return Carbon::parse($subcategory->created_at)->format('M d, Y');
            })
          
            ->addColumn('status', function ($subcategory) {
                $badge = $subcategory->status == 'active' ?
                    '<span class="badge bg-label-success">Active</span>' :
                    '<span class="badge bg-label-secondary">Inactive</span>';
                return $badge;
            })
            ->addColumn('actions', function ($subcategory) {
                return '
                    <div class="d-flex align-items-center">
                        <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill" 
                           onclick="confirmDelete(\'' . route('subcategory.destroy', ['subcategory' => $subcategory->id]) . '\')">
                            <i class="ti ti-trash ti-md"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="ti ti-dots-vertical ti-md"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end m-0">
                            <a href="' . route('subcategory.edit', $subcategory->id) . '" class="dropdown-item">Edit</a>
                            <a href="javascript:;" class="dropdown-item suspend-record" data-id="' . $subcategory->id . '">Suspend</a>
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
    public function store(SubCategoryRequest $request)
    {
        $sub_category = dispatch_sync(new CreateSubCategory($request->validated()));

      

        return redirect()->route('subcategory.index')->with('success', 'Subcategory created successfully.');
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
    public function edit(SubCategory $subcategory)
    {
        $categories = Category::isActive()->get();
        return view('admin.subcategorie.form', compact('subcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubCategoryRequest $request, $id)
    {
        $category = dispatch_sync(new UpdateSubCategory($id, $request->validated()));

        return redirect()->route('subcategory.index')->with('success', 'Subcategory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $result = dispatch_sync(new DeleteSubCategory($id));
    
        if ($result) {
            return response()->json(['message' => 'Sub Category deleted successfully.'], 200);
        }

        return response()->json(['error' => 'Error deleting Sub Category'], 500);
    }


    public function destroyMany(Request $request)
    {

        try {
            $payload = $request->all();
            $selected = array_keys($payload['Checkboxes']);

            dispatch(new DeleteManySubCategory($selected));

            return redirect()->route('subcategory.index')->with('success', 'Sub Category  deletion successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }
}
