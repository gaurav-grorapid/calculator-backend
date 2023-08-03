<?php

use App\Models\Calculations;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculations', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique()->index();
            $table->string(Calculations::CALCULATION_NAME);
            $table->string(Calculations::USER_ID);
            $table->string(Calculations::CALCULATION_QUERY);
            $table->float(Calculations::CALCULATION_RESULT);
            $table->boolean(Calculations::IS_ACTIVE)->default(true);
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
        Schema::dropIfExists('calculations');
    }
}
