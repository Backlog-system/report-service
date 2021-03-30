<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Solver
 *
 * @property-read \App\Models\Report $report
 * @method static \Database\Factories\SolverFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Solver newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Solver newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Solver query()
 * @mixin \Eloquent
 */
class Solver extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'solver_id';

    protected $fillable = [
        'report_id',
        'user_id'
    ];

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id', 'report_id');
    }
}
