<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\State\StateRequest;
use App\Jobs\State\CreateState;
use App\Jobs\State\DeleteManyState;
use App\Jobs\State\DeleteState;
use App\Jobs\State\UpdateState;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;

use Carbon\Carbon;
class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $countrys = Country::all();
    
        return view('admin.states.list', compact('countrys'))->with('title', 'States');
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::isActive()->get();
        return view('admin.states.form',compact('countries'));
    }

    public function list(Request $request)
    {
       
        $query = State::with('country');
     
       
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('country_id')) {
            $query->where('country_id', $request->country_id);
        }
       

        $states = $query->select(['id','country_id', 'name', 'created_at','status']);

        return DataTables::of($states)
          
            ->addColumn('created_at', function ($state) {
                return Carbon::parse($state->created_at)->format('M d, Y');
            })
           
            ->addColumn('status', function ($state) {
                $badge = $state->status == 'active' ?
                    '<span class="badge bg-label-success">Active</span>' :
                    '<span class="badge bg-label-secondary">Inactive</span>';
                return $badge;
            })
            ->addColumn('actions', function ($state) {
                return '
                    <div class="d-flex align-items-center">
                        <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill" 
                           onclick="confirmDelete(\'' . route('state.destroy', ['state' => $state->id]) . '\')">
                            <i class="ti ti-trash ti-md"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="ti ti-dots-vertical ti-md"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end m-0">
                            <a href="' . route('state.edit', $state->id) . '" class="dropdown-item">Edit</a>
                            <a href="javascript:;" class="dropdown-item suspend-record" data-id="' . $state->id . '">Suspend</a>
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
    public function store(StateRequest $request)
    {
        $state = dispatch_sync(new CreateState($request->validated()));
        return redirect()->route('state.index')->with('success', 'State created successfully.');
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
    public function edit(State $state)
    {
        $countries = Country::isActive()->get();
        return view('admin.states.form',compact('countries','state'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StateRequest $request, string $id)
    {
        $state = dispatch_sync(new UpdateState($id, $request->validated()));

        return redirect()->route('state.index')->with('success', 'State updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $result = dispatch_sync(new DeleteState($id));
    
        if ($result) {
            return response()->json(['message' => 'State deleted successfully.'], 200);
        }
    
        return response()->json(['error' => 'Error deleting State'], 500);
    }


    public function destroyMany(Request $request)
    {
        try {
            $payload = $request->all();
            $job = new DeleteManyState($payload);
            dispatch_sync($job); 
    
            // Check the job results
            if ($job->errorOccurred) {
                if (!empty($job->deletedStates)) {
                    return redirect()->route('state.index')->with('success', 'Some states were deleted successfully, but some could not be deleted as they are assigned elsewhere.');
                } else {
                    return redirect()->route('state.index')->with('error', 'Cannot delete states as they are assigned elsewhere.');
                }
            }
    
            return redirect()->route('state.index')->with('success', 'States deleted successfully.');
        } catch (\Exception $e) {
            \Log::error('Failed to delete states: ' . $e->getMessage());
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }
    
}
