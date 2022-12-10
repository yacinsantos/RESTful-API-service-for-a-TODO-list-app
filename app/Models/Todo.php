<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $primaryKey = 'todo_id';
    protected $fillable = ['todo_name'];

    /**
     * Get all of the items for the Todo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(TodoItem::class, 'todo_id', 'todo_id');
    }
}
