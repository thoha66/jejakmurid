<?php

namespace App\Http\Controllers;

use App\Caretaker;
use App\ClassroomSubject;
use App\Student;
use App\Task;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;

class CaretakerStudentTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $student_id = $request->input('student_id');
        $student = Student::where('id',$student_id)->first();
        $student_classroom_id = $student->classroom_id;
        $ClassroomSubjects = ClassroomSubject::where('classroom_id',$student_classroom_id)->with('subject')->get();
        
        return view('ibubapa.tugasan.senarai_subjek_tugasan_pelajar',compact('ClassroomSubjects'));
    }
    public function index2(Request $request)
    {
        $ClassroomSubject_id = $request->input('classroom_subject_id');
        $ClassroomSubject = ClassroomSubject::where('id',$ClassroomSubject_id)->with('subject')->first();
        $nama_subjek = $ClassroomSubject->subject->nama_subjek;
        //dd($ClassroomSubject_id);
        $tasks = Task::where('classroom_subject_id',$ClassroomSubject_id)->orderBy('tarikh_beri','desc')->paginate(5);
//        dd($tasks);
        return view('ibubapa.tugasan.senarai_tugasan_pelajar',compact('tasks','nama_subjek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::user()->id;
        $Caretaker = Caretaker::with('user')->where('user_id',$user_id)->first();
        $Caretaker_id = $Caretaker->id;

        $students = Student::where('caretaker_id',$Caretaker_id)->get();

        return view('ibubapa.tugasan.cari_tugasan_pelajar',compact('students'));
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
        $task = DB::table('tasks')
            ->join('teachers', 'teachers.id', '=', 'tasks.teacher_id')
            ->join('classroom_subjects', 'classroom_subjects.id', '=', 'tasks.classroom_subject_id')
            ->join('classrooms', 'classrooms.id', '=', 'classroom_subjects.classroom_id')
            ->join('subjects', 'subjects.id', '=', 'classroom_subjects.subject_id')
            ->where('tasks.id','=', $id)
            ->select('tasks.*', 'classroom_subjects.*','teachers.*','classrooms.*','subjects.*')
            ->first();

        return view('ibubapa.tugasan.papar_tugasan_pelajar', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
