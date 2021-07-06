<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::truncate();

       $schoolRole = Role::where('name', 'school')->first();

       $teacherRole = Role::where('name', 'teacher')->first();

       $studentRole = Role::where('name', 'student')->first();

       $adminRole = Role::where('name', 'admin')->first();


       $school = User::create([
          'name' => 'School',
          'email' => 'school@gmail.com',
          'password' => bcrypt('smartpass048'),
       ]);

        $teacher = User::create([
        'name' => 'Teache',
        'email' => 'teacher@gmail.com',
        'password' => bcrypt('smartpass048'),
        ]);

        $student = User::create([
         'name' => 'student',
         'email' => 'student@gmail.com',
         'password' => bcrypt('smartpass048'),
         ]);

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('smartpass048'),
            ]);

        $school->roles()->attach($schoolRole);
        $teacher->roles()->attach($teacherRole);
        $student->roles()->attach($studentRole);
        $admin->roles()->attach($adminRole);
    }
}
