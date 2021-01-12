<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('ar_school_name', 75)->nullable();
            $table->string('en_school_name', 75)->nullable();
            $table->string('logo')->nullable();
            $table->string('icon')->nullable();
            $table->string('email', 50)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('contact1', 30)->nullable();
            $table->string('contact2', 30)->nullable();
            $table->string('contact3', 30)->nullable();
            $table->string('facebook', 50)->nullable();
            $table->string('youtube', 50)->nullable();
            $table->enum('status', ['open', 'close'])->default('open');
            $table->string('ar_education_administration', 50)->nullable();
            $table->string('en_education_administration', 50)->nullable();
            $table->string('ar_governorate', 50)->nullable();
            $table->string('en_governorate', 50)->nullable();
            $table->string('msg_maintenance', 190)->nullable();
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins');
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
        Schema::dropIfExists('settings');
    }
}
