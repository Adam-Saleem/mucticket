<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name'=>'MUC Admin',
            'username'=>'admin',
            'is_admin' => 1,
            'password' => '123456'
        ]);
        User::create([
            'name'=>'MUC Employee',
            'username'=>'employee',
            'is_admin' => 0,
            'password' => '123456'
        ]);
    }
}
