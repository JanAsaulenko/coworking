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
        $role_user = new Role();
        $role_user->name = 'ADMIN';
        $role_user->save();

        $role_user = new Role();
        $role_user->name = 'MANAGER';
        $role_user->save();

        $role_user = new Role();
        $role_user->name = 'OPERATOR';
        $role_user->save();

        $role_user = new Role();
        $role_user->name = 'GUEST';
        $role_user->save();
    }
}
