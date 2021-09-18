<?php

namespace Database\Factories;

use App\Models\Nft;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NftFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Nft::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'user_id' => $this->faker->unique()->numberBetween(1,100),
            'description' => $this->faker->sentence,
            'image' => $this->faker->sentence,
            'price' => $this->faker->unique()->numberBetween(1,100)
        ];
    }
}
