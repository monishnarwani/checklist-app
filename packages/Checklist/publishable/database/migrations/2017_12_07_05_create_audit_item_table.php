<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditItemTable extends Migration
{
    public function up()
    {
        Schema::create('audit_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('audit_id');
            $table->integer('item_id');
            $table->boolean('response');
            $table->text('comment')->nullable();
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('audit_item');
    }
}