<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompetencyController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectEvaluationController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Models\Field;
use App\Models\News;
use App\Models\Project;
use App\Models\Student;
use App\Models\Teacher;

##
# Layout Routes --> for testing
##

Route::get('/public', function () {

    return view('layouts.public');
});
Route::get('/dashboard', function () {
    return view('layouts.dashboard');
});
Route::get('/dashboard/teacher', function () {
    return view('layouts.teacher-dashboard');
})->middleware('auth:teacher');
Route::get('/dashboard/student', function () {
    return view('layouts.student-dashboard');
})->middleware('auth:student');

##
# Public Routes
##
Route::get('/', function () {
    $fields   = Field::all();
    $students = Student::all();
    $teachers = Teacher::all();
    $projects = Project::all();
    $news     = News::all();
    return view('public.home', compact('fields', 'students', 'teachers', 'projects', 'news'));
});
Route::get('/blog', function () {
    $news     = News::all();
    return view('public.blog', compact('news'));
});
Route::get('/about', function () {
    return view('public.about');
});
Route::get('/contact', function () {
    return view('public.contact');
});
Route::get('/posts/{news}', [NewsController::class, 'show']);



##
# Dashboard routes
##

Route::prefix('dashboard')->group(function () {
    # Admin Dashboard Routes
    Route::prefix('admin')->group(function () {
        Route::middleware('auth')->group(function () {
            Route::get('/', function () {
                return view('dashboard.admin.index');
            })->name('admin.index');
            Route::get('/calendar', function () {
                return view('dashboard.admin.calendar');
            });
            # Admins Routes
            Route::resource('admins', AdminController::class);

            # Teacher Routes
            Route::resource('teachers', TeacherController::class);

            # Student Routes
            Route::resource('students', StudentController::class);

            # Field Routes
            Route::resource('fields', FieldController::class);
            //Route to return all specialities related to a certain field
            Route::get('/fields/{field}/specialities', [FieldController::class, 'field_specialities']);

            # Speciality Routes
            Route::resource('specialities', SpecialityController::class);
            # Posts Routes
            Route::resource('posts', NewsController::class);
        });
        #Auth Routes for admin '/dashboard/admin/login'
        Auth::routes();
    });
    # Teacher Dashboard Routes
    Route::prefix('teacher')->group(function () {
        Route::middleware('auth:teacher')->group(function () {
            # Competencies Routes
            Route::resource('competencies', CompetencyController::class);
            # Subjects Routes
            Route::resource('subjects', SubjectController::class);
            # Projects Routes
            Route::resource('projects', ProjectController::class);
            //Routes for evaluations
            Route::get('/assignments', [ProjectEvaluationController::class, 'teacherEvaluation'])->name('teacher.evaluation');
            Route::post('/assignments', [ProjectEvaluationController::class, 'teacherEvaluationSubmit'])->name('teacher.evaluation.submit');
            Route::get('/assignments/{id}', [ProjectEvaluationController::class, 'TeacherSelectStudent']);
        });
    });
    # Student Dashboard Routes
    Route::prefix('student')->group(function () {
        Route::middleware('auth:student')->group(function () {
            # Projects Routes
            Route::get('/projects', [ProjectController::class, 'index']);
            Route::get('/projects/{project}', [ProjectController::class, 'show']);

            //Routes for evaluations
            Route::get('/assignments', [ProjectEvaluationController::class, 'studentEvaluation'])->name('student.evaluation');
            //Routes for evaluations
            Route::post('/assignments', [ProjectEvaluationController::class, 'studentEvaluationSubmit'])->name('student.evaluation.submit');
            Route::get('/assignments/{id}', [ProjectEvaluationController::class, 'StudentSelectProject']);
            # Competencies Routes
            Route::get('/competencies', [CompetencyController::class, 'index']);

            # Subjects Routes
            Route::get('/subjects', [SubjectController::class, 'index']);
        });
    });
    #These are Auth routes for Teachers & students
    Route::get('/login', [LoginController::class, 'showNonDefaultLoginForm'])->name('smart-learning.login');
    Route::post('/login', [LoginController::class, 'nonDefaultLogin'])->name('smart-learning.login.submit');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
