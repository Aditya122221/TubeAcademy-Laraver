<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Auth\User as Authenticatable;

class UploadVideoModel extends Authenticatable
{
    use HasFactory;
    protected $table = 'uploadvideos';
    protected $fillable = [
        "Video_ID", "Registration_ID", "thumbnail", "title", "subjectName", "forClass", "teacherName", "duration", "video", "views"
    ];
}
