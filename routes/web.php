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

Route::get('/register', function () {
    return view('mainpage.register');
});
Route::get('/customerlogin', function () {
    return view('mainpage.login');
});

Route::get('/videocall', function () {
    return view('videocall.pages.call');
});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});


Route::get('/dashboard', [Controller::class, 'dashboard']);
Route::get('/userslist', [Controller::class, 'userslist']);
Route::get('/venueslist', [Controller::class, 'venueslist']);
Route::get('/coordinatorslist', [Controller::class, 'coordinatorslist']);
Route::post('/adduser', [Controller::class, 'adduser']);
Route::get('/useredit/{id}', [Controller::class, 'useredit']);
Route::get('/venueedit/{id}', [Controller::class, 'venueedit']);
Route::get('/venuefacilitylist/{id}', [Controller::class, 'facilitylist']);
Route::get('/newfacility/{id}', [Controller::class, 'newfacility']);
Route::post('/addfacility', [Controller::class, 'addfacility']);
Route::post('/deletefacility', [Controller::class, 'deletefacility']);
Route::get('/albumlist/{id}', [Controller::class, 'albumlist']);
Route::get('/newalbum/{id}', [Controller::class, 'newalbum']);
Route::post('/addalbum', [Controller::class, 'addalbum']);
Route::post('/deletealbum', [Controller::class, 'deletealbum']);
Route::get('/coordinatoralbumlist/{id}', [Controller::class, 'coordinatoralbumlist']);
Route::get('/newcoordinatoralbum/{id}', [Controller::class, 'newcoordinatoralbum']);
Route::post('/addcoordinatoralbum', [Controller::class, 'addcoordinatoralbum']);
Route::post('/deletecoordinatoralbum', [Controller::class, 'deletecoordinatoralbum']);



Route::get('/coordinatoredit/{id}', [Controller::class, 'coordinatoredit']);


Route::post('/edituser', [Controller::class, 'editUser']);
Route::post('/editvenue', [Controller::class, 'editvenue']);
Route::post('/deleteuser', [Controller::class, 'deleteUser']);
Route::post('/deletevenue', [Controller::class, 'deletevenue']);
Route::post('/filtervenues', [Controller::class, 'filtervenues']);
Route::post('/logincustomer', [Controller::class, 'logincustomer']);
Route::post('/adminlogin', [Controller::class, 'adminlogin']);
Route::post('/confirmpayment', [Controller::class, 'confirmpayment']);
Route::post('/confirmpaymentcoordinator', [Controller::class, 'confirmpaymentcoordinator']);
Route::post('/coordinatorprofilemanagement', [Controller::class, 'coordinatorprofilemanagement']);
Route::post('/eventbooking', [Controller::class, 'eventbooking']);
Route::post('/coordinatorbooking', [Controller::class, 'coordinatorbooking']);
Route::post('/addvenue', [Controller::class, 'addvenue']);
Route::post('/addcustomer', [Controller::class, 'addcustomer']);
Route::post('/coordinatoreventcancel', [Controller::class, 'coordinatoreventcancel']);
Route::post('/eventcancel', [Controller::class, 'eventcancel']);
Route::post('/addvenue', [Controller::class, 'addvenue']);
Route::get('/venuedetails/{id}', [Controller::class, 'venuedetails']);
Route::get('/allvenues', [Controller::class, 'allvenues']);
Route::get('/allcoordinators', [Controller::class, 'allcoordinators']);
Route::get('/eventscalendar', [Controller::class, 'eventscalendar']);
Route::get('/coordinatorcalendar', [Controller::class, 'coordinatorcalendar']);
Route::get('/myprofile', [Controller::class, 'myprofile']);
Route::get('/editprofile', [Controller::class, 'editprofile']);
Route::get('/aboutus', [Controller::class, 'aboutus']);
Route::get('/coordinatordetails/{id}', [Controller::class, 'coordinatordetails']);
Route::patch('/updateevent/{id}', [Controller::class, 'updateevent']);
Route::patch('/updatecoordinatorevent/{id}', [Controller::class, 'updatecoordinatorevent']);
// Route::get('/pendingpayments', [Controller::class, 'pendingpayments']);
// Route::get('/pendingpaymentscoordinator', [Controller::class, 'pendingpaymentscoordinator']);

Route::get('/privacypolicy', function () {
    return view('mainpage.privacy');
});

// Route::get('/newvenue', function () {
//     return view('admin.newVenue');
// });

Route::get('/newvenue', [Controller::class, 'newvenue']);
Route::get('/onetimepassword', [Controller::class, 'onetimepassword'])->name('One-Time-Password');
Route::post('/userverify', [Controller::class, 'userverify']);
Route::get('/customerlogout', [Controller::class, 'customerlogout']);
Route::post('/editcustomer', [Controller::class, 'editcustomer']);


Route::get('/test', [Controller::class, 'test']);


