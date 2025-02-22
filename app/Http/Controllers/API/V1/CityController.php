<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Helpers\ApiResponseHelper;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get the pagination limit from the request or use the default
        $limit = $request->get('limit', config('pagination.pagination_limit'));
    
        // Get the search term, country ID, and state ID from the request
        $searchTerm = $request->get('search'); 
        $countryId = $request->get('country_id');
        $stateId = $request->get('state_id');
    
        // Start the query for active cities
        $query = City::isActive();
    
        // If a search term is provided, filter cities by name
        if ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }
    
        // If a country ID is provided, filter cities by country_id
        if ($countryId) {
            $query->where('country_id', $countryId);
        }
    
        // If a state ID is provided, filter cities by state_id
        if ($stateId) {
            $query->where('state_id', $stateId);
        }
    
        // Order the results and paginate
        $cities = $query->orderBy('name', 'asc')->paginate($limit);
    
        // Transform the cities using the CityResource
        $data = CityResource::collection($cities);
    
        // Return the response with the city data
        return ApiResponseHelper::createResponse(__('City List'), true, 200, $data);
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

            $city = City::findOrFail($id);
            $data = new CityResource($city);

            return ApiResponseHelper::createResponse(__('City Details'), true, 200, $data);
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::createResponse(__('City Details Not Found'), false, 404);
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
