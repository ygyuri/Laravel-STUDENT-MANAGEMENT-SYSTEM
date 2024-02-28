<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;


use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

// Student Authentication Routes
Route::prefix('student')->middleware('web')->group(function () {
    Route::get('/login', [StudentController::class, 'showLoginForm'])->name('student.login');
    Route::post('/login', [StudentController::class, 'login'])->name('student.login.submit');
    Route::post('/logout', [StudentController::class, 'logout'])->name('student.logout');
    // Add more routes for registration, reset password, etc. as needed

    //routes for admission for student in the index page
    Route::post('/submitadmissionForm', [StudentController::class, 'submitadmissionForm'])->name('submitadmissionForm');


    Route::middleware('auth:student')->group(function () {
        Route::get('/dashboard', [StudentController::class, 'studentDashboard'])->name('student.dashboard');
    });



});

// Admin Authentication Routes and other Admin Routes
Route::prefix('admin')->middleware('web')->group(function () {
    // Admin Dashboard Route and other routes requiring admin authentication
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Admission Request Route
    Route::get('/admin/admission/data', [AdminController::class, 'fetchAdmissionData'])->name('admin.admission.data');


    // Students CRUD Routes
    Route::get('/admin/add/student', [AdminController::class, 'showAddStudentForm'])->name('admin.add.student');
    Route::post('/admin/add/student', [AdminController::class, 'addStudent'])->name('admin.store.student');
    // view student
    Route::get('/admin/view/student', [AdminController::class, 'viewStudents'])->name('admin.view.student');
    //delete student
    Route::delete('/admin/delete/student/{id}', [AdminController::class, 'deleteStudent'])->name('admin.delete.student');

    // Teachers CRUD Routes
    Route::resource('teachers', TeacherController::class);
    Route::get('/admin/add/teacher', [AdminController::class, 'showAddTeacherForm'])->name('admin.add.teacher');
    Route::post('/admin/add/teacher', [AdminController::class, 'addTeacher'])->name('admin.store.teacher');
    Route::get('/admin/view/teacher', [AdminController::class, 'viewTeachers'])->name('admin.view.teacher');
    Route::delete('/admin/delete/teacher/{id}', [AdminController::class, 'deleteTeacher'])->name('admin.delete.teacher');

    // Courses CRUD Routes
    Route::get('/admin/view/courses', [AdminController::class, 'viewCourses'])->name('admin.view.courses');
    Route::get('/admin/add/course', [AdminController::class, 'showAddCourseForm'])->name('admin.add.course');
    Route::post('/admin/store/course', [AdminController::class, 'storeCourse'])->name('admin.store.course');
    Route::get('/admin/edit/course/{id}', [AdminController::class, 'showEditCourseForm'])->name('admin.edit.course');

   // Route::put('/admin/update/course/{id}', [AdminController::class, 'updateCourse'])->name('admin.update.course');
    Route::delete('/admin/delete/course/{id}', [AdminController::class, 'deleteCourse'])->name('admin.delete.course');

    // Departments CRUD Routes
    Route::get('/admin/view/departments', [AdminController::class, 'viewDepartments'])->name('admin.view.departments');
    Route::get('/admin/add/department', [AdminController::class, 'showAddDepartmentForm'])->name('admin.add.department');
    Route::get('/admin/edit/department/{id}', [AdminController::class, 'editDepartment'])->name('admin.edit.department');
    Route::put('/admin/update/department/{id}', [AdminController::class, 'updateDepartment'])->name('admin.update.department');
    Route::delete('/admin/delete/department/{id}', [AdminController::class, 'deleteDepartment'])->name('admin.delete.department');
    Route::post('/admin/store/department', [AdminController::class, 'storeDepartment'])->name('admin.store.department');



    // Admin Login, Logout, and other public/admin operations
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    // Add more routes for registration, reset password, etc. as needed


});

// Teacher Authentication Routes  and other Teacher Routes
Route::prefix('teacher')->middleware('web')->group(function () {
    Route::get('/login', [TeacherController::class, 'showLoginForm'])->name('teacher.login');
    Route::post('/login', [TeacherController::class, 'login'])->name('teacher.login.submit');
    Route::post('/logout', [TeacherController::class, 'logout'])->name('teacher.logout');
    // Add more routes for registration, reset password, etc. as needed
    //dashboard route
    Route::get('/Teacher/teacherdashboard', [TeacherController::class, 'dashboard'])->name('Teacher.teacherdashboard')->middleware('auth:teacher');
    // View Student Route
    Route::get('/teacher/view/student', [TeacherController::class, 'viewStudents'])->name('Teacher.view.student');
    // View Courses Route
    Route::get('/teacher/view/courses', [TeacherController::class, 'viewCourses'])->name('Teacher.view.courses');





});

// Welcome Route
Route::view('/', 'welcome');

// Dashboard Route
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profile Route
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// General Controller Route
Route::get('/general', [GeneralController::class, 'index'])->name('general');
// General Controller Route for POST method
Route::post('/general', [GeneralController::class, 'index'])->name('general');


// Laravel Authentication Routes
Auth::routes();

// Home Route

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');