<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name',75);
            $table->enum('type',['guardian','grand_pa','grand_ma','uncle','aunt'])->default('guardian');
            $table->enum('id_type',['national_id','passport'])->default('national_id');
            $table->string('id_number',15)->unique();
            $table->string('mobile1',15)->unique();
            $table->string('mobile2',15)->nullable();
            $table->string('job',75);
            $table->string('email',75)->nullable()->unique();
            $table->string('block_no',5);
            $table->string('street_name',50);
            $table->string('state',30);
            $table->string('government',30);
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
        Schema::dropIfExists('guardians');
    }
}
