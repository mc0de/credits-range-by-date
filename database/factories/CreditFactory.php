<?php

namespace Database\Factories;

use App\Models\Credit;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CreditFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Credit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = Carbon::parse($this->faker->dateTimeBetween('-1 month', '+1 month'));

        return [
            'amount' => $this->faker->randomDigit(),
            'from'   => $date,
            'to'     => $date->copy()->addWeek(),
        ];
    }
}
