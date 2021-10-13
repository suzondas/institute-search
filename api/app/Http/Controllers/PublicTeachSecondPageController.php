<?php
/**
 * Created by PhpStorm.
 * User: liazm
 * Date: 7/26/2021
 * Time: 4:40 PM
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Univ_resh_wise_teachers;


class PublicTeachSecondPageController extends Controller
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
