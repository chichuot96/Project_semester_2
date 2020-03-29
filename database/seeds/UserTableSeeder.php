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
        $role_employee = Role::where('name', 'employee')->first();
        $role_manager  = Role::where('name', 'admin')->first();
        $role_saler = Role::where('name', 'saler')->first();

        $employee = new User();
        $employee->user_name = 'employee';
        $employee->full_name = 'Employee Name';
        $employee->email = 'employee@example.com';
        $employee->password = bcrypt('123456');
        $employee->phone_number = '0123456789';
        $employee->address = 'Employee Address';
        $employee->date_of_birth = '2000-02-03';
        $employee->save();
        $employee->roles()->attach($role_employee);

        $saler = new User();
        $saler->user_name = 'saler';
        $saler->full_name = 'Saler Name';
        $saler->email = 'saler@example.com';
        $saler->password = bcrypt('123456');
        $saler->phone_number = '0123456789';
        $saler->address = 'Saler Address';
        $saler->date_of_birth = '2000-02-02';
        $saler->save();
        $saler->roles()->attach($role_saler);

        $manager = new User();
        $manager->user_name = 'admin';
        $manager->full_name = 'Admin Name';
        $manager->email = 'admin@example.com';
        $manager->password = bcrypt('123456');
        $manager->phone_number = '0123456789';
        $manager->address = 'Admin Address';
        $manager->date_of_birth = '2000-02-01';
        $manager->save();
        $manager->roles()->attach($role_manager);
    }
}
