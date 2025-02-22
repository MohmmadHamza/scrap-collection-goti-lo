<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\BrandRequest;
use App\Jobs\Brand\CreateBrand;
use App\Jobs\Brand\DeleteBrand;
use App\Jobs\Brand\DeleteManyBrand;
use App\Jobs\Brand\UpdateBrand;
use App\Models\Brand;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;

use Carbon\Carbon;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('admin.brand.list')->with('title', 'Brands');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.form');
    }


    public function list(Request $request)
    {
        $query = Brand::query();

     
       
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
       

        $brands = $query->select(['id', 'name','description','sort_order', 'created_at','status']);

        return DataTables::of($brands)
          
            ->addColumn('created_at', function ($brand) {
                return Carbon::parse($brand->created_at)->format('M d, Y');
            })
           
            ->addColumn('status', function ($brand) {
                $badge = $brand->status == 'active' ?
                    '<span class="badge bg-label-success">Active</span>' :
                    '<span class="badge bg-label-secondary">Inactive</span>';
                return $badge;
            })
            ->addColumn('actions', function ($brand) {
                return '
                    <div class="d-flex align-items-center">
                        <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill" 
                           onclick="confirmDelete(\'' . route('brand.destroy', ['brand' => $brand->id]) . '\')">
                            <i class="ti ti-trash ti-md"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="ti ti-dots-vertical ti-md"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end m-0">
                            <a href="' . route('brand.edit', $brand->id) . '" class="dropdown-item">Edit</a>
                            <a href="javascript:;" class="dropdown-item suspend-record" data-id="' . $brand->id . '">Suspend</a>
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
    public function store(BrandRequest $request)
    {
        $brand = dispatch_sync(new CreateBrand($request->validated()));
        return redirect()->route('brand.index')->with('success', 'Brand created successfully.');
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
    public function edit(Brand $brand)
    {
        return view('admin.brand.form',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request,$id)
    {
        $brand = dispatch_sync(new UpdateBrand($id, $request->validated()));

        return redirect()->route('brand.index')->with('success', 'Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $result = dispatch_sync(new DeleteBrand($id));
    
        if ($result) {
            return response()->json(['message' => 'Brand deleted successfully.'], 200);
        }
    
        return response()->json(['error' => 'Error deleting Brand'], 500);
    }


    public function destroyMany(Request $request)
    {

        try {
            $payload = $request->all();
            $selected = array_keys($payload['Checkboxes']);

            dispatch(new DeleteManyBrand($selected));

            return redirect()->route('brand.index')->with('success', 'Brand  deletion successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }
}
