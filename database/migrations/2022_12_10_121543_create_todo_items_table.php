<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo_items', function (Blueprint $table) {
            $table->bigIncrements('todo_item_id');
            $table->unsignedBigInteger('todo_id');
            $table->string('todo_item_name');
            $table->text('todo_item_description')->nullable();
            $table->boolean('todo_item_status')->default(FALSE);
            $table->timestamps();
        });

        Schema::table('todo_items', function($table) {
            $table->foreign('todo_id')->references('todo_id')->on('todos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todo_items');
    }
}
