<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SortingController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\BodyPartsController;
use App\Http\Controllers\GreetingsController;





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


Route::get('/', function () {
    return redirect('/dashboard');
})->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/user/profile', [UserController::class, 'profileUpdate'])->name('user.profile-update');

    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
    Route::get('/form-example', [HomeController::class, 'formExample'])->name('form-example');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/lesson/alphabet', function () {
        return view('lesson.alphabet');
    })->name('lesson.alphabet');

    Route::get('/lesson/color', function () {
        return view('lesson.color');
    })->name('lesson.color');

    Route::get('/lesson/family', function () {
        return view('lesson.family');
    })->name('lesson.family');

    Route::get('/lesson/months', function () {
        return view('lesson.months');
    })->name('lesson.months');

    Route::get('/lesson/occupation', function () {
        return view('lesson.occupation');
    })->name('lesson.occupation');

    Route::get('/exercise/memory', function () {
        return view('exercise.memory');
    })->name('exercise.memory');


    //exercise
    Route::get('/exercise/exercise', [ExerciseController::class, 'show'])->name('exercise.exercise');
    Route::post('/exercise-submit', [ExerciseController::class, 'submit']);

    //voice
    Route::get('/exercise-voice', [ExerciseController::class, 'showVoiceExercise'])->name('exercise.voice');

    //quiz
    Route::get('exercise/evaluation', [QuizController::class, 'showQuiz'])->name('exercise.evaluation');

    //body parts
    Route::get('lesson/bodyParts', [BodyPartsController::class, 'index'])->name('lesson.bodyParts');

    //color
    Route::get('lesson-color', [ColorController::class, 'index']);

    //sorting
    Route::get('exercise/sorting', [SortingController::class, 'showSortingExercise'])->name('exercise.sorting');

    //lesson
    Route::get('lesson/lesson1', [GreetingsController::class, 'showLesson'])->name('lesson.lesson1');

    Route::resource('user', UserController::class);

    include __DIR__ . '/generated-web-resources.php';
});
