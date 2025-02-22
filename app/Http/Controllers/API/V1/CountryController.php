<?php

namespace App\Http\Controllers\API\V1;

use App\Helpers\ApiResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $limit = $request->get('limit', config('pagination.pagination_limit'));
        
        
        $searchTerm = $request->get('search');
    
        
        $query = Country::isActive();
    
        
        if ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }
    
        
        $categories = $query->orderBy('name', 'asc')->paginate($limit);
    
        
        $data = CountryResource::collection($categories);
    
        
        return ApiResponseHelper::createResponse(__('All Country Data'), true, 200, $data);
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

            $country = Country::findOrFail($id);
            $data = new CountryResource($country);

            return ApiResponseHelper::createResponse(__('Country Details'), true, 200, $data);
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::createResponse(__('Country Details Not Found'), false, 404);
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
