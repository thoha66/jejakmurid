<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Classroom;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Student;
use App\Attendance;


class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $teacher = Teacher::where('id',1)->where('guru_kelas_id',1)->with('classroom4')->first();
        $teacher = Teacher::with('classroom4')->where('guru_kelas_id',1)->find(1)->first();
        return view('guru.kedatangan.senarai_kedatangan',compact('teacher'));
    }

    public function addattendance(Request $request){

        if($request->isMethod('post')) {
            $kelas_id = $request->input('guru_kelas_id');
            $tarikh = $request->input('tarikh');
            $students = Student::where('classroom_id', $kelas_id)->orderBy('created_at', 'desc')->get();
        }
        return view('guru.kedatangan.beri_kedatangan',compact('students','tarikh'));
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

//            dd($request->all());
            foreach( $request->student_id as $index => $val ) {
                $input = new Attendance;
                $input->teacher_id = $request->input('teacher_id');
                $input->tarikh = $request->input('tarikh');
                $input->student_id = $val;
                $input->kedatangan = $request->kedatangan[$index];


                $input->save();
            }
        }

        return redirect('attendance');
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
