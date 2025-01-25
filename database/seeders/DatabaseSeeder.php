<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Portfolio;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'id' => 1,
            'last_name' => 'One',
            'first_name' => 'Sim',
            'email' => 'sim.one@example.net',
            'is_admin' => true,
            'password' => Hash::make('4dminPa55word!!'),
        ]);
    }
}
