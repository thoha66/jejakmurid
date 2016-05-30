<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TeacherProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user_id = Auth::user()->id;
        $teacher_user_id = Teacher::with('user')->where('user_id',$user_id)->first();
        $teacher_id = $teacher_user_id->id;

        $teacher = Teacher::with('classroom4')->with('user')->find($teacher_id)->first();
        return view('guru.kemaskini_profil',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CreateTeacherProfileUpdateRequest $request, $id)
    {
        $teacher = Teacher::find($id);
        $teacher_user_id = $teacher->user_id;

        $teacher->nama_guru           = $request->input('nama_guru');
        $teacher->no_tel_guru         = $request->input('no_tel_guru');
        $teacher->no_hp_guru          = $request->input('no_hp_guru');
        $teacher->tarikh_lahir_guru   = $request->input('tarikh_lahir_guru');
        $teacher->alamat_guru         = $request->input('alamat_guru');
        $teacher->poskod_guru         = $request->input('poskod_guru');
        $teacher->email_guru          = $request->input('email_guru');
        $teacher->umur_guru           = $request->input('umur_guru');
        $teacher->jantina_guru        = $request->input('jantina_guru');
        $teacher->save();

        $user = User::find($teacher_user_id);

        $user->name                     = $request->input('nama_guru');
        $user->email                    = $request->input('email_guru');
        $user->save();

        Session::flash('flash_message','Maklumat guru berjaya dikemaskini.');
        return Redirect::back();
    }

    public function password()
    {
        $user_id = Auth::user()->id;
        $teacher_user_id = Teacher::with('user')->where('user_id',$user_id)->first();
        $teacher_id = $teacher_user_id->id;

        $teacher = Teacher::find($teacher_id);
        return view('guru.kemaskini_katalaluan',compact('teacher'));
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
        $teacher_user_id = Teacher::with('user')->where('user_id',$user_id)->first();
        $teacher_id = $teacher_user_id->id;

        $teacher = Teacher::find($teacher_id);
        $teacher_user_id = $teacher->user_id;

        $user = User::find($teacher_user_id);

        $user->password                 = bcrypt($request->input('password'));
        $user->save();
        Session::flash('flash_message','Maklumat katalaluan berjaya dikemaskini.');
        return Redirect::back();
    }
}
