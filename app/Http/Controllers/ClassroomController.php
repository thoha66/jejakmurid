<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Classroom;
use Auth;
use App\Admin;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classroom::with('admin')->orderBy('created_at','desc')->paginate(2);

        return view('pentadbir.kelas.senarai_kelas',['classrooms' => $classrooms]);
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

        return view('pentadbir.kelas.daftar_kelas',compact('admin_id','admin'));
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
            $classroom = new Classroom;

            $classroom->admin_id = $request->input('admin_id');
            $classroom->kod_kelas = $request->input('kod_kelas');
            $classroom->nama_kelas = $request->input('nama_kelas');

            $classroom->save();
        }
        return redirect('classroom');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classroom = Classroom::findOrFail($id);
        return view('pentadbir.kelas.papar_kelas',['classroom' => $classroom]);
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

        $classroom = Classroom::findOrFail($id);
        return view('pentadbir.kelas.sunting_kelas', compact('admin_id','classroom'));
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
        $classroom = classroom::find($id);

        $classroom->admin_id = $request->input('admin_id');
        $classroom->kod_kelas = $request->input('kod_kelas');
        $classroom->nama_kelas = $request->input('nama_kelas');

        $classroom->save();

        return redirect('classroom');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Classroom::destroy($id);
        return redirect('classroom');
    }
}
