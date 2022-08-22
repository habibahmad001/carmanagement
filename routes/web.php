<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\admin;
use App\Http\Controllers\Rules;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\FakerController;
use App\Http\Controllers\JobsEmployee;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\JobsEmployer;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QandAController;
use App\Http\Controllers\QuizController;


/*__________________Users Routs______________________________*/

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('verifyemail/{id}', [RegisterController::class, 'verifyEmail']);
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm']);
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset_password', [ForgotPasswordController::class, 'reset_password']);
Route::get('/checkUsername', [Rules::class, 'checkUsername']);
Route::get('/checkUserEmail', [Rules::class, 'checkUserEmail']);


// Registration Routes...
Route::get('/register', [LoginController::class, 'showLoginForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
// Login user
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


// Route::get('admin_area', ['middleware' => 'admin', function () {
Route::middleware(['admin'])->group(function () {

    Route::post('/users_add', [UserController::class, 'create_user']);
    Route::resource('users', UserController::class);
    Route::get('/user-create', [UserController::class, 'user_create']);
    Route::get('/getusers/{id}', [UserController::class, 'getusers']);
    Route::get('/email-exist', [UserController::class, 'isEmailExist']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);
    Route::post('/users_add', [UserController::class, 'create_user']);
    Route::get('/user-edit/{squirrel}', [UserController::class, 'edit_user']);
    Route::post('/update-user', [UserController::class, 'update_user']);
    Route::get('/user-delete/{squirrel}', [UserController::class, 'delete_user']);
    Route::get('/my-account', [UserController::class, 'my_account']);

    /*__________________Category Routs______________________________*/

    Route::resource('categories', CategoriesController::class);
    Route::get('/category-exist', [CategoriesController::class, 'isCategoryExist']);
    Route::get('/getCategory/{id}', [CategoriesController::class, 'getCategory']);
    Route::post('/category-update', [CategoriesController::class, 'update']);
    Route::delete('/category/{id}', [CategoriesController::class, 'destroy']);


    /*__________________Cars Routs______________________________*/

    Route::resource('cars', CarsController::class);
    Route::get('/car-exist', [CarsController::class, 'isCarExist']);
    Route::get('/getcar/{id}', [CarsController::class, 'getCar']);
    Route::post('/car-update', [CarsController::class, 'update']);
//    Route::delete('/car/{id}', [CarsController::class, 'destroy']);
    Route::get('/car/{id}', [CarsController::class, 'destroy']);



    Route::resource('sessions', SessionsController::class);
    Route::resource('facker', FakerController::class);
    Route::get('/update-session/{id}', [SessionsController::class, 'status_update']);
    Route::get('/date-exist', [SessionsController::class, 'isdateExist']);

    Route::get('/manage-rules', [Rules::class, 'manage_rules']);
    Route::post('/post_rule', [Rules::class, 'post_rule']);

});

Route::middleware(['employee'])->group(function () {
    Route::get('/employee', [JobsEmployee::class, 'index']);
    Route::get('/employee_listing', [JobsEmployee::class, 'employee_listing']);
});

Route::middleware(['employer'])->group(function () {
    Route::get('/employer', [JobsEmployer::class, 'index']);
    Route::get('/employer_listing', [JobsEmployer::class, 'employer_listing']);
    Route::get('/create_job', [JobsEmployer::class, 'create_job']);
    Route::post('/emp_c_j', [JobsEmployer::class, 'emp_c_j']);
});

/*___________________Public Routs______________________________*/
Route::get('/contactus', [JobsController::class, 'contact_us']);
Route::post('/email_form', [JobsEmployer::class, 'email_form']);

Route::get('/apiWithoutKey', [JobsEmployer::class, 'apiWithoutKey']);
Route::get('/apiWithKey', [JobsEmployer::class, 'apiWithKey']);

Route::get('/jobs', [JobsController::class, 'index']);
Route::get('/alljobs/{id}', [JobsController::class, 'catjobs']);
Route::get('/jobdetail/{id}', [JobsController::class, 'jobdetail']);
Route::get('/adminjobs', [Rules::class, 'joblisting']);
Route::get('/admincars', [Rules::class, 'carlisting']);

Route::post('/search', [JobsController::class, 'search'])->name('search');
/*___________________Public Routs______________________________*/




// Auth::routes();

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/get-started', function () {
    return view('demo');
});
