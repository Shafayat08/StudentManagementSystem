<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMothersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mothers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('parent_or_husband_name')->nullable();
            $table->string('nid_no')->nullable();
            $table->string('village')->nullable();
            $table->string('union')->nullable();
            $table->string('upazila')->nullable();
            $table->string('district')->nullable();
            $table->string('contact_for_urgent_needs')->nullable();
            $table->string('age')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('marriage_age')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('chronic_disease')->nullable();
            $table->string('number_of_tt_vaccination')->nullable();
            $table->string('date_of_last_tt_vaccination')->nullable();
            $table->string('probable_date_of_delivery')->nullable();
            $table->string('number_of_pregnancies')->nullable();
            $table->string('number_of_previous_abortions')->nullable();
            $table->string('age_of_last_child')->nullable();
            $table->string('number_of_previous_delivery_normal')->nullable();
            $table->string('number_of_previous_delivery_caesar')->nullable();
            $table->string('place_of_previous_birth')->nullable();
            $table->string('complications_of_previous_pregnancies')->nullable();
            $table->string('where_give_to_birth')->nullable();
            $table->enum('transport_available_of_emergency',['Yes','No'])->default('No');
            $table->enum('enough_money_for_travel',['Yes','No'])->default('No');
            $table->enum('blood_donors_fixed',['Yes','No'])->default('No');
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
        Schema::dropIfExists('mothers');
    }
}
