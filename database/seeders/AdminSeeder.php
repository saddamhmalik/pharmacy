<?php

namespace Database\Seeders;

use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'uuid' => Str::uuid(),
            'name'=> 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Password@1'),
        ]);
        $user->assignRole('admin');
    }
}
