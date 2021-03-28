<?php

namespace Database\Factories;

use App\Models\Report;
use App\Models\Solution;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolutionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Solution::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'report_id' => Report::factory(),
            'consequences' => $this->faker->realText(30),
            'used_solution' => $this->faker->randomElement(array('used_solution_1', 'used_solution_2', 'used_solution_3'))
        ];
    }
}
