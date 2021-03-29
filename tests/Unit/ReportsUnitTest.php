<?php

namespace Tests\Unit;

use App\Models\Base;
use App\Models\Date;
use App\Models\Report;
use App\Models\Solution;
use App\Models\Solver;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ReportsUnitTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test can create report and others with valid data.
     *
     * @return void
     */
    public function test_can_create_report_with_valid_data()
    {
        $report = $this->report->toArray();

        $base = Base::factory()->create(['report_id' => $report['report_id']])->toArray();

        $solution = Solution::factory()->create(['report_id' => $report['report_id']])->toArray();
        $solver = Solver::factory()->create(['report_id' => $report['report_id']])->toArray();
        $date = Date::factory()->create(['report_id' => $report['report_id']])->toArray();

        $this->assertDatabaseHas('reports', $report);
        $this->assertDatabaseHas('bases', $base);
        $this->assertDatabaseHas('solutions', $solution);
        $this->assertDatabaseHas('solvers', $solver);
        $this->assertDatabaseHas('dates', $date);

        $this->assertArrayHasKey('report_id', $report);
        $this->assertEquals($report['report_id'], $base['report_id']);
        $this->assertEquals($report['report_id'], $solution['report_id']);
        $this->assertEquals($report['report_id'], $solver['report_id']);
        $this->assertEquals($report['report_id'], $date['report_id']);

        $this->assertEquals(50, $report['backlog_id']);
        $this->assertEquals('report_code_test', $report['report_code']);
        $this->assertEquals('cerrado', $report['state']);
        $this->assertEquals('soporte', $report['type']);
        $this->assertNull($report['observation']);
        $this->assertEquals($this->date_test, $report['report_date']);
    }

    public function test_a_base_belongs_to_a_report()
    {
        $report = $this->report->toArray();

        $base = Base::factory()->create(['report_id' => $report['report_id']]);

        $this->assertInstanceOf(Report::class, $base->report);
        $this->assertEquals(1, $base->report->count());
    }

    public function test_a_solution_belongs_to_a_report()
    {
        $report = $this->report->toArray();

        $solution = Solution::factory()->create(['report_id' => $report['report_id']]);

        $this->assertInstanceOf(Report::class, $solution->report);
        $this->assertEquals(1, $solution->report->count());
    }

    public function test_a_solver_belongs_to_a_report()
    {
        $report = $this->report->toArray();

        $solver = Solver::factory()->create(['report_id' => $report['report_id']]);

        $this->assertInstanceOf(Report::class, $solver->report);
        $this->assertEquals(1, $solver->report->count());
    }

    public function test_a_date_belongs_to_a_report()
    {
        $report = $this->report->toArray();

        $date = Date::factory()->create(['report_id' => $report['report_id']]);

        $this->assertInstanceOf(Report::class, $date->report);
        $this->assertEquals(1, $date->report->count());
    }

    public function test_can_close_report_state()
    {
        $this->report->state = 'cerrado';
        $this->report->save();

        $this->assertDatabaseHas('reports', $this->report->toArray());
        $this->assertEquals('cerrado', $this->report->state);
    }
}
