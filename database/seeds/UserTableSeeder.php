<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 100)->create();
        $role_employee = Role::where('name', 'employee')->first();

// Populate the pivot table
        App\User::all()->each(function ($user) use ( $role_employee) {
            $user->roles()->attach(
                $role_employee
            );
        });
    }
}
