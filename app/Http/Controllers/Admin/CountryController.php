<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\CountryRequest;
use App\Jobs\Country\CreateCountry;
use App\Jobs\Country\DeleteCountry;
use App\Jobs\Country\DeleteManyCountry;
use App\Jobs\Country\UpdateCountry;
use App\Models\Country;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.country.list')->with('title', 'Countrys');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.country.form');
    }


    public function list(Request $request)
    {
        $query = Country::query();

     
       
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
       

        $countrys = $query->select(['id','name','code','iso_alpha_3','currency_name', 'created_at','status']);

        return DataTables::of($countrys)
          
            ->addColumn('created_at', function ($country) {
                return Carbon::parse($country->created_at)->format('d-m-y');
            })
           
            ->addColumn('status', function ($country) {
                $badge = $country->status == 'active' ?
                    '<span class="badge bg-label-success">Active</span>' :
                    '<span class="badge bg-label-secondary">Inactive</span>';
                return $badge;
            })
            ->addColumn('actions', function ($country) {
                return '
                    <div class="d-flex align-items-center">
                        <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill" 
                           onclick="confirmDelete(\'' . route('country.destroy', ['country' => $country->id]) . '\')">
                            <i class="ti ti-trash ti-md"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="ti ti-dots-vertical ti-md"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end m-0">
                            <a href="' . route('country.edit', $country->id) . '" class="dropdown-item">Edit</a>
                            <a href="javascript:;" class="dropdown-item suspend-record" data-id="' . $country->id . '">Suspend</a>
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
    public function store(CountryRequest $request)
    {
        $country = dispatch_sync(new CreateCountry($request->validated()));
        return redirect()->route('country.index')->with('success', 'Country created successfully.');
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
    public function edit(Country $country)
    {
        return view('admin.country.form',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CountryRequest $request, $id)
    {
        $country = dispatch_sync(new UpdateCountry($id, $request->validated()));

        return redirect()->route('country.index')->with('success', 'Country updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = dispatch_sync(new DeleteCountry($id));
    
        if ($result) {
            return response()->json(['message' => 'Country deleted successfully.'], 200);
        }
    
        return response()->json(['error' => 'Error deleting Country'], 500);
    }


    public function destroyMany(Request $request)
    {
        try {
            $payload = $request->all();
            $job = new DeleteManyCountry($payload);
            dispatch_sync($job); 
    
            // Check the job results
            if ($job->errorOccurred) {
                if (!empty($job->deletedCountrys)) {
                    return redirect()->route('country.index')->with('success', 'Some countries were deleted successfully, but some could not be deleted as they are assigned elsewhere.');
                } else {
                    return redirect()->route('country.index')->with('error', 'Cannot delete countries as they are assigned elsewhere.');
                }
            }
    
            return redirect()->route('country.index')->with('success', 'Countries deleted successfully.');
        } catch (\Exception $e) {
            \Log::error('Failed to delete countries: ' . $e->getMessage());
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }
    
}
