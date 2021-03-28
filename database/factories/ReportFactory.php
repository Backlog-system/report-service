<?php

namespace Database\Factories;

use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Report::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'backlog_id' => $this->faker->numberBetween(1, 9999),
            'report_code' => $this->faker->randomElement(array('report_code_1', 'report_code_2', 'report_code_3')),
            'state' => $this->faker->randomElement(array('por asignar', 'en proceso', 'en calidad', 'cerrado')),
            'type' => $this->faker->randomElement(array('incidencia', 'soporte')),
            'observation' => $this->faker->realText(100),
            'report_date' => $this->faker->dateTimeBetween('-1 month', 'now')
        ];
    }
}
