<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistItemTable extends Migration
{
    public function up()
    {
        Schema::create('checklist_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('checklist_id');
            $table->integer('item_id');
            $table->integer('created_by');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('checklist_item');
    }
}