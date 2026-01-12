<?php

use App\Http\Controllers\TodoController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [TodoController::class,'index']) -> name ('todos.index');  //List 

Route::get('/todo', [TodoController::class,'index']) -> name ('todos.index');  //List 

Route::get('/todo/create', [TodoController::class, 'create']) -> name('todo.create'); // Form

Route::post('/todo', [TodoController::class, 'store'])-> name ('todos.store'); // Save

Route::get('/todo/{id}', [TodoController::class, 'show'])-> name('todo.show'); // View one

Route::get('/todo/{id}/edit', [TodoController::class, 'edit']) -> name('todo.edit'); // Edit form

Route::put('/todo/{id}', [TodoController::class, 'update']) -> name('todo.update'); // Update

Route::delete('/todo/{id}', [TodoController::class, 'destroy'])-> name('todo.destroy'); // Delete


//ليش اذا عندنا ديانمك راوتر يكون تحت مع انه كل حده واكشن مالها؟