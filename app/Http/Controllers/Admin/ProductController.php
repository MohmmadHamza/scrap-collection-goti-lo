<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Jobs\Product\CreateProduct;
use App\Jobs\Product\DeleteManyProduct;
use App\Jobs\Product\DeleteProduct;
use App\Jobs\Product\UpdateProduct;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.product.list', compact('users'))->with('title', 'Product');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::isActive()->get();
        $brands = Brand::isActive()->get();
        $users = User::all();
        return view('admin.product.form', compact('categories', 'brands', 'users'));
    }


    public function list(Request $request)   
    {
        $query = Product::with('category', 'subcategory', 'brand','user');


        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }
        
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }


        $products = $query->select(['id', 'name', 'description', 'price',  'category_id', 'brand_id', 'user_id', 'created_at', 'status']);

        return DataTables::of($products)

            ->addColumn('created_at', function ($product) {
                return Carbon::parse($product->created_at)->format('M d, Y');
            })

            ->addColumn('status', function ($product) {
                $badge = $product->status == 'active' ?
                    '<span class="badge bg-label-success">Active</span>' :
                    '<span class="badge bg-label-secondary">Inactive</span>';
                return $badge;
            })
            ->addColumn('actions', function ($product) {
                return '
                    <div class="d-flex align-items-center">
                        <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill" 
                           onclick="confirmDelete(\'' . route('product.destroy', ['product' => $product->id]) . '\')">
                            <i class="ti ti-trash ti-md"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="ti ti-dots-vertical ti-md"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end m-0">
                            <a href="' . route('product.edit', $product->id) . '" class="dropdown-item">Edit</a>
                            <a href="javascript:;" class="dropdown-item suspend-record" data-id="' . $product->id . '">Suspend</a>
                        </div>
                    </div>
                ';
            })
            ->rawColumns(['created_at', 'status', 'actions'])
            ->make(true);

    }

    public function getSubcategories($categoryId)
    {
        $subcategories = SubCategory::where('category_id', $categoryId)->get();
        return response()->json($subcategories);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = dispatch_sync(new CreateProduct($request->validated()));
        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::isActive()->get();
        $brands = Brand::isActive()->get();
        $users = User::all();
        $subcategories = SubCategory::where('category_id', $product->category_id)->get();
        return view('admin.product.form', compact('product', 'brands', 'categories', 'users', 'subcategories'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, $id)
    {
        $product = dispatch_sync(new UpdateProduct($id, $request->validated()));

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $result = dispatch_sync(new DeleteProduct($id));

        if ($result) {
            return response()->json(['message' => 'Product deleted successfully.'], 200);
        }

        return response()->json(['error' => 'Error deleting Product'], 500);
    }

    public function destroyMany(Request $request)
    {

        try {
            $payload = $request->all();
            $selected = array_keys($payload['Checkboxes']);

            dispatch(new DeleteManyProduct($selected));

            return redirect()->route('product.index')->with('success', 'Product  deletion successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }
}
