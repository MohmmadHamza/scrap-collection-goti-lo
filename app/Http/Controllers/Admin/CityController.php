<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\City\CityRequest;
use App\Jobs\City\CreateCity;
use App\Jobs\City\DeleteCity;
use App\Jobs\City\UpdateCity;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;


use Yajra\DataTables\Facades\DataTables;

use Carbon\Carbon;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countrys = Country::all();

        $states = State::all();
        return view('admin.city.list', compact('countrys', 'states'))->with('title', 'Citys');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countrys = Country::isActive()->get();
        $states = State::isActive()->get();

        return view('admin.city.form', compact('countrys', 'states'));
    }

    public function list(Request $request)
    {

        $query = City::with('country', 'state');


        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('country_id')) {
            $query->where('country_id', $request->country_id);
        }

        if ($request->filled('state_id')) {
            $query->where('state_id', $request->state_id);
        }

        $cities = $query->select(['id', 'country_id', 'state_id', 'name', 'created_at', 'status']);

        return DataTables::of($cities)

            ->addColumn('created_at', function ($citie) {
                return Carbon::parse($citie->created_at)->format('M d, Y');
            })

            ->addColumn('status', function ($citie) {
                $badge = $citie->status == 'active' ?
                    '<span class="badge bg-label-success">Active</span>' :
                    '<span class="badge bg-label-secondary">Inactive</span>';
                return $badge;
            })
            ->addColumn('actions', function ($citie) {
                return '
                    <div class="d-flex align-items-center">
                        <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill" 
                           onclick="confirmDelete(\'' . route('city.destroy', ['city' => $citie->id]) . '\')">
                            <i class="ti ti-trash ti-md"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="ti ti-dots-vertical ti-md"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end m-0">
                            <a href="' . route('city.edit', $citie->id) . '" class="dropdown-item">Edit</a>
                            <a href="javascript:;" class="dropdown-item suspend-record" data-id="' . $citie->id . '">Suspend</a>
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
    public function store(CityRequest $request)
    {
        $city = dispatch_sync(new CreateCity($request->validated()));
        return redirect()->route('city.index')->with('success', 'City created successfully.');
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
    public function edit(City $city)
    {
        $countrys = Country::isActive()->get();
        $states = State::isActive()->where('country_id', $city->country_id)->get();
        return view('admin.city.form', compact('city', 'countrys', 'states'));
    }


    public function getStates(Request $request)
    {
        $states = State::where('country_id', $request->country_id)->isActive()->get();
        return response()->json($states);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CityRequest $request,$id)
    {
        $city = dispatch_sync(new UpdateCity($id, $request->validated()));

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $result = dispatch_sync(new DeleteCity($id));
    
        if ($result) {
            return response()->json(['message' => 'State deleted successfully.'], 200);
        }
    
        return response()->json(['error' => 'Error deleting State'], 500);
    }
}
