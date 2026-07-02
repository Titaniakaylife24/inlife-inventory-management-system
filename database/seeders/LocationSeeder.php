<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        Location::insert([

            [
                'name'=>'Gudang Utama',
                'description'=>'Gudang pusat inventaris',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            [
                'name'=>'Ruang IT',
                'description'=>'Divisi IT',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            [
                'name'=>'Marketing',
                'description'=>'Divisi Marketing',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            [
                'name'=>'Meeting Room',
                'description'=>'Ruang Meeting',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

        ]);
    }
}