<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Models\Admission;
use App\Models\Models\Student;
use App\Models\Models\Teacher;
use App\Models\Models\Course;
use App\Models\Models\Department;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    /**
     * Show the admin login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.admin_login');
    }

    /**
     * Authenticate the admin user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the user using the provided credentials
        if (Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // If successful, redirect the user to their intended destination
            return redirect()->intended(route('admin.dashboard'));
        }

        // If authentication fails, redirect back with error message
        Log::debug('Failed to authenticate admin: '.$request->email);
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput($request->only('email', 'remember'));
    }

    /**
     * Log out the admin user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        // Log out the user
        Auth::guard('admin')->logout();

        // Redirect to the home page after logout
        return redirect('/');
    }

    //logout to index page
    public function logoutAllUsers()
    {
        Auth::logout();

        return redirect()->route('general.index');
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        // You can customize this method to return the admin dashboard view
        return view('general.admindashboard');
    }

    /**
     * Show the admission request page.
     *
     * @return \Illuminate\View\View
     */

     // Method to fetch admission data
     public function fetchAdmissionData()
     {
     // Fetch all admission records from the database
     $admissions = Admission::all();

     // Pass the fetched data to the view
     return view('general.newAdmission_form', ['admissions' => $admissions]);
    }


// Method to show the add student form
public function showAddStudentForm()
{
    return view('general.add_student_form');
}

// Method to add a student to the database
public function addStudent(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:students,email',
        'course_id' => 'required|integer',
        'fees' => 'required|numeric',
        'password' => 'required|string',
    ]);

    // Create a new student instance
    $student = new Student();
    $student->name = $request->name;
    $student->email = $request->email;
    $student->course_id = $request->course_id;
    $student->fees = $request->fees;
    $student->password = bcrypt($request->password); // Encrypt the password

    // Save the student to the database
    $student->save();

    // Flash the success message to the session
    Session::flash('success', 'Student added successfully.');


    // Redirect back with success message
    return redirect()->route('admin.add.student')->with('success', 'Student added successfully.');
}

//Method to View Students from database
public function viewStudents()
{
    try {
        // Fetch students from the database
        $students = Student::all();

        // Return the view with student data
        return view('general.view_students', ['students' => $students]);
    } catch (\Exception $e) {
        // Log any errors that occur during the process
        \Log::error('Error fetching student data: ' . $e->getMessage());

        // Redirect back or return an error view
        return redirect()->back()->with('error', 'Failed to fetch student data.');
    }
}


//delete student
public function deleteStudent($id)
{
    try {
        // Find the student by ID
        $student = Student::findOrFail($id);

        // Delete the student
        $student->delete();

        // Set success message in session
        Session::flash('success', 'Student deleted successfully.');

        // Redirect back
        return redirect()->route('admin.view.student');
    } catch (\Exception $e) {
        // Log any errors that occur during the process
        \Log::error('Error deleting student: ' . $e->getMessage());

        // Set error message in session
        Session::flash('error', 'Failed to delete student.');

        // Redirect back
        return redirect()->back();
    }
}


//Teacher Crud operations
public function showAddTeacherForm()
{
    return view('general.add_teacher_form');
}

public function addTeacher(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:teachers,email',
        'course_id' => 'required|integer',
        'department_id' => 'required|string', // Update to department_id
        'Department_Name' => 'required|string', // Update to Department_Name
        'password' => 'required|string|min:6', // Validation rule for password
        // Add more validation rules as needed
    ]);

    // Create a new teacher instance
    $teacher = new Teacher();
    $teacher->name = $request->name;
    $teacher->email = $request->email;
    $teacher->course_id = $request->course_id;
    $teacher->department_id = $request->department_id; // Use department_id
    $teacher->Department_Name = $request->Department_Name; // Use Department_Name
    $teacher->password = Hash::make($request->password); // Hash the password

    // Set other properties

    // Save the teacher to the database
    $teacher->save();

    // Flash success message to session
    Session::flash('success', 'Teacher added successfully.');

    // Redirect back with success message
    return redirect()->route('admin.add.teacher')->with('success', 'Teacher added successfully.');
}



public function viewTeachers()
{
    $teachers = Teacher::all();
    return view('general.view_teacher', compact('teachers'));
}

public function deleteTeacher($id)
{
    try {
        // Find the teacher by ID
        $teacher = Teacher::findOrFail($id);

        // Delete the teacher
        $teacher->delete();

        // Set success message in session
        Session::flash('success', 'Teacher deleted successfully.');

        // Redirect back
        return redirect()->route('admin.view.teacher');
    } catch (\Exception $e) {
        // Log any errors that occur during the process
        \Log::error('Error deleting teacher: ' . $e->getMessage());

        // Set error message in session
        Session::flash('error', 'Failed to delete teacher.');

        // Redirect back
        return redirect()->back();
    }
}


// Crud Operations on Courses

// View all courses
public function viewCourses()
{
    $courses = Course::all();
    return view('general.view_courses', compact('courses'));
}

// Show form to add a new course
public function showAddCourseForm()
{
    return view('general.add_course_form');
}

// Store a new course
public function storeCourse(Request $request)
{
    $request->validate([
        'course_name' => 'required|string',
        'teacher_id' => 'required|integer',
        'department_id' => 'required|integer',
        // Add more validation rules as needed
    ]);

    $course = new Course();
    $course->course_name = $request->course_name;
    $course->teacher_id = $request->teacher_id;
    $course->department_id = $request->department_id;
    // Set other properties as needed

    $course->save();

    Session::flash('success', 'Course added successfully.');
    return redirect()->route('admin.add.course');
}

// Show form to edit a course
public function showEditCourseForm($id)
{
    $course = Course::findOrFail($id);
    return view('general.edit_course_form', compact('course'));
}


public function updateCourse(Request $request, $id)
{
    // Commented out the updateCourse method temporarily
    /*
    try {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'edit_course_name' => 'required|string|max:255',
            'edit_teacher_id' => 'required|string|max:255',
            'edit_department_id' => 'required|string|max:255',
            // Add validation rules for other fields as needed
        ]);

        // Find the course by its ID
        $course = Course::findOrFail($id);

        // Update the course attributes
        $course->course_name = $validatedData['edit_course_name'];
        $course->teacher_id = $validatedData['edit_teacher_id'];
        $course->department_id = $validatedData['edit_department_id'];
        // Update other course attributes as needed

        // Save the updated course
        $course->save();

        // Redirect back to the view courses page with a success message
        return redirect()->route('admin.view.courses')->with('success', 'Course updated successfully.');

    } catch (ModelNotFoundException $e) {
        // Handle not found exception
        return redirect()->back()->with('error', 'Course not found.');

    } catch (ValidationException $e) {
        // Handle validation exception
        return redirect()->back()->withErrors($e->validator->errors())->withInput();

    } catch (\Exception $e) {
        // Handle other exceptions
        return redirect()->back()->with('error', 'Failed to update course. Please try again.');
    }
    */
}


// Delete a course
public function deleteCourse($id)
{
    try {
        $course = Course::findOrFail($id);
        $course->delete();

        Session::flash('success', 'Course deleted successfully.');
        return redirect()->route('admin.view.courses');
    } catch (\Exception $e) {
        \Log::error('Error deleting course: ' . $e->getMessage());
        Session::flash('error', 'Failed to delete course.');
        return redirect()->back();
    }
}

// Departments

public function viewDepartments()
{
    $departments = Department::all();
    return view('general.view_departments', compact('departments'));
}

public function showAddDepartmentForm()
{
    return view('general.add_department_form');
}

public function storeDepartment(Request $request)
{
    $request->validate([
        'Department_Name' => 'required|string',
        'course_id' => 'required|string',
        'teacher_id' => 'required|string',

        // Add more validation rules as needed
    ]);

    $department = new Department();
    $department->Department_Name = $request->Department_Name;
    $department->course_id = $request->course_id;
    $department->teacher_id = $request->teacher_id;

    // Set other properties

    $department->save();

    Session::flash('success', 'Department added successfully.');
    return redirect()->route('admin.add.department');
}

public function showEditDepartmentForm($id)
{
    $department = Department::findOrFail($id);
    return view('general.edit_department_form', compact('department'));
}

public function updateDepartment(Request $request, $id)
{
    $request->validate([
        'Department_Name' => 'required|string',
        'course_id' => 'required|string',
        'teacher_id' => 'required|string',

        // Add more validation rules as needed
    ]);

    $department = Department::findOrFail($id);
    $department->Department_Name = $request->Department_Name;
    $department->course_id = $request->course_id;
    $department->teacher_id = $request->teacher_id;

    // Update other properties

    $department->save();

    Session::flash('success', 'Department updated successfully.');
    return redirect()->route('admin.view.departments');
}

public function deleteDepartment($id)
{
    try {
        $department = Department::findOrFail($id);
        $department->delete();

        Session::flash('success', 'Department deleted successfully.');
        return redirect()->route('admin.view.departments');
    } catch (\Exception $e) {
        \Log::error('Error deleting department: ' . $e->getMessage());
        Session::flash('error', 'Failed to delete department.');
        return redirect()->back();
    }
}
}