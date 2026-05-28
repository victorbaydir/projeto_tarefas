<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('projects.index');
});


// Rotas Projeto
Route::get('projects', 'ProjectController@index')->name('projects.index');
Route::post('projects', 'ProjectController@store')->name('projects.store');
Route::get('projects/{id}/edit', 'ProjectController@edit')->name('projects.edit');
Route::put('projects/{id}', 'ProjectController@update')->name('projects.update');
Route::delete('projects/{id}', 'ProjectController@destroy')->name('projects.destroy');

// Rotas Tarefa
Route::post('projects/{id}/tasks', 'TaskController@store')->name('tasks.store');
Route::put('tasks/{id}/status', 'TaskController@updateStatus')->name('tasks.updateStatus');
Route::delete('tasks/{id}', 'TaskController@destroy')->name('tasks.destroy');