<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('passport');
            $table->string('phone');
            $table->string('username');
            $table->string('password');
            $table->string('date_birth');
            $table->string('blood');
            $table->enum('gender',['ذكر','أنثى']);
            // $table->float('wieght');
            $table->enum('status',['مصاب','متبرع','متعافي','غير مصاب','متوفي']);
            $table->string('address');
            $table->float('last_lat')->default(0.0);
            $table->float('last_lng')->default(0.0);
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
        Schema::dropIfExists('patients');
    }
}
