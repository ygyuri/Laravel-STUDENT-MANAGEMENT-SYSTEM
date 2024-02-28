<?php

// Teacher.php

namespace App\Models\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\TeacherFactory;

class Teacher extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'password',
        'email',
        'Department_Name',
        'department_id',
        // Remove 'course_id' from here
        // Add other fillable fields here if needed
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Database\Factories\TeacherFactory
     */
    protected static function newFactory(): TeacherFactory
    {
        return TeacherFactory::new();
    }


    // Relationship with the department model
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * The courses that belong to the teacher.
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_teacher')
                    ->withPivot('unit')
                    ->withTimestamps();
    }

    /**
     * The students that belong to the teacher through courses.
     */
    public function students()
    {
        // Assuming you want to get students through courses.
        return $this->hasManyThrough(Student::class, Course::class);
    }
}