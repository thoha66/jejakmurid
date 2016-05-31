<?php

namespace App\Http\Controllers;

use App\Caretaker;
use App\News;
use App\Student;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Admin;
use App\Teacher;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers   = Teacher::all()->count();
        $students   = Student::all()->count();
        $caretakers = Caretaker::all()->count();
        $news       = News::all()->count();

        return view('pentadbir.laman_utama_pentadbir',compact('teachers','students','caretakers','news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $user_id = Auth::user()->id;
//        $admin = Admin::with('admin')->where('user_id',$user_id);
//        $admin_id = $admin->id;
//        dd($admin_id);
//       // return view('pentadbir.buat_pengumuman',compact('admin_id'));
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
            $input = $request->all();
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
        //
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
