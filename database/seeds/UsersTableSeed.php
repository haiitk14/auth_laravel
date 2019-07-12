<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->delete();
        $user = new User();
        $user->name = 'Super Administrator';
        $user->username = 'superadmin';
        $user->password = Hash::make('password');
        $user->role_id = 1;
        $user->save();

        $user = new User();
        $user->name = 'Administrator';
        $user->username = 'admin';
        $user->password = Hash::make('password');
        $user->role_id = 2;
        $user->save();
    }
}
