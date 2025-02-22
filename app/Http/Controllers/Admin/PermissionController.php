<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.permission.list')->with('title', 'Permissions');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    public function list()
    {
        // Fetch all roles with their permissions
        $roles = Role::with('permissions')->get();

        // Format the data for DataTables
        $data = $roles->map(function ($role) {
            // Join permission names
            $permissions = $role->permissions->pluck('name')->implode(', ');

            return [
                'role_name' => $role->name,
                'permissions' => $permissions,
                'created_at' => $role->created_at,
                'actions' => '
                    <div class="d-flex align-items-center">
                        <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill" 
                           onclick="confirmDelete(\'' . route('role.destroy', ['role' => $role->id]) . '\')">
                            <i class="ti ti-trash ti-md"></i>
                        </a>
                       <button class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill me-1" data-bs-target="#editPermissionModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="ti ti-edit ti-md"></i></button>
                    </div>
                ',
            ];
        });

        return DataTables::of($data)
            ->addColumn('created_at', function ($role) {
                return Carbon::parse($role['created_at'])->format('M d, Y');
            })
            ->rawColumns(['actions'])
            ->make(true);
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
    public function show(string $id)
    {
        //
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

    public function destroyMany()
    {

    }
}
