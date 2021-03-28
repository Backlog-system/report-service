<?php

namespace Database\Factories;

use App\Models\Report;
use App\Models\Solver;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolverFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Solver::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'report_id' => Report::factory(),
            'user_id' => $this->faker->numberBetween(1, 9999)
        ];
    }
}
