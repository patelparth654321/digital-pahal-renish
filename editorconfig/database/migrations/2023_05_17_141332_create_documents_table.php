<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('document');
            $table->string('document_name');
            $table->integer('client_id');
            $table->string('document_type')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('view_status')->default(0);
            $table->string('year')->nullable();
            $table->string('month')->nullable();
            $table->string('bank')->nullable();
            $table->string('category')->nullable();
            $table->string('password')->nullable();
            $table->string('sub_type')->nullable();
            $table->integer('parent_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
