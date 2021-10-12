<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get('geoLocation', ['uses' => 'GeoLocationController@index']);

/*Common Starts*/
$router->get('common/firstPage/get/{inst_id}', ['uses' => 'FirstPageController@index']);
$router->post('common/firstPage/submitData', ['uses' => 'FirstPageController@store']);
$router->get('common/secondPage/get/{inst_id}/{inst_type}', ['uses' => 'SecondPageController@index']);
$router->post('common/secondPage/submitData', ['uses' => 'SecondPageController@store']);
$router->get('common/thirdPage/get/{inst_id}', ['uses' => 'ThirdPageController@index']);
$router->post('common/thirdPage/submitData', ['uses' => 'ThirdPageController@store']);
$router->get('common/thirdPageEng/get/{inst_id}', ['uses' => 'ThirdPageController@index']);
$router->post('common/thirdPageEng/submitData', ['uses' => 'ThirdPageController@store']);
$router->get('common/thirdPageMad/get/{inst_id}', ['uses' => 'ThirdPageController@index']);
$router->post('common/thirdPageMad/submitData', ['uses' => 'ThirdPageController@store']);
$router->get('common/fourthPage/get/{inst_id}', ['uses' => 'FourthPageController@index']);
$router->post('common/fourthPage/submitData', ['uses' => 'FourthPageController@store']);
$router->get('common/fifthPage/get/{inst_id}', ['uses' => 'FifthPageController@index']);
$router->post('common/fifthPage/submitData', ['uses' => 'FifthPageController@store']);
/*Submission*/
$router->get('common/submissionInfo/get/{inst_id}/{inst_type}', ['uses' => 'SubmissionInfosController@getInfo']);
/*Submission*/
/*Common Ends*/

/*School, College, School and College Starts*/
$router->get('schoolFirstPage/{inst_id}', ['uses' => 'SchoolFirstPageController@index']);
$router->post('schoolFirstPage/submitData', ['uses' => 'SchoolFirstPageController@submitData']);
$router->get('schoolSecondPage/{inst_id}', ['uses' => 'SchoolSecondPageController@index']);
$router->post('schoolSecondPage/submitData', ['uses' => 'SchoolSecondPageController@submitData']);
$router->get('schoolThirdPage/{inst_id}', ['uses' => 'SchoolThirdPageController@index']);
$router->post('schoolThirdPage/submitData', ['uses' => 'SchoolThirdPageController@submitData']);
$router->get('schoolFourthPage/{inst_id}', ['uses' => 'SchoolFourthPageController@index']);
$router->post('schoolFourthPage/submitData', ['uses' => 'SchoolFourthPageController@submitData']);
$router->get('schoolFifthPage/{inst_id}', ['uses' => 'SchoolFifthPageController@index']);
$router->post('schoolFifthPage/submitData', ['uses' => 'SchoolFifthPageController@submitData']);

$router->get('collegeFirstPage/{inst_id}', ['uses' => 'CollegeFirstPageController@index']);
$router->post('collegeFirstPage/submitData', ['uses' => 'CollegeFirstPageController@submitData']);
$router->get('collegeSecondPage/{inst_id}', ['uses' => 'CollegeSecondPageController@index']);
$router->post('collegeSecondPage/submitData', ['uses' => 'CollegeSecondPageController@submitData']);
$router->get('collegeThirdPage/{inst_id}', ['uses' => 'CollegeThirdPageController@index']);
$router->post('collegeThirdPage/submitData', ['uses' => 'CollegeThirdPageController@submitData']);
$router->get('collegeFourthPage/{inst_id}', ['uses' => 'CollegeFourthPageController@index']);
$router->post('collegeFourthPage/submitData', ['uses' => 'CollegeFourthPageController@submitData']);
$router->get('collegeFifthPage/{inst_id}', ['uses' => 'CollegeFifthPageController@index']);
$router->post('collegeFifthPage/submitData', ['uses' => 'CollegeFifthPageController@submitData']);

$router->get('SnCFirstPage/{inst_id}', ['uses' => 'SnCFirstPageController@index']);
$router->post('SnCFirstPage/submitData', ['uses' => 'SnCFirstPageController@submitData']);
$router->get('SnCSecondPage/{inst_id}', ['uses' => 'SnCSecondPageController@index']);
$router->post('SnCSecondPage/submitData', ['uses' => 'SnCSecondPageController@submitData']);
$router->get('SnCThirdPage/{inst_id}', ['uses' => 'SnCThirdPageController@index']);
$router->post('SnCThirdPage/submitData', ['uses' => 'SnCThirdPageController@submitData']);
$router->get('SnCFourthPage/{inst_id}', ['uses' => 'SnCFourthPageController@index']);
$router->post('SnCFourthPage/submitData', ['uses' => 'SnCFourthPageController@submitData']);
$router->get('SnCFifthPage/{inst_id}', ['uses' => 'SnCFifthPageController@index']);
$router->post('SnCFifthPage/submitData', ['uses' => 'SnCFifthPageController@submitData']);
$router->get('SnCSixPage/{inst_id}', ['uses' => 'SnCSixPageController@index']);
$router->post('SnCSixPage/submitData', ['uses' => 'SnCSixPageController@submitData']);
/*School, College, School and College Ends*/

/*Teacher Staff Info*/
$router->get('TeacherStaff/getAll/{inst_id}', ['uses' => 'TeacherStaffController@getAll']);
$router->get('TeacherStaff/getTeacher/{id}', ['uses' => 'TeacherStaffController@getTeacher']);
$router->post('TeacherStaff/addTeacher', ['uses' => 'TeacherStaffController@addTeacher']);
$router->get('TeacherStaff/removeTeacher/{teacher_id}', ['uses' => 'TeacherStaffController@removeTeacher']);
$router->post('TeacherStaff/saveTeacher', ['uses' => 'TeacherStaffController@saveTeacher']);
$router->post('TeacherStaff/store', ['uses' => 'TeacherStaffController@store']);
/*Teacher Staff Info*/

/* madrasa */
$router->post('madFirstPage/submitData', ['uses' => 'MadFirstPageController@store']);
$router->get('madFirstPage/{inst_id}', ['uses' => 'MadFirstPageController@index']);

$router->get('madStdFirstPage/{inst_id}', ['uses' => 'MadStdFirstPageController@index']);
$router->get('madStdSecondPage/{inst_id}', ['uses' => 'MadStdSecondPageController@index']);
$router->get('madStdThirdPage/{inst_id}', ['uses' => 'MadStdThirdPageController@index']);
$router->get('madStdFourthPage/{inst_id}', ['uses' => 'MadStdFourthPageController@index']);
$router->get('madStdFifthPage/{inst_id}', ['uses' => 'MadStdFifthPageController@index']);
$router->get('madStdSixthPage/{inst_id}', ['uses' => 'MadStdSixthPageController@index']);
$router->get('madStdSeventhPage/{inst_id}', ['uses' => 'MadStdSeventhPageController@index']);

$router->post('madStdFirstPage/submitData', ['uses' => 'MadStdFirstPageController@submitData']);
$router->post('madStdSecondPage/submitData', ['uses' => 'MadStdSecondPageController@submitData']);
$router->post('madStdThirdPage/submitData', ['uses' => 'MadStdThirdPageController@submitData']);
$router->post('madStdFourthPage/submitData', ['uses' => 'MadStdFourthPageController@submitData']);
$router->post('madStdFifthPage/submitData', ['uses' => 'MadStdFifthPageController@submitData']);
$router->post('madStdSixthPage/submitData', ['uses' => 'MadStdSixthPageController@submitData']);
$router->post('madStdSeventhPage/submitData', ['uses' => 'MadStdSeventhPageController@submitData']);
/* madrasa end */

/*Technical*/
$router->get('tecFirstPage/{inst_id}', ['uses' => 'TecFirstPageController@index']);
$router->get('tecStdFirstPage/{inst_id}', ['uses' => 'TecStdFirstPageController@index']);
$router->get('tecStdSecondPage/{inst_id}', ['uses' => 'TecStdSecondPageController@index']);
$router->get('tecStdThirdPage/{inst_id}', ['uses' => 'TecStdThirdPageController@index']);
$router->get('tecStdFourthPage/{inst_id}', ['uses' => 'TecStdFourthPageController@index']);
$router->get('tecStdFifthPage/{inst_id}', ['uses' => 'TecStdFifthPageController@index']);
$router->get('tecStdSixthPage/{inst_id}', ['uses' => 'TecStdSixthPageController@index']);
$router->get('tecStdSeventhPage/{inst_id}', ['uses' => 'TecStdSeventhPageController@index']);
$router->get('tecStdEightPage/{inst_id}', ['uses' => 'TecStdEightPageController@index']);

$router->post('tecFirstPage/submitData', ['uses' => 'TecFirstPageController@store']);
$router->post('tecStdFirstPage/submitData', ['uses' => 'TecStdFirstPageController@submitData']);
$router->post('tecStdSecondPage/submitData', ['uses' => 'TecStdSecondPageController@submitData']);
$router->post('tecStdThirdPage/submitData', ['uses' => 'TecStdThirdPageController@submitData']);
$router->post('tecStdFourthPage/submitData', ['uses' => 'TecStdFourthPageController@submitData']);
$router->post('tecStdFifthPage/submitData', ['uses' => 'TecStdFifthPageController@submitData']);
$router->post('tecStdSixthPage/submitData', ['uses' => 'TecStdSixthPageController@submitData']);
$router->post('tecStdSeventhPage/submitData', ['uses' => 'TecStdSeventhPageController@submitData']);
$router->post('tecStdEightPage/submitData', ['uses' => 'TecStdEightPageController@submitData']);
/*Technical end*/

/*English Medium*/
$router->get('engComFirstPage/{inst_id}', ['uses' => 'EngComFirstPageController@index']);
$router->get('engComSecondPage/{inst_id}', ['uses' => 'EngComSecondPageController@index']);
$router->get('engStdFirstPage/{inst_id}', ['uses' => 'EngStdFirstPageController@index']);
$router->get('engStdSecondPage/{inst_id}', ['uses' => 'EngStdSecondPageController@index']);
$router->get('engTeachFirstPage/{inst_id}', ['uses' => 'EngTeacherFirstPageController@index']);

$router->post('engComFirstPage/submitData', ['uses' => 'EngComFirstPageController@store']);
$router->post('engComSecondPage/submitData', ['uses' => 'EngComSecondPageController@submitData']);
$router->post('engStdFirstPage/submitData', ['uses' => 'EngStdFirstPageController@submitData']);
$router->post('engStdSecondPage/submitData', ['uses' => 'EngStdSecondPageController@submitData']);
$router->post('engTeachFirstPage/submitData', ['uses' => 'EngTeacherFirstPageController@submitData']);
/*English Medium end*/

/* Public University */
$router->post('publicComFirstPage/addForeignUnivInst', ['uses' => 'PublicComFirstPageController@addForeignUnivInst']);
$router->post('publicStdSecondPage/addForeignStd', ['uses' => 'PublicStdSecondPageController@addForeignStd']);
$router->post('publicTeachSecondPage/addReshTeacher', ['uses' => 'PublicTeachSecondPageController@addReshTeacher']);
$router->get('publicComFirstPage/removeForeignUnivInst/{id}', ['uses' => 'PublicComFirstPageController@removeForeignUnivInst']);
$router->get('publicStdSecondPage/removeForeignStd/{id}', ['uses' => 'PublicStdSecondPageController@removeForeignStd']);
$router->get('publicTeachSecondPage/removeReshTeacher/{id}', ['uses' => 'PublicTeachSecondPageController@removeReshTeacher']);

$router->get('publicComFirstPage/{inst_id}', ['uses' => 'PublicComFirstPageController@index']);
$router->get('publicComSecondPage/{inst_id}', ['uses' => 'PublicComSecondPageController@index']);
$router->post('publicComFirstPage/submitData', ['uses' => 'PublicComFirstPageController@store']);
$router->post('publicComSecondPage/submitData', ['uses' => 'PublicComSecondPageController@submitData']);
$router->get('publicStdFirstPage/{inst_id}', ['uses' => 'PublicStdFirstPageController@index']);
$router->get('publicStdSecondPage/{inst_id}', ['uses' => 'PublicStdSecondPageController@index']);
$router->get('publicStdThirdPage/{inst_id}', ['uses' => 'PublicStdThirdPageController@index']);
$router->get('publicTeachFirstPage/{inst_id}', ['uses' => 'PublicTeachFirstPageController@index']);
$router->get('publicTeachSecondPage/{inst_id}', ['uses' => 'PublicTeachSecondPageController@index']);
$router->get('publicTeachThirdPage/{inst_id}', ['uses' => 'PublicTeachThirdPageController@index']);
$router->get('publicBibidho/{inst_id}', ['uses' => 'PublicBibidhoController@index']);
$router->post('publicStdFirstPage/submitData', ['uses' => 'PublicStdFirstPageController@submitData']);
$router->post('publicStdSecondPage/submitData', ['uses' => 'PublicStdSecondPageController@submitData']);
$router->post('publicStdThirdPage/submitData', ['uses' => 'PublicStdThirdPageController@submitData']);
$router->post('publicTeachFirstPage/submitData', ['uses' => 'PublicTeachFirstPageController@submitData']);
$router->post('publicTeachSecondPage/submitData', ['uses' => 'PublicTeachSecondPageController@submitData']);
$router->post('publicTeachThirdPage/submitData', ['uses' => 'PublicTeachThirdPageController@submitData']);
$router->post('publicBibidho/submitData', ['uses' => 'PublicBibidhoController@submitData']);
/*Public University end*/

/* Private University */
$router->post('privateComFirstPage/addForeignUnivInst', ['uses' => 'PrivateComFirstPageController@addForeignUnivInst']);
$router->post('privateStdSecondPage/addForeignStd', ['uses' => 'PrivateStdSecondPageController@addForeignStd']);
$router->post('privateTeachSecondPage/addReshTeacher', ['uses' => 'PrivateTeachSecondPageController@addReshTeacher']);
$router->get('privateComFirstPage/removeForeignUnivInst/{id}', ['uses' => 'PrivateComFirstPageController@removeForeignUnivInst']);
$router->get('privateStdSecondPage/removeForeignStd/{id}', ['uses' => 'PrivateStdSecondPageController@removeForeignStd']);
$router->get('privateTeachSecondPage/removeReshTeacher/{id}', ['uses' => 'PrivateTeachSecondPageController@removeReshTeacher']);

$router->get('privateComFirstPage/{inst_id}', ['uses' => 'PrivateComFirstPageController@index']);
$router->get('privateComSecondPage/{inst_id}', ['uses' => 'PrivateComSecondPageController@index']);
$router->get('privateStdFirstPage/{inst_id}', ['uses' => 'PrivateStdFirstPageController@index']);
$router->get('privateStdSecondPage/{inst_id}', ['uses' => 'PrivateStdSecondPageController@index']);
$router->get('privateStdThirdPage/{inst_id}', ['uses' => 'PrivateStdThirdPageController@index']);
$router->get('privateTeachFirstPage/{inst_id}', ['uses' => 'PrivateTeachFirstPageController@index']);
$router->get('privateTeachSecondPage/{inst_id}', ['uses' => 'PrivateTeachSecondPageController@index']);
$router->get('privateTeachThirdPage/{inst_id}', ['uses' => 'PrivateTeachThirdPageController@index']);
$router->get('privateBibidho/{inst_id}', ['uses' => 'PrivateBibidhoController@index']);
$router->post('privateComFirstPage/submitData', ['uses' => 'PrivateComFirstPageController@store']);
$router->post('privateComSecondPage/submitData', ['uses' => 'PrivateComSecondPageController@submitData']);
$router->post('privateStdFirstPage/submitData', ['uses' => 'PrivateStdFirstPageController@submitData']);
$router->post('privateStdSecondPage/submitData', ['uses' => 'PrivateStdSecondPageController@submitData']);
$router->post('privateStdThirdPage/submitData', ['uses' => 'PrivateStdThirdPageController@submitData']);
$router->post('privateTeachFirstPage/submitData', ['uses' => 'PrivateTeachFirstPageController@submitData']);
$router->post('privateTeachSecondPage/submitData', ['uses' => 'PrivateTeachSecondPageController@submitData']);
$router->post('privateTeachThirdPage/submitData', ['uses' => 'PrivateTeachThirdPageController@submitData']);
$router->post('privateBibidho/submitData', ['uses' => 'PrivateBibidhoController@submitData']);
/*Private University end*/

/*Professional*/
$router->get('profFirstPage/{inst_id}', ['uses' => 'ProfFirstPageController@index']);
$router->get('profStdFirstPage/{inst_id}', ['uses' => 'ProfStdFirstPageController@index']);
$router->get('profStdSecondPage/{inst_id}', ['uses' => 'ProfStdSecondPageController@index']);
$router->get('profStdThirdPage/{inst_id}', ['uses' => 'ProfStdThirdPageController@index']);
$router->get('profStdFourthPage/{inst_id}', ['uses' => 'ProfStdFourthPageController@index']);

$router->post('profFirstPage/submitData', ['uses' => 'ProfFirstPageController@store']);
$router->post('profStdFirstPage/submitData', ['uses' => 'ProfStdFirstPageController@store']);
$router->post('profStdSecondPage/submitData', ['uses' => 'ProfStdSecondPageController@store']);
$router->post('profStdThirdPage/submitData', ['uses' => 'ProfStdThirdPageController@store']);
$router->post('profStdFourthPage/submitData', ['uses' => 'ProfStdFourthPageController@store']);
/*Professional end*/

/*ttc*/
$router->get('ttcFirstPage/{inst_id}', ['uses' => 'TtcFirstPageController@index']);
$router->get('ttcSecondPage/{inst_id}', ['uses' => 'TtcSecondPageController@index']);
$router->get('ttcStdFirstPage/{inst_id}', ['uses' => 'TtcStdFirstPageController@index']);
$router->get('ttcTeacherFirstPage/{inst_id}', ['uses' => 'TtcTeacherFirstPageController@index']);

$router->post('ttcFirstPage/submitData', ['uses' => 'TtcFirstPageController@store']);
$router->post('ttcSecondPage/submitData', ['uses' => 'TtcSecondPageController@submitData']);
$router->post('ttcStdFirstPage/submitData', ['uses' => 'TtcStdFirstPageController@submitData']);
$router->post('ttcTeacherFirstPage/submitData', ['uses' => 'TtcTeacherFirstPageController@submitData']);
/*ttc end*/

/*Medical Start*/
$router->get('medicalFirstPage/{inst_id}', ['uses' => 'MedicalFirstPageController@index']);
$router->get('medicalSecondPage/{inst_id}/{inst_type}', ['uses' => 'MedicalSecondPageController@index']);
$router->get('medicalStdFirstPage/{inst_id}', ['uses' => 'MedicalStdFirstPageController@index']);
$router->get('medicalStdSecondPage/{inst_id}', ['uses' => 'MedicalStdSecondPageController@index']);
$router->get('medicalBibidho/get/{inst_id}', ['uses' => 'MedicalBibidhoController@index']);
$router->post('medicalFirstPage/store', ['uses' => 'MedicalFirstPageController@store']);
$router->post('medicalSecondPage/submitData', ['uses' => 'MedicalSecondPageController@store']);
$router->post('medicalStdFirstPage/submitData', ['uses' => 'MedicalStdFirstPageController@store']);
$router->post('medicalStdSecondPage/submitData', ['uses' => 'MedicalStdSecondPageController@store']);
$router->post('medicalBibidho/submitData', ['uses' => 'MedicalBibidhoController@store']);
$router->get('medicalTeachInfo/{inst_id}', ['uses' => 'MedicalTeacherPageController@index']);

/*Medical End*/
