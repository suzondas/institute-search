<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLookupDesignationVocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lookup_designation_vocs', function (Blueprint $table) {
            $table->id();
            $table->string('DESIGNATION_NAME',100)->nullable();
            $table->string('DESIG_CODE',10)->nullable();
            $table->integer('DESIG_ID',10)->nullable();
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
        Schema::dropIfExists('lookup_designation_vocs');
    }
}
