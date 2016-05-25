<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Exam;
use DB;

class StudentExamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('pelajar.peperiksaan.cari_sesi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $student = Student::with('user')->where('user_id',$user_id)->first();
        $student_id = $student->id;

        $sesi_peperiksaan = $request->input('sesi_peperiksaan');

        $exams = Exam::all();

        return view('pelajar.peperiksaan.senarai_peperiksaan_pelajar',compact('exams','student_id','sesi_peperiksaan'));
    }

    public function DetailsExam(Request $request){

        $id                 = $request->input('id');
        $student_id         = $request->input('student_id');
        $nama_peperiksaan   = $request->input('nama_peperiksaan');
        $sesi_peperiksaan   = $request->input('sesi_peperiksaan');

        $student = Student::where('id',$student_id)->with('classroom')->first();
//        dd($student);

        $ClassSubjectExams = DB::table('exam_marks')
            ->join('class_subject_exams', 'class_subject_exams.id', '=', 'exam_marks.class_subject_exam_id')
            ->join('exams', 'exams.id', '=', 'class_subject_exams.exam_id')
            ->join('subjects', 'subjects.id', '=', 'exam_marks.subject_id')
            ->where('exam_marks.student_id','=', $student_id)
            ->where('class_subject_exams.sesi_peperiksaan','=', $sesi_peperiksaan)
            ->where('exams.id','=', $id)
            ->select('exam_marks.*','exams.*','subjects.*')
            ->get();
//        dd($ClassSubjectExams);

        return view('ibubapa.peperiksaan.senarai_markah_induvidu_peperiksaan_pelajar',compact('nama_peperiksaan','sesi_peperiksaan','ClassSubjectExams','student'));

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
