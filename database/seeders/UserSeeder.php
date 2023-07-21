<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    collect([
        [
            'name' => 'admin',
            'email' => 'admin@admin1.com',
            'password' => bcrypt('password'),
        ],
        [
            'name' => 'John Doe',
            'email' => 'admnin@admin2,com',
            'password' => bcrypt('password'),
        ],
        [
            'name' => 'Doe',
            'email' => 'admin@admin3.com',
            'password' => bcrypt('password'),
        ],
    ])->each(fn ($user) => \App\Models\User::create($user));
}
}
