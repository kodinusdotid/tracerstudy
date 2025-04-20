<?php

namespace Database\Seeders;

use App\Models\GraduationYearGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GraduationYearGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GraduationYearGroup::factory(10)->create();
    }
}
