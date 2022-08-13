<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode' => $this->faker->numerify(),
            'deskripsi' => $this->faker->text(100),
            'l_deskripsi' => $this->faker->text(200),
            'qty' => $this->faker->numerify(mt_rand(1,30000)),
            'loc' => $this->faker->regexify('[A-Z]{2}[0-9]{2}'),
            'ma' => $this->faker->numerify(),
            'rop' => $this->faker->numerify(),
            'mi' => $this->faker->numerify(),
            'price' => $this->faker->numerify(),
            'user_id' => mt_rand(1,2),
            'category_id' => mt_rand(1,3)
        ];
    }
}
