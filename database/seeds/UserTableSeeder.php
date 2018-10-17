<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_restoran = Role::where('name', 'restoran')->first();
        $role_user = Role::where('name', 'user')->first();
        
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@seat.com';
        $admin->verified = 1;
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $restoran = new User();
        $restoran->name = 'Restoran';
        $restoran->email = 'restoran@seat.com';
        $restoran->verified = 1;
        $restoran->password = bcrypt('restoran');
        $restoran->save();
        $restoran->roles()->attach($role_restoran);

        $user = new User();
        $user->name = 'User';
        $user->email = 'user@seat.com';
        $user->verified = 1;
        $user->password = bcrypt('user');
        $user->save();
        $user->roles()->attach($role_user);


    }
}
