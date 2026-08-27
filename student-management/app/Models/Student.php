<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    /**
     * Fields allowed for mass assignment.
     */
    protected $fillable = [
        'student_number',
        'full_name',
        'email',
        'course',
        'profile_picture',
    ];
}
