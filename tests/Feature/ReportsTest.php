<?php

namespace Tests\Feature;

use App\Models\Report;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReportsTest extends TestCase
{
    use DatabaseMigrations;

    public function test_can_get_all_report()
    {
        $response = $this->get(route('reports.index'));

        $response->assertStatus(200);

        $response->assertJsonCount(Report::count());
    }

    public function test_can_get_a_report_by_report_id()
    {
        $response = $this->postJson(route('reports.store'), $this->payload);
        $response->assertStatus(201);
        $report = json_decode($response->getContent(), true);

        $report_show = $this->get(route('reports.show', ['id' => $report['report_id']]));
        $report_show->assertStatus(200);

        $report_show->assertExactJson(Report::where('report_id', '=', $report['report_id'])->with(['base', 'solution', 'solver', 'date'])->firstOrFail()->toArray());
    }

    public function test_can_create_report()
    {
        $response = $this->postJson(route('reports.store'), $this->payload);

        $response->assertStatus(201);

        $report = json_decode($response->getContent(), true);
        $report = Report::findOrFail($report['report_id']);

        $this->assertDatabaseHas('reports', $report->toArray());
        $this->assertDatabaseHas('bases', $report->base->toArray());
        $this->assertDatabaseHas('solutions', $report->solution->toArray());
        $this->assertDatabaseHas('solvers', $report->solver->toArray());
        $this->assertDatabaseHas('dates', $report->date->toArray());
    }

    public function test_can_update_report()
    {
        $response = $this->postJson(route('reports.store'), $this->payload);

        $response->assertStatus(201);

        $report = json_decode($response->getContent(), true);

        $old_user_id = $report['solver']['user_id'];
        $old_backlog_id = $report['backlog_id'];
        $old_system_process = $report['base']['system_process'];


        $this->payload['user_id'] = $report['solver']['user_id'] + 10;
        $this->payload['backlog_id'] = $report['backlog_id'] + 10;
        $this->payload['system_process'] = 'testeooo';

        $put = $this->putJson(route('reports.update', ['id' => $report['report_id']]), $this->payload);
        $report_updated = json_decode($put->getContent(), true);

        $report = Report::findOrFail($report_updated['report_id']);

        $this->assertDatabaseHas('reports', $report->toArray());
        $this->assertDatabaseHas('bases', $report->base->toArray());
        $this->assertDatabaseHas('solutions', $report->solution->toArray());
        $this->assertDatabaseHas('solvers', $report->solver->toArray());
        $this->assertDatabaseHas('dates', $report->date->toArray());

        $this->assertNotEquals($old_user_id, $report_updated['solver']['user_id']);
        $this->assertNotEquals($old_backlog_id, $report_updated['backlog_id']);
        $this->assertNotEquals($old_system_process, $report_updated['base']['system_process']);
    }

    public function test_can_close_report_state()
    {
        $report_post = $this->postJson(route('reports.store'), $this->payload);
        $report_post->assertStatus(201);

        $report = json_decode($report_post->getContent(), true);

        $report_patch = $this->patchJson(route('reports.close', ['id' => $report['report_id']]));
        $report_patch->assertStatus(200);

        $report_patched = json_decode($report_patch->getContent(), true);

        $this->assertEquals('cerrado', $report_patched['state']);

        $this->assertDatabaseHas('reports', Report::findOrFail($report_patched['report_id'])->toArray());
    }
}
