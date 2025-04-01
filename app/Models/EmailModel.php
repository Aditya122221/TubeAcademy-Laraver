<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Auth\User as Authenticatable;

class EmailModel extends Authenticatable
{
    use HasFactory;
    protected $table = "email_from_clients";
    protected $fillable = [
        "fullName", "email", "message"
    ];

    protected $hidden = [
        "date"
    ];
}
