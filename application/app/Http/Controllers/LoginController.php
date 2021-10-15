<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __construct()
    {
    }

    public function login(Request $request)
    {
        $baseUrl = Session::get('baseUrl');

        $request->validate([
            'eiin' => 'required'
        ]);
        $credentials = $request->only('eiin');
        $credentials["password"] = '532688';
//        print_r($credentials);
//        die;
        if (Auth::attempt($credentials)) {
            if (Auth::user()->stop == 1) {
                return redirect($baseUrl)->withErrors(['প্রতিষ্ঠানটি ব্যানবেইস সার্ভারে বন্ধ রয়েছে ! পরবর্তী কার্যক্রমের জন্য ব্যানবেইস কর্তৃপক্ষের সাথে যোগাযোগ করুন']);
            } else {
                if (Auth::user()->user_type == 'Institute') {
                    if (in_array(Auth::user()->institute_type, [1, 3, 4])) {
                        return redirect('common/firstPage');
                    }
                    if (Auth::user()->institute_type == 2) {
                        return redirect('common/madFirstPage');
                    }
                    if (Auth::user()->institute_type == 5) {
                        return redirect('technical/tecFirstPage');
                    }
                    if (Auth::user()->institute_type == 9) {
                        return redirect('english/engComFirstPage');
                    }
                    if (Auth::user()->institute_type == 12) {
                        return redirect('privateUni/privateComFirstPage');
                    }
                    if (Auth::user()->institute_type == 8) {
                        return redirect('publicUni/publicComFirstPage');
                    }
                    if (Auth::user()->institute_type == 7) {
                        return redirect('professional/profFirstPage');
                    }
                    if (in_array(Auth::user()->institute_type, [13, 14])) {
                        return redirect('medical/medicalFirstPage');
                    }
                    if (Auth::user()->institute_type == 6) {
                        return redirect('ttc/ttcFirstPage');
                    }
                } else {
                    return redirect($baseUrl)->withErrors(['No Institution Found!']);
                }
            }
        } else {
            return redirect($baseUrl)->withErrors(['Authentication Error!']);
        }
    }

    public function logout()
    {
        $baseUrl = Session::get('baseUrl');
        Auth::logout();
        Session::flush();
        return redirect($baseUrl);
    }
}
