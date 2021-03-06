<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Role::truncate();

       Role::create(['name' => 'school']);

       Role::create(['name' => 'teacher']);

       Role::create(['name' => 'student']);

       Role::create(['name' => 'admin']);
    }
}
