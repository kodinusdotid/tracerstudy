<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->admin()->create([
            'name' => 'Administrator',
            'email' => 'admin@tracerstudy.id',
            'role' => 'admin',
        ]);

        User::factory()->operator()->create([
            'name' => 'Operator',
            'email' => 'operator@tracerstudy.id'
        ]);

        User::factory()->alumni()->create([
            'name' => 'Fulan Bin Fulan',
            'email' => 'fulan@tracerstudy.id'
        ]);

        User::factory(10)->alumni()->withBiodata()->create();
    }
}
