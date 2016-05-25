<?php

namespace App\Http\Controllers;

use App\Student;
use App\ClassroomSubject;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Task;
use DB;
use App\TaskMark;
class StudentTaskViewController extends Controller
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
        $user_id = Auth::user()->id;
        $student = Student::with('user')->where('user_id',$user_id)->first();
        $student_classroom_id = $student->classroom_id;
        $ClassroomSubjects = ClassroomSubject::where('classroom_id',$student_classroom_id)->with('subject')->orderBy('created_at','desc')->paginate(10);
        //dd($ClassroomSubjects);

        return view('pelajar.tugasan.senarai_subjek_tugasan_pelajar',compact('ClassroomSubjects'));
    }

    public function SubjekTaskMarks(Request $request){

        $user_id = Auth::user()->id;
        $student = Student::with('user')->where('user_id',$user_id)->first();
        $student_id = $student->id;

        $subject_id = $request->input('subject_id');
        $classroom_subject_id = $request->input('classroom_subject_id');

        $task_marks = DB::table('task_marks')
            ->join('tasks', 'tasks.id', '=', 'task_marks.task_id')
            //->join('teachers', 'teachers.id', '=', 'tasks.teacher_id')
            ->join('classroom_subjects', 'classroom_subjects.id', '=', 'tasks.classroom_subject_id')
            //->join('classrooms', 'classrooms.id', '=', 'classroom_subjects.classroom_id')
            //->join('subjects', 'subjects.id', '=', 'classroom_subjects.subject_id')
            ->where('classroom_subjects.id','=', $classroom_subject_id)
            //->where('classroom_subjects.subject_id','=', $subject_id)
            ->where('task_marks.student_id','=', $student_id)
            ->select('task_marks.task_id','task_marks.mark', 'tasks.tajuk_tugasan', 'tasks.tarikh_beri', 'tasks.tarikh_hantar')
            ->orderBy('tarikh_beri','desc')->paginate(5);

//        dd($task_marks);
        
        return view('pelajar.tugasan.senarai_markah_satu_subjek_tugasan_pelajar', compact('task_marks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classroom_subject_id = $request->input('classroom_subject_id');
        $nama_subjek = $request->input('nama_subjek');
        $tasks = Task::where('classroom_subject_id',$classroom_subject_id)->orderBy('tarikh_beri','desc')->paginate(5);

        return view('pelajar.tugasan.senarai_tugasan_pelajar', compact('tasks','nama_subjek'));
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

        return view('pelajar.tugasan.papar_tugasan_pelajar', compact('task'));
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
