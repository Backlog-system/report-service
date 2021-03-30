<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Solution
 *
 * @property-read \App\Models\Report $report
 * @method static \Database\Factories\SolutionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Solution newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Solution newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Solution query()
 * @mixin \Eloquent
 */
class Solution extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'solution_id';

    protected $fillable = [
        'report_id',
        'consequences',
        'used_solution'
    ];

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id', 'report_id');
    }
}
