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

            'code' => 'AST-'.$this->faker->unique()->numberBetween(1000,9999),

            'serial_number' => strtoupper($this->faker->bothify('SN-######')),

            'name' => $this->faker->randomElement([
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

            'brand' => $this->faker->randomElement([
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

            'description' => $this->faker->sentence(),

            'stock' => $this->faker->numberBetween(1,40),

            'minimum_stock' => 5,

            'condition' => $this->faker->randomElement([
                'Good',
                'Fair',
                'Damaged'
            ]),

            'status' => $this->faker->randomElement([
                'Available',
                'Borrowed',
                'Maintenance'
            ]),
        ];
    }
}