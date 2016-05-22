<?php

namespace App\Http\Controllers;

use App\Offense;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Teacher;
use App\Student;
use App\StudentOffense;

class StudentOffenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $StudentOffenses = StudentOffense::with('offense')->with('student')->with('teacher')->orderBy('created_at','desc')->paginate(2);

        return view('guru.disiplin.senarai_kesalahan_pelajar',compact('StudentOffenses'));
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
        $students = Student::all();
        $offenses = Offense::all();
        return view('guru.disiplin.daftar_kesalahan_pelajar',compact('teacher','students','offenses'));
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

            $StudentOffense = new StudentOffense;

            $StudentOffense->teacher_id = $request->input('teacher_id');
            $StudentOffense->student_id = $request->input('student_id');
            $StudentOffense->offense_id = $request->input('offense_id');
            $StudentOffense->tarikh_kesalahan = $request->input('tarikh_kesalahan');
            $StudentOffense->masa_kesalahan = $request->input('masa_kesalahan');
            $StudentOffense->tempat_kesalahan = $request->input('tempat_kesalahan');

            $StudentOffense->save();

        }
        return redirect('studentoffense');
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
        //$StudentOffenses = StudentOffense::with('offense')->with('student')->with('teacher')->get();
        $students = Student::all();
        $offenses = Offense::all();
        $StudentOffense_one = StudentOffense::with('offense')->with('student')->with('teacher')->find($id);

        return view('guru.disiplin.sunting_kesalahan_pelajar',compact('students','offenses','StudentOffense_one'));
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
        $StudentOffense = StudentOffense::find($id);

        $StudentOffense->teacher_id = $request->input('teacher_id');
        $StudentOffense->student_id = $request->input('student_id');
        $StudentOffense->offense_id = $request->input('offense_id');
        $StudentOffense->tarikh_kesalahan = $request->input('tarikh_kesalahan');
        $StudentOffense->masa_kesalahan = $request->input('masa_kesalahan');
        $StudentOffense->tempat_kesalahan = $request->input('tempat_kesalahan');

        $StudentOffense->save();

        return redirect('studentoffense');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StudentOffense::destroy($id);
        return redirect('studentoffense');
    }
}
