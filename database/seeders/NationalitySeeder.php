<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nationality;

class NationalitySeeder extends Seeder
{
    public function run(): void
    {
        $nationalities = [
            ['name' => 'مصر', 'country_code' => 'EG'],
            ['name' => 'السعودية', 'country_code' => 'SA'],
            ['name' => 'الإمارات', 'country_code' => 'AE'],
            ['name' => 'الأردن', 'country_code' => 'JO'],
            ['name' => 'سوريا', 'country_code' => 'SY'],
            ['name' => 'لبنان', 'country_code' => 'LB'],
            ['name' => 'فلسطين', 'country_code' => 'PS'],
            ['name' => 'اليمن', 'country_code' => 'YE'],
            ['name' => 'السودان', 'country_code' => 'SD'],
        ];

        Nationality::insert($nationalities);
    }
}