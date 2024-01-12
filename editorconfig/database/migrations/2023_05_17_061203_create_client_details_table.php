<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->string('company_name')->nullable();
            $table->string('address')->nullable();
            $table->string('gst_number')->nullable();
            $table->string('pancard_number')->nullable();
            $table->string('type')->default(1)->comment("1=>DMS Documents, 2=>GST Documents");
            $table->tinyInteger('gst_type')->default(1);
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
        Schema::dropIfExists('client_details');
    }
}
