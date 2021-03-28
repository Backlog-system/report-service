<?php

namespace Tests\Unit;

use App\Models\Report;
use PHPUnit\Framework\TestCase;

class ReportsTest extends TestCase
{
    public function can_create_report_with_valid_data()
    {
        $report = Report::factory()->make()->toArray();
    }
}
