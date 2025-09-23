<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            // Major Indian Pharma Companies
            ['name' => 'Cipla'],
            ['name' => 'Sun Pharma'],
            ['name' => 'Lupin'],
            ['name' => "Dr. Reddy's"],
            ['name' => 'Zydus Cadila'],
            ['name' => 'Aurobindo Pharma'],
            ['name' => 'Glenmark Pharma'],
            ['name' => 'Mankind Pharma'],
            ['name' => 'Torrent Pharma'],
            ['name' => 'Biocon'],
            ['name' => 'Intas Pharma'],
            ['name' => 'Alkem Laboratories'],
            ['name' => 'Wockhardt'],
            ['name' => 'Alembic Pharma'],
            ['name' => 'Piramal Enterprises'],
            ['name' => 'Natco Pharma'],
            ['name' => 'Panacea Biotec'],
            ['name' => 'Serum Institute of India'],
            ['name' => 'FDC Limited'],
            ['name' => 'Hetero Drugs'],
            ['name' => 'Emcure Pharmaceuticals'],
            ['name' => 'Unichem Laboratories'],
            ['name' => 'Strides Pharma'],
            ['name' => 'Ajanta Pharma'],
            ['name' => 'Jubilant Life Sciences'],

            // Top Ayurvedic & Herbal Brands
            ['name' => 'Dabur'],
            ['name' => 'Himalaya'],
            ['name' => 'Baidyanath'],
            ['name' => 'Patanjali Ayurved'],
            ['name' => 'Charak Pharma'],
            ['name' => 'Zandu'],
            ['name' => 'Vicco'],
            ['name' => 'Kerala Ayurveda'],
            ['name' => 'Ayushakti'],
        ];
        $data = [];
        foreach ($brands as $brand) {
            $data[] = [
                'name' => $brand['name'],
                'uuid' => Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('brands')->insert($data);
    }
}
