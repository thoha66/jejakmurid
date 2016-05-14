<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\ClassroomSubject;
use App\Subject;
use App\Classroom;
use App\Teacher;
use DB;

class ClassroomSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$ClassroomSubjects = ClassroomSubject::all()->orderBy('created_at','desc')->paginate(2);
//        $ClassroomSubjects = DB::table('classroom_subjects')->orderBy('created_at','desc')->paginate(2);
        //$ClassroomSubjects = ClassroomSubject::all();
        $ClassroomSubjects = ClassroomSubject::with('classroom')->with('subject')->with('teacher')->orderBy('created_at','desc')->paginate(2);
//        $ClassroomSubjects = ClassroomSubject::subject3()->classroom4()->orderBy('created_at')->get();
        //$classRoom = Classroom::with('subjects')->paginate(2);
        return view('pentadbir.kelassubjek.senarai_kelas_subjek',['ClassroomSubjects' => $ClassroomSubjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        $classrooms = Classroom::all();
        $teachers = Teacher::all();
        return view('pentadbir.kelassubjek.daftar_kelas_subjek',compact('subjects', 'classrooms','teachers'));
//        ['subjects' => $subjects],['classrooms' => $classrooms],['teachers' => $teachers]
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('post'))
        {
            $ClassroomSubject = new ClassroomSubject;

            $ClassroomSubject->admin_id = $request->input('admin_id');
            $ClassroomSubject->subject_id = $request->input('subject_id');
            $ClassroomSubject->classroom_id = $request->input('classroom_id');
            $ClassroomSubject->teacher_id = $request->input('teacher_id');
            $ClassroomSubject->sesi = $request->input('sesi');

            $ClassroomSubject->save();

            //$ClassroomSubject->classrooms()->attach($ClassroomSubject);

        }
        return redirect('classroomsubject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ClassroomSubject = ClassroomSubject::with('classroom')->with('subject')->with('teacher')->find($id);
        return view('pentadbir.kelassubjek.papar_kelas_subjek',['ClassroomSubject' => $ClassroomSubject]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ClassroomSubject = ClassroomSubject::with('classroom')->with('subject')->with('teacher')->find($id);
        return view('pentadbir.kelassubjek.sunting_kelas_subjek',['ClassroomSubject' => $ClassroomSubject]);
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
        $ClassroomSubject = ClassroomSubject::find($id);

        $ClassroomSubject->admin_id = $request->input('admin_id');
        $ClassroomSubject->subject_id = $request->input('subject_id');
        $ClassroomSubject->classroom_id = $request->input('classroom_id');
        $ClassroomSubject->teacher_id = $request->input('teacher_id');
        $ClassroomSubject->sesi = $request->input('sesi');

        $ClassroomSubject->save();

        return redirect('classroomsubject');
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
        return redirect('classroomsubject');
    }
}
