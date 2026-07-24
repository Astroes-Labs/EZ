<?php
// database/seeders/AdminSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* \App\Models\Admin::create([
            'username' => 'admin',
            'email'    => 'admin@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('secret123'),
        ]); */

        \App\Models\Admin::create([
            'username' => 'admin',
            'email'    => 'admin@admin.mc',
            'password' => \Illuminate\Support\Facades\Hash::make('secret123!'),
        ]);
    }
}
