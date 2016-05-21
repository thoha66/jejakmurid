<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Task;
use App\ClassroomSubject;
use App\Classroom;
use DB;
use Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $teacher = Teacher::with('user')->where('user_id',$user_id)->first();
        $teacher_id = $teacher->id;

//        $tasks = Task::where('teacher_id',$teacher_id)->where('status','belum')->with('teacher')->orderBy('created_at','desc')->paginate(2);
//        $classroom_subject_id = $tasks->classroom_subject_id;
//        $classroomsubjects = ClassroomSubject::where('id',$classroom_subject_id)->with('classroom')->with('subject')->with('teacher')->get();

        $tasks = DB::table('tasks')
            ->join('teachers', 'teachers.id', '=', 'tasks.teacher_id')
            ->join('classroom_subjects', 'classroom_subjects.id', '=', 'tasks.classroom_subject_id')
            ->join('classrooms', 'classrooms.id', '=', 'classroom_subjects.classroom_id')
            ->join('subjects', 'subjects.id', '=', 'classroom_subjects.subject_id')
            ->where('tasks.teacher_id','=', $teacher_id)
            ->where('tasks.status','=', 'belum')
            ->select('tasks.*','teachers.nama_guru','classrooms.nama_kelas','subjects.nama_subjek')
            ->orderBy('tasks.updated_at','desc')
            ->paginate(2);
//        dd($tasks);

        return view('guru.tugasan.senarai_tugasan',compact('tasks','teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::user()->id;
        $teacher = Teacher::with('user')->where('user_id',$user_id)->first();
        $teacher_id = $teacher->id;

        $classroomsubjects = ClassroomSubject::with('classroom')->with('subject')->with('teacher')->where('teacher_id',$teacher_id)->get();

        return view('guru.tugasan.beri_tugasan',compact('teacher','classroomsubjects'));
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
            
            $task = new Task;

            $task->teacher_id = $request->input('teacher_id');
            $task->classroom_subject_id = $request->input('classroom_subject_id');
            $task->tajuk_tugasan = $request->input('tajuk_tugasan');
            $task->penerangan_tugasan = $request->input('penerangan_tugasan');
            $task->tarikh_beri = $request->input('tarikh_beri');
            $task->tarikh_hantar = $request->input('tarikh_hantar');
            $task->status = 'belum';

            $task->save();

        }
        return redirect('task');
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

        return view('guru.tugasan.papar_tugasan',['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classroomsubjects = ClassroomSubject::with('classroom')->with('subject')->with('teacher')->get();
        $task = Task::find($id);
        return view('guru.tugasan.sunting_tugasan',compact('classroomsubjects','task'));
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
        $task = Task::find($id);

        $task->teacher_id           = $request->input('teacher_id');
        $task->classroom_subject_id = $request->input('classroom_subject_id');
        $task->tajuk_tugasan        = $request->input('tajuk_tugasan');
        $task->penerangan_tugasan   = $request->input('penerangan_tugasan');
        $task->tarikh_beri          = $request->input('tarikh_beri');
        $task->tarikh_hantar        = $request->input('tarikh_hantar');

        $task->save();

        return redirect('task');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::destroy($id);
        return redirect('task');
    }
}
