<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutesLibrariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutes_libraries', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('SEPERATE_BUILDING_YN',1)->nullable();
            $table->string('LIBRARY_YN',1)->nullable();
            $table->integer('NO_BOOK',6)->nullable();
            $table->integer('NO_ADDITIONAL_BOOK',5)->nullable();
            $table->string('BOOK_ISSUE_YN',1)->nullable();
            $table->string('REGULAR_ISSUE_YN',1)->nullable();
            $table->integer('MONTHLY_ISSUE_BOOK',5)->nullable();
            $table->string('COMPUTERIZED_CATELOG_YN',1)->nullable();
            $table->string('LIBRARIAN_TEACHER_YN',1)->nullable();
            $table->string('TRAINING_YN',1)->nullable();
            $table->string('LIB_HOUR_INCLUSIVE_YN',1)->nullable();
            $table->string('LANGUAGE_CLUB_YN',1)->nullable();
            $table->string('LANGUAGE_BANGLA',1)->nullable();
            $table->string('LANGUAGE_ENGLISH',1)->nullable();
            $table->string('LANGUAGE_ARABIC',1)->nullable();
            $table->string('LANGUAGE_CHINESE',1)->nullable();
            $table->string('LANGUAGE_KOREAN',1)->nullable();
            $table->string('LANGUAGE_RUSSIAN',1)->nullable();
            $table->string('LANGUAGE_JAPAN',1)->nullable();
            $table->string('LANGUAGE_SPANISH',1)->nullable();
            $table->string('LANGUAGE_OTHERS',1)->nullable();
            $table->integer('YEAR',4)->nullable();
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
        Schema::dropIfExists('institutes_libraries');
    }
}
