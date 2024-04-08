<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_name',
        'department_id',
        'teacher_id',
        // Add other fillable fields here if needed
    ];

    /**
     * The department that belongs to the course.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * The teacher that belongs to the course.
     */
    // Define the relationship with the Teacher model
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * The students that belong to the course.
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    /**
     * The teachers that belong to the course.
     */
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class)
                    ->withPivot('unit') // Add the pivot information
                    ->withTimestamps();
    }
}
