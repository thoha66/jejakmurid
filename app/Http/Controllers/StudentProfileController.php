<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class StudentProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user_id = Auth::user()->id;
        $student_user_id = Student::with('user')->where('user_id',$user_id)->first();
        $student_id = $student_user_id->id;

        $student = Student::with('classroom')->with('user')->find($student_id);
        return view('pelajar.kemaskini_profil',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CreateStudentUpdateRequest $request, $id)
    {
        $student = Student::find($id);
        $student_user_id = $student->user_id;

        $student->nama_pelajar              = $request->input('nama_pelajar');
        $student->tarikh_lahir_pelajar      = $request->input('tarikh_lahir_pelajar');
        $student->alamat_pelajar            = $request->input('alamat_pelajar');
        $student->poskod_pelajar            = $request->input('poskod_pelajar');
        $student->email_pelajar             = $request->input('email_pelajar');
        $student->umur_pelajar              = $request->input('umur_pelajar');
        $student->jantina_pelajar           = $request->input('jantina_pelajar');
        $student->save();

        $user = User::find($student_user_id);

        $user->name                     = $request->input('nama_pelajar');
        $user->email                    = $request->input('email_pelajar');
        $user->save();

        Session::flash('flash_message','Maklumat pelajar berjaya dikemaskini.');
        return Redirect::back();
    }

    public function password()
    {
        $user_id = Auth::user()->id;
        $student_user_id = Student::with('user')->where('user_id',$user_id)->first();
        $student_id = $student_user_id->id;

        $student = Student::find($student_id);
        return view('pelajar.kemaskini_katalaluan',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatepassword(Request $request)
    {
        $user_id = Auth::user()->id;
        $student_user_id = Student::with('user')->where('user_id',$user_id)->first();
        $student_id = $student_user_id->id;

        $student = Student::find($student_id);
        $student_user_id = $student->user_id;

        $user = User::find($student_user_id);

        $user->password                 = bcrypt($request->input('password'));
        $user->save();
        Session::flash('flash_message','Maklumat katalaluan berjaya dikemaskini.');
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
