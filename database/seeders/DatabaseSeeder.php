<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->registerUser();
    }

    public function registerUser(): void
    {
        $datas = [
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
                'matric_id' => 'ADM00'
            ],
            [
                'name' => 'Lecturer',
                'email' => 'lecturer@example.com',
                'password' => bcrypt('password'),
                'role' => 'lecturer',
                'matric_id' => 'LC01'
            ],
            [
                'name' => 'Student',
                'email' => 'student@example.com',
                'password' => bcrypt('password'),
                'role' => 'student',
                'matric_id' => 'CD00000'
                
            ],
        ];

        foreach ($datas as $data) {
            DB::table('users')->insert($data);
        }
    }
}
