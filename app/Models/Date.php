<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo('App\Report');
    }
}
