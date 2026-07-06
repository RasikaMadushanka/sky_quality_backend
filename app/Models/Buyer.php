<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $table = 'buyers';
    protected $primaryKey = 'buyer_id';
    public $timestamps = false; // We use created_date manually

    protected $fillable = ['buyer_name', 'status', 'created_date'];
}
