<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'employees';
    protected $primaryKey = 'employee_id';

    protected $fillable = [
        'emp_card_no', 'name', 'position', 'nic',
        'contact_number', 'username', 'password_hash',
        'is_active', 'created_date'
    ];

    protected $hidden = ['password_hash'];
    public $timestamps = false; 
}
