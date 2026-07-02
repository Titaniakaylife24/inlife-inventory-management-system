<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([

            [
                'name'=>'Laptop',
                'description'=>'Laptop perusahaan',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            [
                'name'=>'Monitor',
                'description'=>'Monitor LCD/LED',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            [
                'name'=>'Printer',
                'description'=>'Printer kantor',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            [
                'name'=>'Networking',
                'description'=>'Perangkat jaringan',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            [
                'name'=>'Furniture',
                'description'=>'Meja dan Kursi',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

        ]);
    }
}