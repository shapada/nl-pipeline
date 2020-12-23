<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address')->nullable();
            $table->boolean('approval_documents_signed')->default(0)->nullable();
            $table->boolean('approval_required')->default(0)->nullable();
            $table->date('closing_date')->nullable();
            $table->time('closing_time')->nullable();
            $table->string('closing_location')->nullable();
            $table->boolean('closing_confirmed')->default(0)->nullable();
            $table->decimal('contract_price', 15, 2)->nullable();
            $table->string('lender')->nullable();
            $table->decimal('loan_amount', 15, 2)->nullable();
            $table->integer('loan_number')->unique();
            $table->string('processor');
            $table->string('customer');
            $table->boolean('interest_rate_locked')->default(0)->nullable();
            $table->date('interest_rate_expiration')->nullable();
            $table->longText('notes')->nullable();
            $table->longText('contact_info')->nullable();
            $table->string('title_company')->nullable();
            $table->boolean('flood_ordered')->default(0)->nullable();
            $table->boolean('title_ordered')->default(0)->nullable();
            $table->boolean('appraisal_ordered')->default(0)->nullable();
            $table->boolean('escrow')->default(0)->nullable();
            $table->string('interest_rate')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
