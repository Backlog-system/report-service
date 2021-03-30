<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Report
 *
 * @property-read \App\Models\Base|null $base
 * @property-read \App\Models\Date|null $date
 * @property-read \App\Models\Solution|null $solution
 * @property-read \App\Models\Solver|null $solver
 * @method static \Database\Factories\ReportFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Report newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report query()
 * @mixin \Eloquent
 */
class Report extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'report_id';

    protected $fillable = [
        'backlog_id',
        'report_code',
        'state',
        'type',
        'observation',
        'report_date'
    ];

    public function base()
    {
        return $this->hasOne(Base::class, 'report_id', 'report_id');
    }

    public function solution()
    {
        return $this->hasOne(Solution::class, 'report_id', 'report_id');
    }

    public function solver()
    {
        return $this->hasOne(Solver::class, 'report_id', 'report_id');
    }

    public function date()
    {
        return $this->hasOne(Date::class, 'report_id', 'report_id');
    }
}
