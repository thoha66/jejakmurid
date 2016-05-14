<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Task;
use App\ClassroomSubject;
use App\Classroom;
use DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('teacher_id',1)->where('status','belum')->with('teacher')->orderBy('created_at','desc')->paginate(2);
//        $tasks = Task::with('classroomsubject2')->with('classroom')->with('students')->orderBy('created_at','desc')->paginate(2);
//        $tasks = Task::with('classroomsubject2')->with('classroom')->with('students')->orderBy('created_at','desc')->paginate(2);

        return view('guru.tugasan.senarai_tugasan',['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.tugasan.beri_tugasan');
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
        $task = Task::findOrFail($id);
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
        $task = Task::find($id);
        return view('guru.tugasan.sunting_tugasan',['task' => $task]);
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
