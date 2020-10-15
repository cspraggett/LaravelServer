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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/company-data', function () {
    return view('welcome');
});

Route::get('version', function () {
    $jsonFile = json_decode(file_get_contents('./composer.json'), true);
    return $jsonFile['require']['php'];
});

Route::get('departments', 'DepartmentController@getDepartments');

Route::get('employees/{id}', 'EmployeeController@getEmployeeById');

Route::get('employees', 'EmployeeController@getEmployee');

Route::post('employees', 'EmployeeController@store');
