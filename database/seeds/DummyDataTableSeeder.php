<?php

use Illuminate\Database\Seeder;

class DummyDataTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $list=\App\ContactList::create([
            'name' => 'Test List',
            'customer_id' => \App\User::first()->id,
            'custom_fields' => []
        ]);
        \App\Contact::create([
            'contact_list_id'=>$list->id,
            'first_name'=>"Start Test",
            'last_name'=>"End",
            'email'=>"moeezghauri786@gmail.com",
            'fields'=>[],

        ]);
        \App\Schedule::create([
            'name' => 'Schedule Test',  
            'type' => 'one_time',
            'one_time_time' => '2020-08-03 01:32:00',
            'cron' => '32 1 3 8 *',
            'one_time_date' => null,
            'customer_id' => \App\User::first()->id,

        ]);

    }
}
