<?php

namespace Database\Seeders;

use App\Models\Base;
use App\Models\Date;
use App\Models\Report;
use App\Models\Solution;
use App\Models\Solver;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Report::factory()->create()->toArray();
            Base::factory()->create(['report_id' => $i]);
            Solution::factory()->create(['report_id' => $i]);
            Solver::factory()->create(['report_id' => $i]);
            Date::factory()->create(['report_id' => $i]);
        }
    }
}
