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
        return $this->hasOne('App\Base');
    }

    public function solution()
    {
        return $this->hasOne('App\Solution');
    }

    public function solver()
    {
        return $this->hasOne('App\Solver');
    }

    public function date()
    {
        return $this->hasOne('App\Date');
    }
}
