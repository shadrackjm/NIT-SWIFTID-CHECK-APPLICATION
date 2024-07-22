<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'reg_number' => '123456',
                'email' => 'john.doe@example.com',
                'role' => '1',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => \Illuminate\Support\Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'reg_number' => '789012',
                'email' => 'jane.smith@example.com',
                'role' => 0,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => \Illuminate\Support\Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'student one',
                'reg_number' => '789012',
                'email' => 'jane.smith1@example.com',
                'role' => 0,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => \Illuminate\Support\Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Student Two',
                'reg_number' => '789012',
                'email' => 'jane.smith2@example.com',
                'role' => 0,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => \Illuminate\Support\Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
