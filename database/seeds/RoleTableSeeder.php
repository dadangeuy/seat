<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'Ini adalah Role Admin yang mempunyai otorasi penuh terhadap sistem';
        $role_admin->save();

        $role_restoran = new Role();
        $role_restoran->name = 'restoran';
        $role_restoran->description = 'Ini adalah Role Restoran yang mempunyai otorasi untuk menambah kursi';
        $role_restoran->save();

        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->description = 'Ini adalah Role User Biasa yang mempunyai otorasi untuk booking';
        $role_user->save();

      
    }
}
