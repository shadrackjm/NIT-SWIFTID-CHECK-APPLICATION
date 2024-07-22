<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentFeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve all user IDs with 'student' role
        $studentIds = DB::table('users')->where('role', 0)->pluck('id');

        // Create 5 student fees records
        foreach ($studentIds as $studentId) {
            DB::table('student_fees')->insert([
                'user_id' => $studentId,
                'status' => 0, // not paid
                'actual_amount' => rand(1000, 5000),
                'paid' => 0,
                'semester' => rand(1, 2),
                'academic_year' => rand(2020, 2024),
                'level_study' => 'Undergraduate',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
