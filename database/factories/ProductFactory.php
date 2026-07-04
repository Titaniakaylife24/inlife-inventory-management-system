<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [

            'category_id' => Category::inRandomOrder()->first()->id,

            'location_id' => Location::inRandomOrder()->first()->id,

            'code' => 'AST-'.fake()->unique()->numberBetween(1000,9999),

            'serial_number' => strtoupper(fake()->bothify('SN-######')),

            'name' => fake()->randomElement([
                'Laptop Dell',
                'Laptop Lenovo',
                'Printer Epson',
                'Monitor LG',
                'Keyboard Logitech',
                'Mouse Logitech',
                'Router Cisco',
                'Projector Epson',
                'Scanner Canon',
                'Switch TP-Link'
            ]),

            'brand' => fake()->randomElement([
                'Dell',
                'Lenovo',
                'HP',
                'Canon',
                'Cisco',
                'LG',
                'Logitech',
                'Epson'
            ]),

            'unit' => 'Unit',

            'description' => fake()->sentence(),

            'stock' => fake()->numberBetween(1,40),

            'minimum_stock' => 5,

            'condition' => fake()->randomElement([
                'Good',
                'Fair',
                'Damaged'
            ]),

            'status' => fake()->randomElement([
                'Available',
                'Borrowed',
                'Maintenance'
            ]),
        ];
    }
}