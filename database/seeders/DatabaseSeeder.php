<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            DistrictSeeder::class,
            SubjectSeeder::class,
            ClassLevelSeeder::class,
            TimeSlotSeeder::class,
            RankSalarySeeder::class,
            AdminSeeder::class,
            FakeDataSeeder::class,
        ]);
    }
}
