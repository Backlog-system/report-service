<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
