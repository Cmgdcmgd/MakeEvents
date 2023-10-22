<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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

Route::get('/', [Controller::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/administrator', function () {
    return view('authentication.adminLogin');
});


Route::get('/administrator', function () {
    return view('authentication.adminLogin');
});
Route::get('/newuser', function () {
    return view('admin.newUser');
});
Route::get('/newvenue', function () {
    return view('admin.newVenue');
});
Route::get('/register', function () {
    return view('mainpage.register');
});
Route::get('/customerlogin', function () {
    return view('mainpage.login');
});



Route::get('/dashboard', [Controller::class, 'dashboard']);
Route::get('/userslist', [Controller::class, 'userslist']);
Route::get('/venueslist', [Controller::class, 'venueslist']);
Route::get('/coordinatorslist', [Controller::class, 'coordinatorslist']);
Route::post('/adduser', [Controller::class, 'adduser']);
Route::get('/useredit/{id}', [Controller::class, 'useredit']);
Route::get('/venueedit/{id}', [Controller::class, 'venueedit']);
Route::get('/coordinatoredit/{id}', [Controller::class, 'coordinatoredit']);
Route::post('/edituser', [Controller::class, 'editUser']);
Route::post('/editvenue', [Controller::class, 'editvenue']);
Route::post('/deleteuser', [Controller::class, 'deleteUser']);
Route::post('/deletevenue', [Controller::class, 'deletevenue']);
Route::post('/logincustomer', [Controller::class, 'logincustomer']);
Route::post('/adminlogin', [Controller::class, 'adminlogin']);
Route::post('/confirmpayment', [Controller::class, 'confirmpayment']);
Route::post('/coordinatorprofilemanagement', [Controller::class, 'coordinatorprofilemanagement']);
Route::post('/eventbooking', [Controller::class, 'eventbooking']);
Route::post('/coordinatorbooking', [Controller::class, 'coordinatorbooking']);
Route::post('/addvenue', [Controller::class, 'addvenue']);
Route::post('/addcustomer', [Controller::class, 'addcustomer']);
Route::post('/eventcancel', [Controller::class, 'eventcancel']);
Route::get('/venuedetails/{id}', [Controller::class, 'venuedetails']);
Route::get('/allvenues', [Controller::class, 'allvenues']);
Route::get('/allcoordinators', [Controller::class, 'allcoordinators']);
Route::get('/eventscalendar', [Controller::class, 'eventscalendar']);
Route::get('/myprofile', [Controller::class, 'myprofile']);
Route::get('/editprofile', [Controller::class, 'editprofile']);
Route::get('/coordinatordetails/{id}', [Controller::class, 'coordinatordetails']);
Route::patch('/updateevent/{id}', [Controller::class, 'updateevent']);
Route::get('/pendingpayments', [Controller::class, 'pendingpayments']);


Route::get('/customerlogout', [Controller::class, 'customerlogout']);
Route::post('/editcustomer', [Controller::class, 'editcustomer']);


Route::get('/test', [Controller::class, 'test']);


