
<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $role= \App\Role::where('name', 'Admin')->first();
        if(!isset($role)){
            $role = new \App\Role();
        }
        $role->name='Admin';
        $role->save();
        $role= \App\Role::where('name', 'Customer')->first();
        if(!isset($role)){
            $role = new \App\Role();
        }
        $role->name='Customer';
        $role->save();
    }
}
