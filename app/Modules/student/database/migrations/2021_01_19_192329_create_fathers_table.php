<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fathers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ar_st_name', 30);
            $table->string('ar_nd_name', 30);
            $table->string('ar_rd_name', 30);
            $table->string('ar_th_name', 30);
            $table->string('en_st_name', 30);
            $table->string('en_nd_name', 30);
            $table->string('en_rd_name', 30);
            $table->string('en_th_name', 30);
            $table->enum('father_id_type', ['national_id', 'passport'])->default('national_id');
            $table->string('father_id_number', 15)->unique();
            $table->string('father_home_phone', 11)->nullable();
            $table->string('father_mobile1', 15)->unique();
            $table->string('father_mobile2', 15)->nullable();
            $table->string('father_job', 75);
            $table->string('father_email', 75)->nullable()->unique();
            $table->string('father_qualification', 75);
            $table->string('father_facebook', 50)->nullable();
            $table->string('father_whatsapp_number', 15)->nullable()->unique();
            $table->unsignedBigInteger('father_nationality_id');
            $table->foreign('father_nationality_id')->references('id')->on('nationalities')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('father_religion', ['muslim', 'non_muslim'])->default('muslim');
            $table->enum('educational_mandate', ['father', 'mother'])->default('father');
            $table->string('father_block_no', 5);
            $table->string('father_street_name', 50);
            $table->string('father_state', 30);
            $table->string('father_government', 30);
            $table->enum('marital_status', ['married', 'divorced', 'separated', 'widower'])->default('married');
            $table->enum('recognition', ['facebook', 'street', 'parent', 'school_hub'])->default('facebook');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('fathers');
    }
}
