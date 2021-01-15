<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('accepted')->nullable();
            $table->longText('daily_request')->nullable();
            $table->longText('proof_enrollment')->nullable();
            $table->longText('parent_request')->nullable();
            $table->longText('withdrawal_request')->nullable();
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
        Schema::dropIfExists('report_forms');
    }
}
