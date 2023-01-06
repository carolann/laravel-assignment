<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        $name=$this->faker->name();
        $lastname=substr($name, strrpos($name, " "));
        return [
            'firstname' => trim(str_replace($lastname,"",$name)),
            'lastname' => $lastname,
            'email' => $this->faker->unique()->safeEmail(),
            'applicationdate' =>  $faker->dateTimeBetween("2021-01-01", '2023-01-01') ,
            'loanid' => Str::random(10),
        ];
    }

}
