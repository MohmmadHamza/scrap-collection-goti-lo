<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $admin = Role::create(['name' => 'Admin']);
        $customer = Role::create(['name' => 'Customer']);
        $logistic = Role::create(['name' => 'Logistic']);
        $productSpecialist = Role::create(['name' => 'Product Specialist']);
        $vendor = Role::create(['name' => 'Vendor']);

      
        $permissions = [
            'view users',
            'create users',
            'edit users',
            'delete users',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

       
        $admin->givePermissionTo($permissions);

       
        $adminUser = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@zolio.com',
            'password' => bcrypt('Admin@101'), 
        ]);

       
        $adminUser->assignRole($admin->name);
    }
}
