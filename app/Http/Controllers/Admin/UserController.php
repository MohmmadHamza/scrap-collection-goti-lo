<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\Users\DeleteManyUser;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\UserRegistrationRequest;
use Yajra\DataTables\Facades\DataTables;

use Carbon\Carbon;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $roles = Role::all();
        return view('admin.user.list', compact( 'roles'))->with('title', 'Admin Users');

    }

    /**
     * Show the form for creating a new resource.
     */



    public function list(Request $request)
    {
        $query = User::with('role');

     
        if ($request->filled('role_id')) {
            $query->where('role_id', $request->role_id);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        $users = $query->select(['id', 'name', 'email', 'created_at', 'gender', 'profile_picture', 'role_id', 'status']);

        return DataTables::of($users)
            ->addColumn('user_info', function ($user) {
                return '
                     <div class="d-flex justify-content-start align-items-center user-name">
                         <div class="avatar-wrapper">
                             <div class="avatar avatar-sm me-4">
                                 <img src="' . asset('assets/' . $user->profile_picture) . '" alt="Avatar" class="rounded-circle">
                             </div>
                         </div>
                         <div class="d-flex flex-column">
                             <a href="app-user-view-account.html" class="text-heading text-truncate">
                                 <span class="fw-medium">' . $user->name . '</span>
                             </a>
                             <small>' . $user->email . '</small>
                         </div>
                     </div>
                 ';
            })
            ->addColumn('created_at', function ($user) {
                return Carbon::parse($user->created_at)->format('M d, Y');
            })
            ->addColumn('role', function ($user) {
                $icon = '';
                if ($user->role) {
                    switch (strtolower($user->role->name)) {
                        case 'admin':
                            $icon = '<i class="ti ti-crown ti-md text-primary me-2"></i>';
                            break;
                        case 'logistic':
                            $icon = '<i class="ti ti-device-desktop ti-md text-danger me-2"></i>';
                            break;
                        case 'customer':
                            $icon = '<i class="ti ti-user ti-md text-success me-2"></i>';
                            break;

                            case 'product specialist':
                                $icon = '<i class="ti ti-briefcase ti-md text-success me-2"></i>';
                                break;

                                case 'vendor':
                                    $icon = '<i class="ti ti-shopping-cart ti-md text-warning  me-2"></i>';
                                    break;
                    }
                    return $icon . $user->role->name;
                }
                return '-';
            })
            ->addColumn('status', function ($user) {
                $badge = $user->status == 'active' ?
                    '<span class="badge bg-label-success">Active</span>' :
                    '<span class="badge bg-label-secondary">Inactive</span>';
                return $badge;
            })
            ->addColumn('actions', function ($user) {
                return '
                    <div class="d-flex align-items-center">
                        <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill" 
                           onclick="confirmDelete(\'' . route('users.destroy', ['user' => $user->id]) . '\')">
                            <i class="ti ti-trash ti-md"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="ti ti-dots-vertical ti-md"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end m-0">
                            <a href="' . route('users.edit', $user->id) . '" class="dropdown-item">Edit</a>
                            <a href="javascript:;" class="dropdown-item suspend-record" data-id="' . $user->id . '">Suspend</a>
                        </div>
                    </div>
                ';
            })
            ->rawColumns(['user_info', 'created_at', 'role', 'status', 'actions'])
            ->make(true);
    }









    public function create()
    {
        $roles = Role::all();
        $states = State::all();

        // For create view, no user exists
        return view('admin.user.form', compact('roles', 'states'));
    }


    public function getCities($stateId)
    {
        $cities = City::where('state_id', $stateId)->get();

       
        return response()->json($cities);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRegistrationRequest $request)
    {
        $profilePicturePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = 'images/user/' . time() . '_' . $request->file('profile_picture')->getClientOriginalName();

            $request->file('profile_picture')->move(public_path('assets/images/user'), $profilePicturePath);
        }

        $userData = $request->validated();


        if (!empty($userData['password'])) {
            $userData['password'] = Hash::make($userData['password']);
        }

        $userData['status'] = $request->has('status') ? 'active' : 'inactive';

        $userData['profile_picture'] = $profilePicturePath;


        $user = User::create($userData);


        return redirect()->route('users.index')->with('success', 'User created successfully.');
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
    public function edit(User $user)
    {
        $roles = Role::all();
        $states = State::all();
        $cities = City::where('state_id', $user->state_id)->get(); // Get cities based on user's state_id

        return view('admin.user.form', compact('user', 'roles', 'states', 'cities'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UserRegistrationRequest $request, User $user)
    {
        $profilePicturePath = $user->profile_picture;

        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = 'images/user/' . time() . '_' . $request->file('profile_picture')->getClientOriginalName();
            $request->file('profile_picture')->move(public_path('assets/images/user'), $profilePicturePath);
        }

        $userData = $request->validated();

        if (!empty($userData['password'])) {
            $userData['password'] = Hash::make($userData['password']);
        } else {
            unset($userData['password']);
        }


        $userData['status'] = $request->has('status') ? 'active' : 'inactive';
        $user->update(array_merge($userData, ['profile_picture' => $profilePicturePath]));


        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {


        if ($user->delete()) {
            return response()->json(['message' => 'User deleted successfully.'], 200);
        }

        return response()->json(['error' => 'Error deleting user'], 500);
    }

    public function destroyMany(Request $request)
    {

        try {
            $payload = $request->all();
            $selected = array_keys($payload['Checkboxes']);

            dispatch(new DeleteManyUser($selected));

            return redirect()->route('users.index')->with('success', 'User  deletion successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }
    


}
