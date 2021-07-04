<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create user
        $user = User::create(['name' => 'user_123', 'email' => 'admin@admin.com', 'password' => bcrypt('12345')]);
        //create role admin
        $role_admin = Role::create(['name' => 'admin']);
        //assign role admin to user
        $user->roles()->sync($role_admin);
    }
}
