<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('ref_no');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('phone');
            $table->string('email');
            $table->string('stud_no');
            $table->foreignId('period_id');
            $table->foreignId('semester_id');
            $table->foreignId('course_id');
            $table->foreignId('year_id');
            $table->string('method_id');
            $table->string('payment_ref');
            $table->string('image');
            $table->string('for');
            $table->string('amount');
            $table->string('auth_firstname')->nullable();
            $table->string('auth_lastname')->nullable();
            $table->string('auth_middlename')->nullable();
            $table->enum('status', [0, 1])->default(0);
            $table->enum('claim', [0, 1])->default(0);
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
        Schema::dropIfExists('payments');
    }
}
