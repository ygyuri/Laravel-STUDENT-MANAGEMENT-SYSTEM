<?php

namespace App\Models\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'password',
        'email',
        'course_id',
        // Remove 'department_id' from the $fillable array as it's not a direct attribute of the students table
    ];

    protected $guard = 'student';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    //Define the relationships
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Define the relationship with the Department model through the Course model
    public function department()
    {
        return $this->hasOneThrough(Department::class, Course::class, 'id', 'id', 'course_id', 'department_id');
    }
    // Define the relationship with the Teacher model through the Course model
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }

}