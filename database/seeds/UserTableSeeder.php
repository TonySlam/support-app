<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach(Spatie\Permission\Models\Role::all() as $role) {
            $users = factory(User::class, 3)->create();
            foreach($users as $user){
                $user->assignRole($role);
            }
        }

    }
}
