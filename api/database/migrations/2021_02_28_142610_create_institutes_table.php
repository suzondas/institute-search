<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('institutes', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned()->unique();
            $table->string('EIIN',6);
            $table->foreign('EIIN')->references('EIIN')->on('users');
            $table->integer('LATITUDE',10)->nullable();
            $table->integer('LONGITUDE',10)->nullable();
            $table->string('INSTITUTE_NAME_NEW',150)->nullable();
            $table->string('INSTITUTE_NAME_BANGLA',330)->nullable();
            $table->string('INSTITUTE_TYPE_ID',2)->nullable();
            $table->string('LOCATION',100)->nullable();
            $table->string('POST_OFFICE',60)->nullable();
            $table->string('POST_CODE',60)->nullable();
            $table->string('UNION_ID',9)->nullable();
            $table->string('MAUZA_ID',12)->nullable();
            $table->string('THANA_ID',7)->nullable();
            $table->string('DISTRICT_ID',5)->nullable();
            $table->string('DIVISION_ID',3)->nullable();
            $table->string('MOBPHONE',50)->nullable();
            $table->string('TELEPHONE',50)->nullable();
            $table->string('MOBPHONE_ALTERNATE',50)->nullable();
            $table->string('E_MAIL',80)->nullable();
            $table->string('WEB_SITE',80)->nullable();
            $table->string('EC_NATIONAL_CODE',80)->nullable();
            $table->string('EC_DISTRICT_CODE',60)->nullable();
            $table->string('EDUCATION_LEVEL_ID',2)->nullable();
            $table->string('ARTS_GROUP',2)->nullable();
            $table->string('SCIENCE_GROUP',2)->nullable();
            $table->string('COMMERCE_GROUP',2)->nullable();
            $table->string('ARTS_GROUP_COL',2)->nullable();
            $table->string('SCIENCE_GROUP_COL',2)->nullable();
            $table->string('COMMERCE_GROUP_COL',2)->nullable();
            $table->string('SOCIAL_SCIENCE_GROUP',2)->nullable();
            $table->string('ISLAMIC_STADIES_GROUP',2)->nullable();
            $table->string('MUSIC_GROUP',2)->nullable();
            $table->string('HOME_ECONOMIC_GROUP',2)->nullable();
            $table->string('OTHER_GROUP',2)->nullable();
            $table->string('TECHNICAL_BRANCH_TYPE_AGRO',2)->nullable();
            $table->string('TECHNICAL_BRANCH_TYPE_FISH',2)->nullable();
            $table->string('TECHNICAL_BRANCH_TYPE',2)->nullable();
            $table->string('TECHNICAL_BRANCH_TYPE_BM',2)->nullable();
            $table->string('TECHNICAL_BRANCH_TYPE_HSCVOC',2)->nullable();
            $table->date('ESTABLISH_DATE')->nullable();
            $table->string('ENGLISH_VER_YN',1)->nullable();
            $table->string('MANAGEMENT',1)->nullable();
            $table->date('NATIONALIZATION_DATE')->nullable();
            $table->string('FOR_WHOM',1)->nullable();
            $table->string('GEOGRAPHICAL_STATUS',2)->nullable();
            $table->string('AREA_STATUS1',2)->nullable();
            $table->string('ADMIN_UNIT_COMMUNICATION',2)->nullable();
            $table->string('NEAREST_ADMIN_UNIT_DISTANT',4)->nullable();
            $table->string('NEAREST_INST_DISTANT',4)->nullable();
            $table->string('BRANCH_YN',2)->nullable();
            $table->integer('BRANCH_NO',5)->nullable();
            $table->string('DOUBLE_SHIPT_YN',1)->nullable();
            $table->string('CAMPUS_YN',1)->nullable();
            $table->string('ATTACH_INST_YN',1)->nullable();
            $table->string('MPO_STATUS',1)->nullable();
            $table->string('TECHNICAL_BRANCH_MPO_STATUS',1)->nullable();
            $table->string('INSTITUTE_CODE',15)->nullable();
            $table->string('SHIFT_NO',1)->nullable();
            $table->string('RECOGNITION',1)->nullable();
            $table->string('NATIONAL_UNIVERSITY_CODE',10)->nullable();
            $table->string('SCHOOL_CODE',10)->nullable();
            $table->string('COLLEGE_CODE',10)->nullable();
            $table->string('UNIVERSITY_CODE',10)->nullable();
            $table->string('TECHNICAL_CODE',10)->nullable();
            $table->string('MPO_CODE_SCHOOL',12)->nullable();
            $table->string('MPO_CODE_COLLEGE',12)->nullable();
            $table->string('MPO_CODE_TECHNICAL',12)->nullable();
            $table->string('MPO_CODE_MADRASAH',12)->nullable();
            $table->string('HIFJUL_GROUP',2)->nullable();
            $table->string('MOJJABID_GROUP',2)->nullable();
            $table->string('ARTS_COLLEGE',2)->nullable();
            $table->string('SCIENCE_COLLEGE',2)->nullable();
            $table->string('COMMERCE_COLLEGE',2)->nullable();
            $table->string('BOARD_CODE',2)->nullable();
            $table->string('TECHNICAL_BRANCH_BOTH',2)->nullable();
            $table->string('MPO_CODE_BM',12)->nullable();
            $table->date('ESTABLISH_DATE_VOC')->nullable();
            $table->date('ESTABLISH_DATE_BM')->nullable();
            $table->string('RECOGNITION_COL',1)->nullable();
            $table->date('ESTABLISH_DATE_COLLEGE')->nullable();
            $table->string('CONSTITUENCY',40)->nullable();
            $table->string('CONSTITUTE_NO',4)->nullable();
            $table->date('ESTABLISH_DATE_HSCVOC')->nullable();
            $table->date('ESTABLISH_DATE_DIPLOMA')->nullable();
            $table->date('ESTABLISH_DATE_AGRI_DIPLOMA')->nullable();
            $table->string('VERIFIED_BY',20)->nullable();
            $table->string('VERIFIED_STATUS',20)->nullable();
            $table->string('FORGINE_UNIV_ATTATH_YN',2)->nullable();
            $table->integer('UNIV_ANUSHAD_NO',10)->nullable();
            $table->integer('UNIV_DEPT_NO',10)->nullable();
            $table->integer('UNIV_INST_NO',10)->nullable();
            $table->integer('UNIV_BRANCH_NO',10)->nullable();
            $table->integer('UNIV_EDU_TYPE',10)->nullable();
            $table->integer('SAMISTER_MONTH',10)->nullable();
            $table->integer('SAMISTER_DAY',10)->nullable();
            $table->string('UNIV_EDUCATION_LEVEL_ID',20)->nullable();
            $table->string('TEIIN',6)->nullable();
            $table->string('GOVT_PRIMARY_STATUS',5)->nullable();
            $table->string('SECURITY_GUARD_YN',2)->nullable();
            $table->string('HEAD_STATUS',2)->nullable();
            $table->string('ATTACH_INST_PRIMARY',1)->nullable();
            $table->string('ATTACH_INST_SCHOOL',1)->nullable();
            $table->string('ATTACH_INST_COLLEGE',1)->nullable();
            $table->string('ATTACH_INST_MADRASH',1)->nullable();
            $table->string('UPLOAD_DONE',1)->nullable();
            $table->integer('BONGOBUNDHU',1)->nullable();
            $table->string('IBTEDAI_ATTACH_YN',1)->nullable();
            $table->string('NIGHT_GUARD_YN',2)->nullable();
            $table->date('ESTABLISH_DATE_DAKHIL')->nullable();
            $table->date('ESTABLISH_DATE_ALIM')->nullable();
            $table->date('ESTABLISH_DATE_FAZIL')->nullable();
            $table->date('ESTABLISH_DATE_KAMIL')->nullable();
            $table->string('TECHNICAL_BRANCH_TYPE_ALIM_VOC',2)->nullable();
            $table->string('MOJJABID_MAHIR_GROUP',2)->nullable();
            $table->string('ATTACHED_INST_NAME',330)->nullable();
            $table->string('INST_GOVT_AUTHORITY',330)->nullable();
            $table->integer('UNIV_AFFILATE_COLLEGE_NO')->nullable();
            $table->string('TYPE_NAME',100)->nullable();
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
        //Schema::dropIfExists('institutes');
    }
}
