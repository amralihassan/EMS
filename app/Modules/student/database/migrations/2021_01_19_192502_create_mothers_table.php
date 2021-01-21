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
            $table->bigIncrements('id');
            $table->string('full_name', 75);
            $table->enum('mother_id_type', ['national_id', 'passport'])->default('national_id');
            $table->string('mother_id_number', 15)->unique();
            $table->string('mother_home_phone', 11)->nullable();
            $table->string('mother_mobile1', 15)->unique();
            $table->string('mother_mobile2', 15)->nullable();
            $table->string('mother_job', 75);
            $table->string('mother_email', 75)->nullable()->unique();
            $table->string('mother_qualification', 75);
            $table->string('mother_facebook', 50)->nullable();
            $table->string('mother_whatsapp_number', 15)->nullable()->unique();
            $table->unsignedBigInteger('mother_nationality_id');
            $table->foreign('mother_nationality_id')->references('id')->on('nationalities')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('mother_religion', ['muslim', 'non_muslim'])->default('muslim');
            $table->string('mother_block_no', 5);
            $table->string('mother_street_name', 50);
            $table->string('mother_state', 30);
            $table->string('mother_government', 30);
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
        Schema::dropIfExists('mothers');
    }
}
