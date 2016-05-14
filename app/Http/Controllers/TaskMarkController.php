<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TaskMark;
use App\Task;
use App\ClassroomSubject;
use App\Classroom;
use App\Student;
use DB;


class TaskMarkController extends Controller
{
    public function addmark($id)
    {
        $task= Task::find($id);
        $classroom_subject_id = $task->classroom_subject_id;
        $task_title = $task->tajuk_tugasan;

        $classroomsubject = ClassroomSubject::find($classroom_subject_id);
        $classroom_id = $classroomsubject->classroom_id;

        $classroom = Classroom::find($classroom_id);
        $class_name = $classroom->nama_kelas;

        $students = Student::where('classroom_id',$classroom_id)->orderBy('created_at','desc')->get();
//        $students = DB::table('students')->where('classroom_id', $classroom_id)->get();

        return view('guru.tugasan.markah_tugasan.beri_markah_tugasan',compact('class_name', 'students','task_title','id'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('teacher_id',1)->where('status','sudah')->with('teacher')->orderBy('created_at','desc')->paginate(2);

        return view('guru.tugasan.markah_tugasan.senarai_markah_tugasan',['tasks' => $tasks]);
    }
    public function index2()
    {
//        $taskmarks = DB::table('task_marks')
//            ->join('tasks', 'tasks.id', '=', 'task_marks.task_id')
//            ->where('tasks.teacher_id','=', 1)
//            ->get();

        $taskmarks = DB::table('task_marks')
            ->join('tasks', 'tasks.id', '=', 'task_marks.task_id')
            ->join('teachers', 'teachers.id', '=', 'tasks.teacher_id')
            ->join('classroom_subjects', 'classroom_subjects.id', '=', 'tasks.classroom_subject_id')
            ->join('classrooms', 'classrooms.id', '=', 'classroom_subjects.classroom_id')
            ->join('subjects', 'subjects.id', '=', 'classroom_subjects.subject_id')
            ->where('tasks.teacher_id','=', 1)
            ->select('task_marks.*', 'tasks.*', 'classroom_subjects.*','teachers.*','classrooms.*','subjects.*')
            ->get();

//        $classroomsubject_id = $taskmarks->classroom_subject_id;
//        $classroomsubjects = ClassroomSubject::find($classroomsubject_id)->with('subject')->with('classroom');


        return view('guru.tugasan.markah_tugasan.senarai_markah_tugasan',compact('taskmarks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('post')) {

            //dd($request->all());
          foreach( $request->student_id as $index => $val ) {
            $input = new TaskMark;
            $input->teacher_id = $request->input('teacher_id');
            $input->task_id = $request->input('task_id');
            $input->student_id = $val;
            $input->mark = $request->mark[$index];

            $input->save();
          }
        }

        $id = $request->input('task_id');

        $task = Task::find($id);
        $task->status        = 'sudah';

        $task->save();

        return redirect('taskmark');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $taskmarks = TaskMark::where('task_id',$id)->get();
        $students = DB::table('task_marks')
            ->join('students', 'students.id', '=', 'task_marks.student_id')
            ->join('tasks', 'tasks.id', '=', 'task_marks.task_id')
            ->join('teachers', 'teachers.id', '=', 'tasks.teacher_id')
            ->join('classroom_subjects', 'classroom_subjects.id', '=', 'tasks.classroom_subject_id')
            ->join('classrooms', 'classrooms.id', '=', 'classroom_subjects.classroom_id')
//            ->join('classrooms', 'classrooms.id', '=', 'students.classroom_id')
            ->join('subjects', 'subjects.id', '=', 'classroom_subjects.subject_id')
            ->where('task_marks.task_id','=', $id)
//            ->select('task_marks.*', 'tasks.*', 'classroom_subjects.*','teachers.*','classrooms.*','subjects.*')
            ->get();
//        dd($taskmarks);
        return view('guru.tugasan.markah_tugasan.papar_markah_tugasan',compact('students','id'));

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
        TaskMark::destroy($id);
        return redirect('taskmark');
    }
}
