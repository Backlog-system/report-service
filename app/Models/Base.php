<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo('App\Report');
    }
}
