<?php

namespace Database\Factories;

use App\Models\Base;
use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;

class BaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Base::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'report_id' => Report::factory(),
            'system_process' => $this->faker->randomElement(array('system_process_1', 'system_process_2', 'system_process_3')),
            'module' => $this->faker->randomElement(array('module_1', 'module_2', 'module_3')),
            'problem_description' => $this->faker->realText(100),
            'affected_service' => $this->faker->randomElement(array('affected_service_1', 'affected_service_2', 'affected_service_3')),
            'severity' => $this->faker->randomElement(array('bajo', 'medio', 'alto')),
            'client_impact' => $this->faker->randomElement(array('bajo', 'medio', 'alto')),
            'ambience' => $this->faker->randomElement(array('ambience_1', 'ambience_2', 'ambience_3')),
            'report_medium' => $this->faker->randomElement(array('correo', 'telefono')),
            'client_name' => $this->faker->randomElement(array('client_name_1', 'client_name_2', 'client_name_3')),
            'expected_solution_time' => $this->faker->randomElement(array('expected_solution_time_1', 'expected_solution_time_2', 'expected_solution_time_3'))
        ];
    }
}
