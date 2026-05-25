<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [
            'Toán', 'Lý', 'Hóa', 'Sinh', 'Văn',
            'Sử', 'Địa', 'Tiếng Anh', 'Tin học', 'IELTS',
            'TOEIC', 'Tiếng Nhật', 'Tiếng Trung', 'Tiếng Hàn',
            'Ngữ văn', 'Khoa học tự nhiên', 'Khoa học xã hội',
        ];

        foreach ($subjects as $name) {
            Subject::firstOrCreate(['name' => $name]);
        }
    }
}
