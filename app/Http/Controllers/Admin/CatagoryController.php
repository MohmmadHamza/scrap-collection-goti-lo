<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\Category\DeleteManyCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Jobs\Category\CreateCategory;
use App\Jobs\Category\UpdateCategory;
use App\Jobs\Category\DeleteCategory;
use App\Http\Requests\Category\CategoryRequest;
use Yajra\DataTables\Facades\DataTables;

use Carbon\Carbon;

class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
       
       return view('admin.catagory.list')->with('title', 'Categorys');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.catagory.form');
    }


    public function list(Request $request)
    {
        $query = Category::query();

     
       
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
       

        $categorys = $query->select(['id', 'name','description', 'created_at','status']);

        return DataTables::of($categorys)
          
            ->addColumn('created_at', function ($category) {
                return Carbon::parse($category->created_at)->format('M d, Y');
            })
           
            ->addColumn('status', function ($category) {
                $badge = $category->status == 'active' ?
                    '<span class="badge bg-label-success">Active</span>' :
                    '<span class="badge bg-label-secondary">Inactive</span>';
                return $badge;
            })
            ->addColumn('actions', function ($category) {
                return '
                    <div class="d-flex align-items-center">
                        <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill" 
                           onclick="confirmDelete(\'' . route('category.destroy', ['category' => $category->id]) . '\')">
                            <i class="ti ti-trash ti-md"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="ti ti-dots-vertical ti-md"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end m-0">
                            <a href="' . route('category.edit', $category->id) . '" class="dropdown-item">Edit</a>
                            <a href="javascript:;" class="dropdown-item suspend-record" data-id="' . $category->id . '">Suspend</a>
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
    public function store(CategoryRequest $request)
    {
       
        $category = dispatch_sync(new CreateCategory($request->validated()));
        return redirect()->route('category.index')->with('success', 'Category created successfully.');
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
    public function edit(Category $category)
    {
        return view('admin.catagory.form',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = dispatch_sync(new UpdateCategory($id, $request->validated()));

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $result = dispatch_sync(new DeleteCategory($id));
    
        if ($result) {
            return response()->json(['message' => 'Category deleted successfully.'], 200);
        }
    
        return response()->json(['error' => 'Error deleting category'], 500);
    }


    public function destroyMany(Request $request)
    {
        try {
            $payload = $request->all();
            $job = new DeleteManyCategory($payload);
            dispatch_sync($job); 
    
            // Check the job results
            if ($job->errorOccurred) {
                if (!empty($job->deletedCategories)) {
                    return redirect()->route('category.index')->with('success', 'Some categories were deleted successfully, but some could not be deleted as they are assigned elsewhere.');
                } else {
                    return redirect()->route('category.index')->with('error', 'Cannot delete categories as they are assigned elsewhere.');
                }
            }
    
            return redirect()->route('category.index')->with('success', 'Categories deleted successfully.');
        } catch (\Exception $e) {
            \Log::error('Failed to delete categories: ' . $e->getMessage());
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }
    
    
    
}
