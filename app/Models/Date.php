<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Date
 *
 * @property-read \App\Models\Report $report
 * @method static \Database\Factories\DateFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Date newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Date newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Date query()
 * @mixin \Eloquent
 */
class Date extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'date_id';

    protected $fillable = [
        'report_id',
        'estimated_begin',
        'estimated_end',
        'reconsider_begin',
        'reconsider_end',
        'real_begin',
        'real_end'
    ];

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id', 'report_id');
    }
}
