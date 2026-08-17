<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;

Route::get('/', [ToDoController::class, 'index'])->name('todo');

Route::post('/store', [ToDoController::class, 'store'])->name('todo.store');

Route::get('/edit', [ToDoController::class, 'edit'])->name('todo.edit');

Route::post('/{task_id}/update', [ToDoController::class, 'update'])->name('todo.update');

Route::get('/{task_id}/delete', [ToDoController::class, 'delete'])->name('todo.delete');

Route::get('/{task_id}/done', [ToDoController::class, 'done'])->name('todo.done');