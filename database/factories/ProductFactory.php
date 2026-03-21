<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        $conditions = ['baru', 'bekas_baik', 'bekas_sedang', 'bekas_kurang'];
        $statuses = ['available', 'sold'];

        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'name' => fake()->words(3, true),
            'price' => fake()->numberBetween(50000, 5000000),
            'condition' => fake()->randomElement($conditions),
            'description' => fake()->paragraph(),
            'image' => null,
            'status' => fake()->randomElement($statuses),
            'stock' => fake()->numberBetween(1, 100),
            'location' => fake()->city(),
        ];
    }

    public function available(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'available',
        ]);
    }

    public function sold(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'sold',
        ]);
    }

    public function new(): static
    {
        return $this->state(fn (array $attributes) => [
            'condition' => 'baru',
        ]);
    }

    public function used(): static
    {
        return $this->state(fn (array $attributes) => [
            'condition' => fake()->randomElement(['bekas_baik', 'bekas_sedang', 'bekas_kurang']),
        ]);
    }
}
