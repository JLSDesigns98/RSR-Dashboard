<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Store;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $number = 1;
        return [
            'name' => fake()->name,
            'code' => fake()->randomNumber(5),
            'manager' => fake()->name,
            'speedDial' => fake()->randomNumber(4),
            'orderNumber' => null,
            'orderValue' => null,
            'notes' => fake()->text(100), 
            'order' => $number++,
            'status' => false,
            'colour' => '#ff0000',
        ];
    }
}