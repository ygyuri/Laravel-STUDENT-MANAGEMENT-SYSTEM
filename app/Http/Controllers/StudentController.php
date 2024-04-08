<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Models\Admission;
use App\Models\Models\Student;
use Illuminate\Support\Facades\Session;


class StudentController extends Controller
{
    /**
     * Show the student login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.student_login');
    }

    /**
     * Authenticate the student.
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

        // Attempt to log in the student using the provided credentials
        if (Auth::guard('student')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // If successful, redirect the student to their intended destination
            return redirect()->intended(route('student.dashboard'));
        }

        // If authentication fails, redirect back with error message
        Log::debug('Failed to authenticate student: '.$request->email);
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput($request->only('email', 'remember'));
    }

    /**
     * Log out the student.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        // Log out the student
        Auth::guard('student')->logout();

        // Redirect to the home page after logout
        return redirect('/');
    }

    /**
     * Show the student dashboard.
     *
     * @return \Illuminate\View\View
     */



     public function studentDashboard()
{
    // Retrieve the currently authenticated student
    $student = Auth::user();

    // Load the associated course and its department
    $student->load('course.department');

    // Pass student details to the view
    return view('Student.studentdashboard', compact('student'));
}





    /**
     * Submit admission form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitadmissionForm(Request $request)
    {
        try {
            // Validate the form data
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:255',
                'message' => 'required|string',
            ]);

            // Create a new admission record
            $admission = new Admission();
            $admission->name = $request->name;
            $admission->email = $request->email;
            $admission->phone = $request->phone;
            $admission->message = $request->message;
            $admission->save();

            // Store success message in session
            $request->session()->flash('success', 'Admission form submitted successfully!');

            // Redirect back
            return redirect()->back();
        } catch (\Exception $e) {
            // Display the error
            dd($e->getMessage());
        }
    }
}