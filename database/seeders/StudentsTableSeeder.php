<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIds = [];

        // Create 5 users for students
        for ($i = 1; $i <= 5; $i++) {
            $userIds[] = DB::table('users')->insertGetId([
                'name' => "Student $i",
                'reg_number' => 'NIT/BIT/2024/'.Str::random(4),
                'email' => "student$i@example.com",
                'role' => 0,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Create 5 students
        foreach ($userIds as $userId) {
            DB::table('students')->insert([
                'user_id' => $userId,
                'study_level' => 'Undergraduate',
                'gender' => 'Male',
                'date_birth' => '2000-01-01',
                'programme' => 'Computer Science',
                'study_year' => '3',
                'current_semister' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
