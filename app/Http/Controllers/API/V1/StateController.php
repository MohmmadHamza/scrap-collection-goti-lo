<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\StateResource;
use App\Models\State;
use Illuminate\Http\Request;
use App\Helpers\ApiResponseHelper;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Get the pagination limit from the request or use the default
    $limit = $request->get('limit', config('pagination.pagination_limit'));
    
    // Get the search term and country ID from the request
    $searchTerm = $request->get('search'); 
    $countryId = $request->get('country_id');

    // Start the query for active states
    $query = State::isActive();

    // If a search term is provided, filter states by name
    if ($searchTerm) {
        $query->where('name', 'like', '%' . $searchTerm . '%');
    }

    // If a country ID is provided, filter states by country_id
    if ($countryId) {
        $query->where('country_id', $countryId);
    }

    // Order the results and paginate
    $states = $query->orderBy('name', 'asc')->paginate($limit);

    // Transform the states using the StateResource
    $data = StateResource::collection($states);

    // Return the response with the state data
    return ApiResponseHelper::createResponse(__('State List'), true, 200, $data);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {

            $country = State::findOrFail($id);
            $data = new StateResource($country);

            return ApiResponseHelper::createResponse(__('State Details'), true, 200, $data);
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::createResponse(__('State Details Not Found'), false, 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
