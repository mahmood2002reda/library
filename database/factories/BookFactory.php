<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = [
            'maxresdefault.jpg',
            '_5lzoNSeQq1-tIYO.jpg',
            'F1i6DCNXsAAhMrd.jpeg',
            'frame0.jpg',
            'UIsmXM0aCQma6_ZG.jpg'
        ];
        return [
            'name' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'author' => $this->faker->name,
            'category' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'image' =>  $this->faker->randomElement($images),
        ];
    }
}
