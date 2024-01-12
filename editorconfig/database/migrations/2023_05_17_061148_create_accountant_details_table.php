<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountantDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountant_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('accountant_id');
            $table->string('alternate_number')->nullable();
            $table->string('company_name')->nullable();
            $table->tinyInteger('is_gst')->default(0);
            $table->string('gst_number')->nullable();
            $table->string('address')->nullable();
            $table->string('adhaar_card')->nullable();
            $table->string('pan_card')->nullable();
            $table->string('support_email_id')->nullable();
            $table->string('support_phone')->nullable();
            $table->float('discount')->default(0.00);
            $table->string('logo')->nullable();
            $table->string('type')->default(1)->comment("1=>DMS Documents, 2=>GST Documents");
            $table->integer('plan_id')->nullable();
            $table->date('plan_expiry_date')->nullable();
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
        Schema::dropIfExists('accountant_details');
    }
}
