<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\TodoItem;

class TodoController extends Controller
{
    // create new todo list 
    public function store(Request $request){
        $todo_name = $request->todo_name;
        $data = array(
            'todo_name' => $todo_name
            );
        $todo = Todo::create($data);
        if ($todo) {
            return response()->json([
                        'data' => [
                            'type' => 'todos',
                            'message' => 'Success',
                            'id' => $todo->todo_id,
                            'attributes' => $todo
                        ]
                    ], 201);
            } else {
            return response()->json([
                        'type' => 'todos',
                        'message' => 'Fail'
                    ], 400);
            }
    }

    // Add new item to todo list
    public function storeItem(Request $request, $todo_id)
    {
            $item_name = $request->item_name;
            $item_descripetion = $request->item_descripetion;
            $item = TodoItem::create([
                'todo_item_name' => $item_name,
                'todo_item_descripetion' => $item_descripetion,
                'todo_id' => $todo_id,
                'todo_item_status' => false,
                ]);
            if ($item) {
                return response()->json([
                            'data' => [
                                'type' => 'todo_items',
                                'message' => 'Success',
                                'id' => $item->todo_item_id,
                                'attributes' => $item
                            ]
                        ], 201);
                } else {
                return response()->json([
                            'type' => 'todo_items',
                            'message' => 'Fail'
                        ], 400);
                }
    }

    // Listing all TODO items
    public function getTodoItemsById($todo_id)
    {
        $todo = Todo::where(['todo_id' => $todo_id])->with('items')->get();
        return response()->json([
            'data' => $todo
        ], 200);
    }

    // Marking a TODO item as completed
    public function markItemAsCompleted($todo_item_id){
        $todoitem = TodoItem::find($todo_item_id);
        if ($todoitem) {
            $todoitem->todo_item_status = true;
            $todoitem->save();
        return response()->json([
                        'data' => [
                            'type' => 'mark_todo_item_as_read',
                            'message' => 'Update Success',
                            'id' => $todoitem->todo_item_id,
                            'attributes' => $todoitem
                        ]
                    ], 201);
            } else {
            return response()->json([
                        'type' => 'mark_todo_item_as_read',
                        'message' => 'Not Found'
                    ], 404);
            }
    }

    // Listing all TODO items
    public function getNotCompletedTodoItemsById($todo_id)
    {
        $todo = TodoItem::where(['todo_id' => $todo_id, 'todo_item_status' => false])->get();
        return response()->json([
            'data' => $todo
        ], 200);
    }

    // TODO items are stored in a database
    public function getAllTodoItems()
    {
        $todo = TodoItem::get();
        return response()->json([
            'data' => $todo
        ], 200);
    }

}
