<?php

namespace Database\Factories;

use App\Models\Material;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Material::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Test Materiaal '.$this->faker->randomDigit(),
            'description' => $this->faker->words(3, true),
            'amount' => $this->faker->randomDigit(),
            'unit' => 'Millimeter',
            'added_by' => $this->faker->name(),
            'location' => $this->faker->words(1, true),
            'img_url' => '1624367984.jpeg',
        ];
    }
}
