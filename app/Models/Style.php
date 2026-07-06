<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $table = 'styles';
    protected $primaryKey = 'style_id';
    public $timestamps = false;

    protected $fillable = [
        'buyer_id',
        'style_name',
        'created_date'
    ];
}
