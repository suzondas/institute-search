<?php
/**
 * Created by PhpStorm.
 * User: liazm
 * Date: 7/31/2021
 * Time: 12:04 AM
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Univ_resh_wise_teachers;


class PrivateTeachSecondPageController extends Controller
{

    public function index($inst_id)
    {
        $data = new \stdClass();
        /*Foreign_univ_institutes*/
        $data->univ_resh_wise_teachers = Univ_resh_wise_teachers::where(['institute_id' => $inst_id])->get();
        /*Foreign_univ_institutes*/

        return response()->json($data);
    }

}
