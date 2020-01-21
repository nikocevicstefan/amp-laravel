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

Route::get('/students', function(){
    $data['students'] = ['stefan', 'miljan', 'mitja', 'vojkan', 'luka'];
    return view('students', $data);
})->middleware('passwordFilter');

Route::get('/students/create', function(){
    return view('add-student');
})->middleware('passwordFilter');

Route::get('/students/edit/{id}', function ($id){
    return view('edit-student');
})->middleware('passwordFilter');

Route::post('/students', function(){
    dd($_POST);
})->middleware('passwordFilter');

Route::patch('/students/{id}', function($id){
   dd($_POST);
})->middleware('passwordFilter');

Route::delete('/students/{id}', function($id){
    dd("Student ciji je ID:{$id} je obrisan.");
})->middleware('passwordFilter');
