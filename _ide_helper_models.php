<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Base
 *
 * @property int $base_id
 * @property int $report_id
 * @property string $system_process
 * @property string $module
 * @property string $problem_description
 * @property string $affected_service
 * @property string $severity
 * @property string $client_impact
 * @property string $ambience
 * @property string $report_medium
 * @property string $client_name
 * @property string $expected_solution_time
 * @property-read \App\Models\Report $report
 * @method static \Database\Factories\BaseFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Base newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Base newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Base query()
 * @method static \Illuminate\Database\Eloquent\Builder|Base whereAffectedService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Base whereAmbience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Base whereBaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Base whereClientImpact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Base whereClientName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Base whereExpectedSolutionTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Base whereModule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Base whereProblemDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Base whereReportId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Base whereReportMedium($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Base whereSeverity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Base whereSystemProcess($value)
 */
	class Base extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Date
 *
 * @property int $date_id
 * @property int $report_id
 * @property string $estimated_begin
 * @property string $estimated_end
 * @property string|null $reconsider_begin
 * @property string|null $reconsider_end
 * @property string|null $real_begin
 * @property string|null $real_end
 * @property-read \App\Models\Report $report
 * @method static \Database\Factories\DateFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Date newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Date newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Date query()
 * @method static \Illuminate\Database\Eloquent\Builder|Date whereDateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Date whereEstimatedBegin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Date whereEstimatedEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Date whereRealBegin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Date whereRealEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Date whereReconsiderBegin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Date whereReconsiderEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Date whereReportId($value)
 */
	class Date extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Report
 *
 * @property int $report_id
 * @property int $backlog_id
 * @property string $report_code
 * @property string $state
 * @property string $type
 * @property string $observation
 * @property string $report_date
 * @property-read \App\Models\Base|null $base
 * @property-read \App\Models\Date|null $date
 * @property-read \App\Models\Solution|null $solution
 * @property-read \App\Models\Solver|null $solver
 * @method static \Database\Factories\ReportFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Report newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report query()
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereBacklogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereObservation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereReportCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereReportDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereReportId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereType($value)
 */
	class Report extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Solution
 *
 * @property int $solution_id
 * @property int $report_id
 * @property string $consequences
 * @property string $used_solution
 * @property-read \App\Models\Report $report
 * @method static \Database\Factories\SolutionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Solution newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Solution newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Solution query()
 * @method static \Illuminate\Database\Eloquent\Builder|Solution whereConsequences($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Solution whereReportId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Solution whereSolutionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Solution whereUsedSolution($value)
 */
	class Solution extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Solver
 *
 * @property int $solver_id
 * @property int $report_id
 * @property int $user_id
 * @property-read \App\Models\Report $report
 * @method static \Database\Factories\SolverFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Solver newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Solver newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Solver query()
 * @method static \Illuminate\Database\Eloquent\Builder|Solver whereReportId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Solver whereSolverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Solver whereUserId($value)
 */
	class Solver extends \Eloquent {}
}

