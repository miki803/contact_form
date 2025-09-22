<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'category'   => $this->faker->randomElement(['商品について', '配送について', 'その他']),
            'first_name' => $this->faker->firstName(),
            'last_name'  => $this->faker->lastName(),
            'gender'     => $this->faker->randomElement([0, 1]),
            'email'      => $this->faker->unique()->safeEmail(),
            'tel1'       => $this->faker->numberBetween(100, 999),
            'tel2'       => $this->faker->numberBetween(100, 9999),
            'tel3'       => $this->faker->numberBetween(1000, 9999),
            'address'    => $this->faker->address(),
            'building'   => $this->faker->optional()->company(),
            'message'    => $this->faker->realText(50),
        ];
    }
}
