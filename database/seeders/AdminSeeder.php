<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Usuário Admin',
            'email' => 'admin_mentormap_2@email.com',
            'password' => Hash::make('admin@2023'),
            'admin' => true,
        ]);
    }
}
