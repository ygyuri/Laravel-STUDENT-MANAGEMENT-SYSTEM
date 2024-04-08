<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Models\Student; // Import your Student model
use App\Models\Models\Course; // Import your Course model
use App\Models\Models\Teacher;
class TeacherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:teacher')->except('showLoginForm', 'login');
    }

    /**
     * Show the login form for teachers.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showLoginForm()
    {
        return view('auth.teacher_login');
    }

    /**
     * Authenticate the teacher.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('teacher')->attempt($credentials)) {
            return redirect()->intended(route('Teacher.teacherdashboard'));
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    /**
     * Logout the authenticated teacher.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard('teacher')->logout();
        return redirect('/');
    }

    public function dashboard()
    {
        // Retrieve the authenticated teacher
        $teacher = Auth::guard('teacher')->user();

        // You can add any additional logic here if needed

        // Return the view for the teacher dashboard
        return view('Teacher.teacherdashboard', compact('teacher'));
    }



   /**
 * View all students associated with the logged-in teacher.
 *
 * @return \Illuminate\Contracts\View\View
 */


public function viewStudents()
{
    // Retrieve the currently authenticated teacher
    $teacher = Auth::user();

    // Retrieve the courses taught by the teacher with their associated departments
    $courses = $teacher->courses()->with('department')->get();

    // Initialize an empty array to store department and course IDs
    $departmentIds = [];
    $courseIds = [];

    // Retrieve the IDs of the departments and courses associated with the teacher's courses
    foreach ($courses as $course) {
        $departmentIds[] = $course->department_id;
        $courseIds[] = $course->id;
    }

    // Retrieve the students associated with the departments and courses taught by the teacher
    $students = Student::whereHas('course', function ($query) use ($courseIds) {
        $query->whereIn('id', $courseIds);
    })->whereIn('department_id', $departmentIds)->get();

    // Return the view with the filtered students data along with courses and departments
    return view('Teacher.view_student', compact('students', 'courses'));
}





    /**
     * View all courses.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function viewCourses()
    {
        // Get the logged-in teacher
        $teacher = auth()->user();

        // Retrieve the courses associated with the teacher along with their departments
        $courses = $teacher->courses()->with('department')->get(['course_name', 'department_id']);

        return view('Teacher.view_course', ['courses' => $courses]);
    }

}
