<?php

// File: app/Models/Models/Department.php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\DepartmentFactory;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'Department_Name',
        // Add other fillable fields here
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Database\Factories\DepartmentFactory
     */
    protected static function newFactory(): DepartmentFactory
    {
        return DepartmentFactory::new();
    }
    //relationship of teacher with Department
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
    /**
     * Get the courses associated with the department.
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    // relationship with student
    public function students()
    {
         return $this->hasMany(Student::class);
    }


}
