<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanServicePivotTable extends Migration
{
    public function up()
    {
        Schema::create('loan_service', function (Blueprint $table) {
            $table->unsignedBigInteger('loan_id');
            $table->foreign('loan_id', 'loan_id_fk_2809006')->references('id')->on('loans')->onDelete('cascade');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id', 'service_id_fk_2809006')->references('id')->on('services')->onDelete('cascade');
        });
    }
}
