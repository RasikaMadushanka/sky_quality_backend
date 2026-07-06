<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductionLine extends Model
{
    protected $table = 'production_lines';
    protected $primaryKey = 'line_id';
    public $timestamps = false;

    protected $fillable = [
        'line_no',
        'unit',
        'supervisor_id',
        'created_date'
    ];
}
