<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoItem extends Model
{
    use HasFactory;
    protected $primaryKey = 'todo_item_id';
    protected $fillable = ['todo_id', 'todo_item_name', 'todo_item_description', 'todo_item_status'];

    /**
     * Get the todo that owns the TodoItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function todo()
    {
        return $this->belongsTo(Todo::class);
    }

}
