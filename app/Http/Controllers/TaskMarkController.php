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
use Auth;
use App\Teacher;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class TaskMarkController extends Controller
{
    public function addmark($id)
    {
        $user_id = Auth::user()->id;
        $teacher = Teacher::with('user')->where('user_id',$user_id)->first();
        $teacher_id = $teacher->id;

        $task= Task::find($id);
        $classroom_subject_id = $task->classroom_subject_id;
        $task_title = $task->tajuk_tugasan;

        $classroomsubject = ClassroomSubject::find($classroom_subject_id);
        $classroom_id = $classroomsubject->classroom_id;

        $classroom = Classroom::find($classroom_id);
        $class_name = $classroom->nama_kelas;

        $students = Student::where('classroom_id',$classroom_id)->orderBy('created_at','desc')->get();
//        $students = DB::table('students')->where('classroom_id', $classroom_id)->get();

        return view('guru.tugasan.markah_tugasan.beri_markah_tugasan',compact('class_name', 'students','task_title','id','teacher_id'));
    }

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

        $tasks = Task::where('teacher_id',$teacher_id)->where('status','sudah')->with('teacher')->orderBy('created_at','desc')->paginate(5);

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
    public function store(Requests\CreateTaskMarkRequest $request)
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

        Session::flash('flash_message','Pemarkahan tugasan berjaya dimasukkan.');

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

        $at = DB::table('task_marks')->where('task_id','=', $id)->whereBetween('mark', array(90, 100))->count();
        $a = DB::table('task_marks')->where('task_id','=', $id)->whereBetween('mark', array(80, 89))->count();
        $ak = DB::table('task_marks')->where('task_id','=', $id)->whereBetween('mark', array(75, 79))->count();
        $bt = DB::table('task_marks')->where('task_id','=', $id)->whereBetween('mark', array(70, 74))->count();
        $b = DB::table('task_marks')->where('task_id','=', $id)->whereBetween('mark', array(65, 69))->count();
        $ct = DB::table('task_marks')->where('task_id','=', $id)->whereBetween('mark', array(60, 64))->count();
        $c = DB::table('task_marks')->where('task_id','=', $id)->whereBetween('mark', array(50, 59))->count();
        $d = DB::table('task_marks')->where('task_id','=', $id)->whereBetween('mark', array(45, 49))->count();
        $e = DB::table('task_marks')->where('task_id','=', $id)->whereBetween('mark', array(40, 44))->count();
        $g = DB::table('task_marks')->where('task_id','=', $id)->whereBetween('mark', array(0, 39))->count();

        $bil_pelajar_skor = [$at,$a,$ak,$bt,$b,$ct,$c,$d,$e,$g];
//        //Testing Query
//        $users = DB::table('task_marks')->whereBetween('mark', array(60, 100))->count();
//        $users2 = DB::table('task_marks')->whereBetween('mark', array(60, 100))->count();
//        $users3 = DB::table('task_marks')->whereBetween('mark', array(1, 30))->count();
//        $users4 = DB::table('task_marks')->whereBetween('mark', array(60, 100))->count();
//        $users5 = DB::table('task_marks')->whereBetween('mark', array(1, 30))->count();
//        $users6 = DB::table('task_marks')->whereBetween('mark', array(60, 100))->count();
//        $users7 = DB::table('task_marks')->whereBetween('mark', array(60, 100))->count();

//        dd($bil_pelajar_skor);
        return view('guru.tugasan.markah_tugasan.papar_markah_tugasan',compact('students','id','at','a','ak','bt','b','ct','c','d','e','g'));

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
        $teacher = Teacher::with('user')->where('user_id',$user_id)->first();
        $teacher_id = $teacher->id;

        $students = DB::table('task_marks')
            ->join('students', 'students.id', '=', 'task_marks.student_id')
            ->join('tasks', 'tasks.id', '=', 'task_marks.task_id')
            ->join('teachers', 'teachers.id', '=', 'tasks.teacher_id')
            ->join('classroom_subjects', 'classroom_subjects.id', '=', 'tasks.classroom_subject_id')
            ->join('classrooms', 'classrooms.id', '=', 'classroom_subjects.classroom_id')
            ->join('subjects', 'subjects.id', '=', 'classroom_subjects.subject_id')
            ->where('task_marks.task_id','=', $id)
            ->select('task_marks.id','task_marks.student_id','task_marks.mark', 'tasks.tajuk_tugasan','classrooms.nama_kelas','students.no_kp_pelajar','students.nama_pelajar')
//            ->select('task_marks.id', 'tasks.*', 'classroom_subjects.*','students.id','students.no_kp_pelajar','students.nama_pelajar')
            ->get();

        return view('guru.tugasan.markah_tugasan.sunting_markah_tugasan',compact('students','id','teacher_id'));

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
//        dd($request);
        foreach( $request->id as $index => $val ) {

            $input = TaskMark::find($val);
            $input->teacher_id = $request->input('teacher_id');
            $input->task_id = $request->input('task_id');
            $input->student_id = $request->student_id[$index];
            $input->mark = $request->mark[$index];

            $input->save();

            Session::flash('flash_message','Pemarkahan tugasan berjaya dikemaskini.');
        }
        return redirect('taskmark');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $TaskMarks = TaskMark::where('task_id','=',$id)->get();

        foreach ($TaskMarks as $TaskMark){
            $TaskMark = $TaskMark->id;
            TaskMark::destroy($TaskMark);
        }

        Task::destroy($id);
        Session::flash('flash_message','Pemarkahan tugasan berjaya dibuang.');
        return redirect('taskmark');
    }
}
