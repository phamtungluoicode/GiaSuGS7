<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    public function run(): void
    {
        $districts = [
            'Ba Đình', 'Hoàn Kiếm', 'Hai Bà Trưng', 'Đống Đa', 'Cầu Giấy',
            'Thanh Xuân', 'Hoàng Mai', 'Long Biên', 'Nam Từ Liêm', 'Bắc Từ Liêm',
            'Tây Hồ', 'Hà Đông', 'Thanh Trì', 'Gia Lâm', 'Đông Anh',
            'Sóc Sơn', 'Hoài Đức', 'Thanh Oai', 'Thường Tín', 'Phú Xuyên',
            'Đan Phượng', 'Phúc Thọ', 'Quốc Oai', 'Thạch Thất', 'Chương Mỹ',
            'Ba Vì', 'Mỹ Đức', 'Ứng Hòa', 'Mê Linh', 'Sơn Tây',
        ];

        foreach ($districts as $name) {
            District::firstOrCreate(['name' => $name]);
        }
    }
}
