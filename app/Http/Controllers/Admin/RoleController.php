<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all()->groupBy('group_name');
    
        $roleUserCounts = [];
        $roleUserDetails = [];
    
        foreach ($roles as $role) {
            
            $roleUserCounts[$role->id] = User::where('role_id', $role->id)->count();
    
            
            $users = User::where('role_id', $role->id)->get();
    
            
            $roleUserDetails[$role->id] = $users->map(function ($user) {
                return [
                    'name' => $user->name,
                    'image' => $user->profile_picture,
                ];
            });
        }
    
        return view('admin.role.list', compact('roles', 'permissions', 'roleUserCounts', 'roleUserDetails'));
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
       
        
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id'
        ]);
    
        
        $role = Role::create([
            'name' => $request->name,
        
        ]);
    
        
        $existingPermissions = Permission::whereIn('id', $request->permissions)->pluck('id')->toArray();
    
        $role->syncPermissions($existingPermissions);
    
        return response()->json(['message' => 'Role added successfully!'], 200);
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
    public function edit(Role $role)
    {
        
        $permissions = $role->permissions; 
        return response()->json([
            'permissions' => $permissions
        ]);
    }
    
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role,
            'permissions' => 'array',
        ]);
    
        $role->name = $request->name;
        $role->save();
    
        $existingPermissions = Permission::whereIn('id', $request->permissions)->pluck('id')->toArray();
    
        $role->syncPermissions($existingPermissions);
    
        return response()->json(['message' => 'Role updated successfully!']);
    }
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete(); // Deletes the role
        return response()->json(['message' => 'Role deleted successfully!'], 200);
    }
    
}
