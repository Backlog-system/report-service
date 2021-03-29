<?php

namespace Tests;

use App\Models\Report;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $report;
    protected $date_test;
    protected $payload;

    protected function setUp(): void
    {
        parent::setUp();

        $this->date_test = date('Y-m-d');

        $this->report = Report::factory()->create([
            'backlog_id' => 50,
            'report_code' => 'report_code_test',
            'state' => 'cerrado',
            'type' => 'soporte',
            'observation' => null,
            'report_date' => $this->date_test
        ]);

        $this->payload = '{ "backlog_id": 1, "report_code": "abc", "state": "EN PROCESO", "type": "INCIDENCIA", "observation": "abcdef", "report_date": "", "system_process": "abc", "module": "abc", "problem_description": "abcdef", "affected_service": "abc", "severity": "MEDIO", "client_impact": "ALTO", "ambience": "abc", "report_medium": "CORREO", "client_name": "abc", "expected_solution_time": "abc", "consequences": "abc", "used_solution": "abc", "user_id": 1, "estimated_begin": "", "estimated_end": "" }';
        $this->payload = json_decode($this->payload, true);
        $this->payload['report_date'] = $this->date_test;
        $this->payload['estimated_begin'] = date('Y-m-d', strtotime($this->date_test.'+1 day'));
        $this->payload['estimated_end'] = date('Y-m-d', strtotime($this->date_test.'+2 day'));
    }
}
