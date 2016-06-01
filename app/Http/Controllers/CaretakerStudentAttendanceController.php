<?php

namespace App\Http\Controllers;

use App\StudentAttendance;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Caretaker;
use App\Student;
use App\StudentOffense;
use DB;

class CaretakerStudentAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pelajar(Request $request){

        $student_id = $request->input('student_id');
        $nama_pelajar1 = Student::where('id',$student_id)->first();
        $nama_pelajar = $nama_pelajar1->nama_pelajar;

        //$StudentOffenses = StudentOffense::where('student_id',$student_id)->with('student')->orderBy('tarikh_kesalahan','desc')->paginate(5);
        $StudentAttendances = StudentAttendance::where('student_id',$student_id)->with('attendance')->orderBy('created_at','desc')->paginate(5);

//        dd($student_id);

        $hadir = 'hadir';
        $tidak_hadir = 'tidak hadir';

        $total_hadir = DB::table('student_attendances')
//            ->join('attendances', 'attendances.id', '=', 'student_attendances.attendance_id')
            ->where('student_attendances.student_id','=', $student_id)
            ->where('student_attendances.kedatangan','=', $hadir)
            ->select('student_attendances.kedatangan')
            ->count();
        $total_x_hadir = DB::table('student_attendances')
            ->where('student_attendances.student_id','=', $student_id)
            ->where('student_attendances.kedatangan','=', $tidak_hadir)
            ->select('student_attendances.kedatangan')
            ->count();

        $total_hadir    = (int)$total_hadir;
        $total_x_hadir  = (int)$total_x_hadir;
//        dd($total_x_hadir);

        return view('ibubapa.kedatangan.senarai_kedatangan_pelajar',compact('nama_pelajar','StudentAttendances','total_hadir','total_x_hadir'));
    }

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
        $Caretaker = Caretaker::with('user')->where('user_id',$user_id)->first();
        $Caretaker_id = $Caretaker->id;

        $students = Student::where('caretaker_id',$Caretaker_id)->with('user')->get();

        return view('ibubapa.kedatangan.cari_pelajar',compact('students'));
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
