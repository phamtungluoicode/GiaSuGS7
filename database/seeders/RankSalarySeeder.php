<?php

namespace Database\Seeders;

use App\Models\RankSalary;
use Illuminate\Database\Seeder;

class RankSalarySeeder extends Seeder
{
    public function run(): void
    {
        $salaries = [
            '100k-150k/buổi',
            '150k-200k/buổi',
            '200k-300k/buổi',
            '300k-500k/buổi',
            '500k+/buổi',
        ];

        foreach ($salaries as $name) {
            RankSalary::firstOrCreate(['name' => $name]);
        }
    }
}
