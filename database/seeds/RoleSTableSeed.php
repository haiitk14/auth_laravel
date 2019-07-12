<?php

use Illuminate\Database\Seeder;
use App\Model\Role;

class RoleSTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::query()->delete();
        $author = Role::create([
            'name' => 'Supper Administrator', 
        ]);
        $editor = Role::create([
            'name' => 'Administrator', 
        ]);
    }
}
