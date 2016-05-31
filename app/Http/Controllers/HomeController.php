<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->user_group ==1) {
            //return view('pentadbir.laman_utama_pentadbir');
            return redirect(action('AdminController@index'));
        }
        elseif (Auth::user()->user_group ==5){
            //return view('pelajar.laman_utama_pelajar');
            return redirect(action('StudentController@laman_utama'));
        }
        elseif (Auth::user()->user_group ==6){
            //return view('ibubapa.laman_utama_ibubapa');
            return redirect(action('CaretakerController@index'));
        }
        else{
            //return view('guru.laman_utama_guru');
            return redirect(action('TeacherController@laman_utama'));
        }

    }
}
