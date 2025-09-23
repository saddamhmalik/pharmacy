<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Analgesics'],
            ['name' => 'Antibiotics'],
            ['name' => 'Antiseptics'],
            ['name' => 'Vitamins & Supplements'],
            ['name' => 'Antipyretic'],
            ['name' => 'Injectables'],
            ['name' => 'Antacids'],
            ['name' => 'Antihistamines'],
            ['name' => 'Antifungals'],
            ['name' => 'Antivirals'],
            ['name' => 'Antidepressants'],
            ['name' => 'Antipsychotics'],
            ['name' => 'Anticonvulsant'],
            ['name' => 'Cardiovascular Drugs'],
            ['name' => 'Diuretics'],
            ['name' => 'Hormones'],
            ['name' => 'Immunosuppressant'],
            ['name' => 'Chemotherapy Drugs'],
            ['name' => 'Sedatives & Anxiolytics'],
            ['name' => 'Bronchodilators'],
            ['name' => 'Cough & Cold Preparations'],
            ['name' => 'Topical Agents'],
            ['name' => 'Ophthalmic Drugs'],
            ['name' => 'Dermatological'],
        ];

        $data = [];
        foreach ($categories as $category) {
            $data[] = [
                'name' => $category['name'],
                'uuid' => Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }


        DB::table('categories')->insert($data);
    }
}
