<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

// create new todo list 
Route::post('todos', [TodoController::class, 'store']);

// Adding a new TODO item
Route::post('todos/{todo_id}/items', [TodoController::class, 'storeItem']);

// Listing all TODO items
Route::get('todos/{todo_id}', [TodoController::class, 'getTodoItemsById']);

// Marking a TODO item as completed
Route::patch('todoitems/{todo_item_id}/completed', [TodoController::class, 'markItemAsCompleted']);

// Listing TODO items not completed yet
Route::get('todos/{todo_id}/notcompleted', [TodoController::class, 'getNotCompletedTodoItemsById']);

// TODO items are stored in a database
Route::get('todoitems', [TodoController::class, 'getAllTodoItems']);
