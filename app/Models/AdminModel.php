<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Auth\User as Authenticatable;

class AdminModel extends Authenticatable
{
    use HasFactory;
    protected $table = 'adminuserdatas';
    protected $fillable = [
        "Registration_ID", "avatar", "fName", "lName", "pNumber", "password", "email", "address"
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
