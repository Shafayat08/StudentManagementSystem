<?php

use App\Http\Controllers\Api\SettingApiController;
use App\Http\Controllers\Api\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('register', [UserApiController::class, 'register']);
Route::post('login', [UserApiController::class, 'login']);

Route::get('get-districts', [SettingApiController::class, 'getDistrict']);
Route::get('get-upazilas/{district_id}', [SettingApiController::class, 'getUpazila']);
Route::get('get-unions/{upazila_id}', [SettingApiController::class, 'getUnion']);

Route::middleware('auth:api')->group(function () {
    Route::get('get_profile_info', [UserApiController::class, 'get_profile_info']);
    Route::post('update-profile', [UserApiController::class, 'profileUpdate']);

    Route::post('submit-counciling-request', [UserApiController::class, 'submitCouncilingRequest']);

    
    //Home page by Raz
    Route::get('get-baby-info', [UserApiController::class, 'getBabyInfo']);

});
Route::get('get-diseases', [UserApiController::class, 'getDisease']);

Route::get('get-child-welfare-list', [UserApiController::class, 'getChildWelfareList']);
Route::get('get-patient-welfare-list', [UserApiController::class, 'getPatientWelfareList']);

Route::get('get-entrepreneur-list', [UserApiController::class, 'getEntrepreneurList']);
Route::get('get-bitten-snake-content', [UserApiController::class, 'getBittenSnakeContent']);

Route::get('mental_health_data', [SettingApiController::class, 'mental_health_data']);

Route::get('g', [SettingApiController::class, 'g']);

Route::get('calculate_lmp_edd_date/{query}/{date}', [SettingApiController::class, 'eddToLmpOrLmpToEdd']);