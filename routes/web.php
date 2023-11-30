<?php

// Leader
use App\Http\Controllers\Leader\AdminTourBookingController;
// Admin
use App\Http\Controllers\Admin\AccommodationController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\AirlineTicketController;
use App\Http\Controllers\Admin\AirlineTicketProviderController;
use App\Http\Controllers\Admin\AirportController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\DayItineraryController;
use App\Http\Controllers\Admin\FeeController;
use App\Http\Controllers\Admin\FinancialReportController;
use App\Http\Controllers\Admin\GtiController;
use App\Http\Controllers\Admin\GuideController;
use App\Http\Controllers\Admin\GuideReservationController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\LeaderFlightController;
use App\Http\Controllers\Admin\MediaAssignController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\PassengerInformationController;
use App\Http\Controllers\Admin\PassengerPaymentController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\SightController;
use App\Http\Controllers\Admin\SightDistantController;
use App\Http\Controllers\Admin\SightReservationController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\SupplierTypeController;
use App\Http\Controllers\Admin\TourLeaderController;
use App\Http\Controllers\Admin\TourLeaderTourController;
use App\Http\Controllers\Admin\TransportationCarController;
use App\Http\Controllers\Admin\TransportCostController;
use App\Http\Controllers\Admin\TransportReservationController;
use App\Http\Controllers\Admin\TransportTypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Hotel\HotelReservationController;
use App\Http\Controllers\Passenger\ArrangeFlightController;
use App\Http\Controllers\Passenger\ArrangeHotelController;
use App\Http\Controllers\Passenger\PassengerReportController;
use App\Http\Controllers\Passenger\SpecialRequestController;
use App\Http\Controllers\QrController;
use App\Http\Controllers\Admin\FarmerController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Transport\GroundTransportReservationController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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



require __DIR__.'/auth.php';

Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('/clear-cache', function() {
    Artisan::call('optimize:clear');
    Artisan::call('config:cache');
    return "Cleared!";
});

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

Route::group(['middleware'=>['auth']],function (){
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('/students', StudentController::class);
    Route::resource('/fee', FeeController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/purchase', PurchaseController::class);
});
Route::get('/tour_leader/signup', [TourLeaderController::class, 'signup'])->name('signup');
Route::post('/tour_leader/signup', [TourLeaderController::class, 'postSignup'])->name('register');

Route::get('/new_passenger/signup', [PassengerInformationController::class, 'signup'])->name('passenger_signup');
Route::post('/new_passenger/signup', [PassengerInformationController::class, 'postSignup'])->name('passenger_register');