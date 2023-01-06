<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $int= mt_rand(1262055681,1262055681);
        return [
            'company' => $this->faker->name(),
            'position' => $this->faker->name(),
            'startdate' => date("Y-m-d H:i:s",$int),
            'salary' => mt_rand(100000,200000),
        ];
    }

}
