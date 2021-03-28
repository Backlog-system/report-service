<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
