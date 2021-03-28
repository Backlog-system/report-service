<?php

namespace Database\Factories;

use App\Models\Date;
use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;

class DateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Date::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $begin = $this->faker->dateTimeBetween('-5 days', '-1 day');
        $end = $this->faker->dateTimeBetween($begin->format('Y-m-d H:i:s'), 'now');

        return [
            'report_id' => Report::factory(),
            'estimated_begin' => $begin,
            'estimated_end' => $end,
            'reconsider_begin' => $begin,
            'reconsider_end' => $end,
            'real_begin' => $begin,
            'real_end' => $end
        ];
    }
}
