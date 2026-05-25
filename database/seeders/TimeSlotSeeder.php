<?php

namespace Database\Seeders;

use App\Models\TimeSlot;
use Illuminate\Database\Seeder;

class TimeSlotSeeder extends Seeder
{
    public function run(): void
    {
        $slots = [
            'Sáng (7h-9h)',
            'Sáng (9h-11h)',
            'Chiều (14h-16h)',
            'Chiều (16h-18h)',
            'Tối (19h-21h)',
        ];

        foreach ($slots as $name) {
            TimeSlot::firstOrCreate(['name' => $name]);
        }
    }
}
