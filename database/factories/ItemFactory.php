<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "desc" => "LIMITED VEGETABLE!!!\n This is the best vegetable in the world because of the size and color!",
            "price" => fake()->numberBetween(10, 100) * 10000
        ];
    }
}
