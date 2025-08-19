<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Admin;   
use Illuminate\Support\Facades\Hash; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      Admin::Create(
        [
            'name'=>"abdullah",
            'email'=>'abdullah@gmail.com',
            'password'=>Hash::make('123456'),
        ]
        );

    }
}
