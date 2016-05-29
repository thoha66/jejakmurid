<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\ClassroomSubject;
use App\Subject;
use App\Classroom;
use App\Teacher;
use DB;
use Auth;
use App\Admin;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ClassroomSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ClassroomSubjects = ClassroomSubject::with('classroom')->with('subject')->with('teacher')->orderBy('created_at','desc')->paginate(5);
        return view('pentadbir.kelassubjek.senarai_kelas_subjek',['ClassroomSubjects' => $ClassroomSubjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::user()->id;
        $admin = Admin::with('user')->where('user_id',$user_id)->first();
        $admin_id = $admin->id;

        $subjects = Subject::all();
        $classrooms = Classroom::all();
        $teachers = Teacher::all();

        return view('pentadbir.kelassubjek.daftar_kelas_subjek',compact('subjects', 'classrooms','teachers','admin_id','admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subject_id     = $request->input('subject_id');
        $classroom_id   = $request->input('classroom_id');
        $teacher_id     = $request->input('teacher_id');
        $sesi           = $request->input('sesi');

        $ClassroomSubject = ClassroomSubject::where('subject_id',$subject_id)
            ->where('classroom_id',$classroom_id)
            ->where('teacher_id',$teacher_id)
            ->where('sesi',$sesi)
            ->first();

        if($ClassroomSubject == null)
        {
            $ClassroomSubject = new ClassroomSubject;

            $ClassroomSubject->admin_id = $request->input('admin_id');
            $ClassroomSubject->subject_id = $request->input('subject_id');
            $ClassroomSubject->classroom_id = $request->input('classroom_id');
            $ClassroomSubject->teacher_id = $request->input('teacher_id');
            $ClassroomSubject->sesi = $request->input('sesi');
            $ClassroomSubject->save();
            Session::flash('flash_message','Kelas Subjek berjaya didaftarkan.');

            return redirect('classroomsubject');
        }
        else{
            Session::flash('flash_message_danger','Kelas/Subjek/Guru/Sesi yang sedang didaftar telah ada dalam sistem.');
            return Redirect::back();
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $user_id = Auth::user()->id;
//        $admin = Admin::with('user')->where('user_id',$user_id)->first();
//        $admin_id = $admin->id;

        $ClassroomSubject = ClassroomSubject::with('classroom')->with('subject')->with('teacher')->find($id);
        $admin = Admin::with('user')->where('user_id',$ClassroomSubject->admin_id)->first();
        return view('pentadbir.kelassubjek.papar_kelas_subjek',compact('ClassroomSubject','admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = Auth::user()->id;
        $admin = Admin::with('user')->where('user_id',$user_id)->first();
        $admin_id = $admin->id;

        $subjects = Subject::all();
        $classrooms = Classroom::all();
        $teachers = Teacher::all();

        $ClassroomSubject = ClassroomSubject::with('classroom')->with('subject')->with('teacher')->find($id);
        return view('pentadbir.kelassubjek.sunting_kelas_subjek',compact('ClassroomSubject','admin_id','admin','subjects','classrooms','teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subject_id     = $request->input('subject_id');
        $classroom_id   = $request->input('classroom_id');
        $teacher_id     = $request->input('teacher_id');
        $sesi           = $request->input('sesi');

        $ClassroomSubject = ClassroomSubject::where('subject_id',$subject_id)
            ->where('classroom_id',$classroom_id)
            ->where('teacher_id',$teacher_id)
            ->where('sesi',$sesi)
            ->first();

        //dd($ClassroomSubject->id);

        if($ClassroomSubject->id == null){
            $id2 = null;
        }
        else{
            $id2 = $ClassroomSubject->id;
        }

        if($id2 == $id){
            $ClassroomSubject = ClassroomSubject::find($id);

            $ClassroomSubject->admin_id = $request->input('admin_id');
            $ClassroomSubject->subject_id = $request->input('subject_id');
            $ClassroomSubject->classroom_id = $request->input('classroom_id');
            $ClassroomSubject->teacher_id = $request->input('teacher_id');
            $ClassroomSubject->sesi = $request->input('sesi');

            $ClassroomSubject->save();
            Session::flash('flash_message','Maklumat kelas subjek berjaya dikemaskini..');

            return redirect('classroomsubject');
        }
        elseif ($id2 == null){

            $ClassroomSubject = ClassroomSubject::find($id);

            $ClassroomSubject->admin_id = $request->input('admin_id');
            $ClassroomSubject->subject_id = $request->input('subject_id');
            $ClassroomSubject->classroom_id = $request->input('classroom_id');
            $ClassroomSubject->teacher_id = $request->input('teacher_id');
            $ClassroomSubject->sesi = $request->input('sesi');

            $ClassroomSubject->save();
            Session::flash('flash_message','Maklumat kelas subjek berjaya dikemaskini..');

            return redirect('classroomsubject');
        }

        else{
            Session::flash('flash_message_danger','Kelas/Subjek/Guru/Sesi yang sedang didaftar telah ada dalam sistem.');
            return Redirect::back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ClassroomSubject::destroy($id);
        Session::flash('flash_message','Maklumat kelas subjek berjaya dibuang.');
        return redirect('classroomsubject');
    }
}
