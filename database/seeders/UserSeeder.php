<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'password' => Hash::make('remasi12345'),
                'level' => 'admin'
            ],
            [
                'name' => 'remasi',
                'password' => Hash::make('remasi12345'),
                'level' => 'admin'
            ],
            [
                'name' => 'user',
                'password' => Hash::make('user12345678'),
            ],
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
