<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        return [
            'transactionDate' =>  $faker->dateTimeBetween("2016-01-01", '2023-01-01') ,
            'transactionAmount' => rand(-10000,120000),
        ];
    }

}
