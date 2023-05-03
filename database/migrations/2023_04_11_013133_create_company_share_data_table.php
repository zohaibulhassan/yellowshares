<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyShareDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_share_data', function (Blueprint $table) {
            $table->id();
            $table->string('CompanyId')->nullable();
            $table->string('Company')->nullable();
            $table->string('ShareHolderID')->nullable();
            $table->longText('ShareHolder')->nullable();
            $table->string('ShareHolderType')->nullable();
            $table->string('Percentage')->nullable();
            $table->string('NoShares')->nullable();
            $table->string('Regnumber')->nullable();
            $table->string('StockYear')->nullable();
            $table->string('StockYearSpan')->nullable();
            
            $table->softDeletes();
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
        Schema::dropIfExists('company_share_data');
    }
}
