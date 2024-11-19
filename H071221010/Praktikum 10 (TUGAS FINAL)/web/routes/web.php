<?php

use App\Http\Controllers\CourseManagementController;
use App\Http\Controllers\ContentManagementController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisteredCourseController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::resource('user-management', UserController::class);

/** Front End */
Route::get('/', function () {
    // Jika pengguna tidak login, arahkan ke halaman login
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    // Jika pengguna sudah login, arahkan ke halaman dashboard
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [CourseController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Courses route to display all courses
Route::get('/courses', [CourseController::class, 'index'])->name('courses');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

Route::get('/apply', [CourseController::class, 'apply'])->name('apply');

// routes/web.php

Route::post('/courses/{course}/register', [RegisteredCourseController::class, 'register'])->name('courses.register');

Route::get('/courses/{course}/content', [CourseController::class, 'showContent'])->name('courses.content');

Route::get('/content/{content}', [CourseController::class, 'showContentDetails'])->name('content.details');

Route::get('/search', [SearchController::class, 'search'])->name('courses.search');

// Route::put('/user-management/{user}', [UserController::class, 'update'])->name('user-management.update');
Route::resource('user-management', UserController::class)->except(['update']);


Route::get('courseManagement/create', [CourseManagementController::class, 'create'])->name('courseManagement.create');
Route::get('contentManagement/create', [ContentManagementController::class, 'create'])->name('contentManagement.create');


Route::get('/course-management', [CourseManagementController::class, 'index'])
    ->name('courseManagement.index');

Route::get('/content-management', [ContentManagementController::class, 'index'])
    ->name('contentManagement.index');

    require __DIR__ . '/auth.php';