<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'v1', 'namespace' => '\App\Http\Controllers\Api\v1'], function () {
    Route::group([
        'prefix' => '{locale}',
        'middleware' => 'setlocale'
    ], function () {
        Route::get('search/countries/Ukraine/divisions/', 'SearchController@searchDivisions');
        Route::get('search/countries/Ukraine/divisions/{division}/cities', 'SearchController@searchCities');
        Route::get('geo-search/countries/Ukraine/divisions/{division}/cities', 'SearchController@geoSearchCities');
    });
});
