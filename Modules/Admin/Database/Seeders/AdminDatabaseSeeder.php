<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\Admin;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //        Model::unguard();

        $admin = $this->adminCreation();
        // $admin2 = $this->admin2Creation();
        $permissions = $this->permissionCreation();
        $role = $this->roleCreation();
        // $role2 = $this->role2Creation();
        $admin->assignRole($role);
        // $admin2->assignRole($role2);
        // $this->call("OthersTableSeeder");
    }

    function adminCreation()
    {
        return $admin =  Admin::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456789'),
            'phone' => '1235464654'
        ]);
    }

    // function admin2Creation (){
    //     return $admin =  Admin::create([
    //         'name' => 'osama',
    //         'email' => 'osama@osama.com',
    //         'password' => bcrypt('123456789'),
    //         'phone' => '12354654654'
    //     ]);

    // }

    function permissionCreation()
    {
        $permissions = [

            ['Index-transaction', 'Transaction', 'Index'],
            ['Create-transaction', 'Transaction', 'Create'],
            ['Edit-transaction', 'Transaction', 'Edit'],
            ['Delete-transaction', 'Transaction', 'Delete'],


            ['Index-payment', 'Payment', 'Index'],
            ['Create-payment', 'Payment', 'Create'],
            ['Edit-payment', 'Payment', 'Edit'],
            ['Delete-payment', 'Payment', 'Delete'],

            ['Index-report', 'Report', 'Index'],

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission[0], 'category' => $permission[1], 'guard_name' => 'admin', 'display' => $permission[2]]);
        }
    }

    function roleCreation()
    {
        $role = Role::create(['name' => 'Admin', 'guard_name' => 'admin']);
        $permissions = Permission::all();
        $role->syncPermissions($permissions);
        return $role;
    }

    // function role2Creation(){
    //     $role = Role::create(['name' => 'Accountant','guard_name' => 'admin']);
    //     return $role;
    // }
}
