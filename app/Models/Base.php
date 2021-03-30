<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Base
 *
 * @property-read \App\Models\Report $report
 * @method static \Database\Factories\BaseFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Base newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Base newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Base query()
 * @mixin \Eloquent
 */
class Base extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'base_id';

    protected $fillable = [
        'report_id',
        'system_process',
        'module',
        'problem_description',
        'affected_service',
        'severity',
        'client_impact',
        'ambience',
        'report_medium',
        'client_name',
        'expected_solution_time'
    ];

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id', 'report_id');
    }
}
