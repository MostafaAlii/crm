<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\ContractType;

class ContractTypeSeeder extends Seeder
{
    public function run(): void
    {
        ContractType::insert([
            ['name' => 'دائم'],
            ['name' => 'مؤقت'],
            ['name' => 'تدريب'],
        ]);
    }
}