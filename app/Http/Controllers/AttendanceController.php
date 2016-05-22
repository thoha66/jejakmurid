<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Classroom;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Student;
use App\Attendance;
use App\StudentAttendance;
use Auth;
use DB;



class AttendanceController extends Controller
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

        $teacher = Teacher::with('classroom4')->where('id',$teacher_id)->first();

        return view('guru.kedatangan.pilih_tarikh_kedatangan',compact('teacher'));
    }

    public function addattendance(Request $request){
        $user_id = Auth::user()->id;
        $teacher = Teacher::with('user')->where('user_id',$user_id)->first();
        $teacher_id = $teacher->id;

        if($request->isMethod('post')) {
            $kelas_id = $request->input('guru_kelas_id');
            $tarikh = $request->input('tarikh');
            $students = Student::where('classroom_id', $kelas_id)->orderBy('created_at', 'desc')->get();
        }
        $kelasid = $request->input('guru_kelas_id');

        return view('guru.kedatangan.beri_kedatangan',compact('students','tarikh','teacher_id','kelasid'));
    }

    public function index2(){

        $user_id = Auth::user()->id;
        $teacher = Teacher::with('user')->where('user_id',$user_id)->first();
        $teacher_id = $teacher->id;

        $attendances = DB::table('attendances')
//            ->join('students', 'students.id', '=', 'attendances.student_id')
            ->join('classrooms', 'classrooms.id', '=', 'attendances.classroom_id')
            //->groupBy('attendances.tarikh','students.classroom_id')
            ->where('attendances.teacher_id','=', $teacher_id)
            ->select('attendances.*','classrooms.nama_kelas')
            ->orderBy('attendances.tarikh', 'desc')
            ->get();

        return view('guru.kedatangan.senarai_kedatangan',compact('attendances'));
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

                $attendance = new Attendance;
                $attendance->teacher_id = $request->input('teacher_id');
                $attendance->classroom_id = $request->input('classroom_id');
                $attendance->tarikh = $request->input('tarikh');
                $attendance->save();

            foreach( $request->student_id as $index => $val ) {

                $StudentAttendance = new StudentAttendance;

                $StudentAttendance->attendance_id = $attendance->id;
                $StudentAttendance->student_id = $val;
                $StudentAttendance->kedatangan = $request->kedatangan[$index];
                $StudentAttendance->save();
            }
        }

        return redirect('senarai-kedatangan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$attendance = Attendance::with('StudentAttendances')->find($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $StudentAttendances = StudentAttendance::with('student')->with('attendance')->where('attendance_id','=',$id)->get();
        return view('guru.kedatangan.sunting_kedatangan',compact('StudentAttendances','id'));
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
        if($request->isMethod('post')) {

//            $attendance = Attendance::find($id);
//            $attendance->teacher_id = $request->input('teacher_id');
//            $attendance->classroom_id = $request->input('classroom_id');
//            $attendance->tarikh = $request->input('tarikh');
//            $attendance->save();

            foreach( $request->student_id as $index => $val ) {

//                dd($val);
                //$StudentAttendance = StudentAttendance::where('student_id',$index)->first();
                //$StudentAttendance = StudentAttendance::find('student_id',$val);
                $st_id = $request->id[$index];

                $StudentAttendance = StudentAttendance::find($st_id);
                //$StudentAttendance = StudentAttendance::find('student_id','=',$val)->first();

                //$StudentAttendance->attendance_id = $attendance->id;
                $StudentAttendance->student_id = $val;
                $StudentAttendance->kedatangan = $request->kedatangan[$index];
                $StudentAttendance->save();
            }
        }

        return redirect('senarai-kedatangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Attendance::destroy($id);
        return redirect('senarai-kedatangan');
    }
}
