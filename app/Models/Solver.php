<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
