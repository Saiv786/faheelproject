<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user= \App\User::where('name', 'Super Admin')->first();
        if(!isset($user)){
            $user = new \App\User();
        }
        $user->name='Super Admin';
        $user->password=bcrypt('12345678');
        $user->email='test@test.io';
        $user->role_id=1;
        $user->save();
    }
}
