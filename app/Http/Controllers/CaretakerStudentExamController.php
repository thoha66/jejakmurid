<?php

namespace App\Http\Controllers;

use App\Exam;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Caretaker;
use App\Student;
use DB;

class CaretakerStudentExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'index';
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

        $students = Student::where('caretaker_id',$Caretaker_id)->get();

        return view('ibubapa.peperiksaan.cari_pelajar',compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student_id = $request->input('student_id');
        $sesi_peperiksaan = $request->input('sesi_peperiksaan');

        $exams = Exam::all();

        return view('ibubapa.peperiksaan.senarai_peperiksaan_pelajar',compact('exams','student_id','sesi_peperiksaan'));
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
            ->select('class_subject_exams.id','exam_marks.*','exams.*','subjects.*')
            ->get();
//        dd($ClassSubjectExams);
        $GroupBySubjects = DB::table('exam_marks')
            ->join('class_subject_exams', 'class_subject_exams.id', '=', 'exam_marks.class_subject_exam_id')
            ->join('exams', 'exams.id', '=', 'class_subject_exams.exam_id')
            ->join('subjects', 'subjects.id', '=', 'exam_marks.subject_id')
            ->where('exam_marks.student_id','=', $student_id)
            ->where('class_subject_exams.sesi_peperiksaan','=', $sesi_peperiksaan)
            ->where('exams.id','=', $id)
            ->groupBy('exam_marks.subject_id')
            ->get();
        //dd($GroupBySubjects);

        foreach ($GroupBySubjects as $GroupBySubject){
                $SubjectNames[] = $GroupBySubject->nama_subjek;
        }

//        dd($SubjectNames);
//        berjaya start
//        foreach ($GroupBySubjects as $GroupBySubject){
//            $SumBySubjects[] = DB::table('exam_marks')
//                ->join('class_subject_exams', 'class_subject_exams.id', '=', 'exam_marks.class_subject_exam_id')
//                ->where('exam_marks.class_subject_exam_id','=', $GroupBySubject->class_subject_exam_id)
//                ->where('exam_marks.subject_id','=', $GroupBySubject->subject_id)
//                ->sum('markah_peperiksaan');
//        }
//        dd($SumBySubjects);

//        foreach ($GroupBySubjects as $GroupBySubject){
//            $CountBySubjects[] = DB::table('exam_marks')
//                ->join('class_subject_exams', 'class_subject_exams.id', '=', 'exam_marks.class_subject_exam_id')
//                ->where('exam_marks.class_subject_exam_id','=', $GroupBySubject->class_subject_exam_id)
//                ->where('exam_marks.subject_id','=', $GroupBySubject->subject_id)
//                ->count('student_id');
//        }
       // dd($CountBySubjects);
        foreach ($GroupBySubjects as $GroupBySubject){
            $AvgBySubjects[] = DB::table('exam_marks')
                ->join('class_subject_exams', 'class_subject_exams.id', '=', 'exam_marks.class_subject_exam_id')
                ->where('exam_marks.class_subject_exam_id','=', $GroupBySubject->class_subject_exam_id)
                ->where('exam_marks.subject_id','=', $GroupBySubject->subject_id)
                ->avg('markah_peperiksaan');
        }
        //dd($AvgBySubjects);

//        berjaya end

//        foreach ($SumBySubjects as $value) {
//            $sums[] = (int) $value;
//        }
//        dd($sums);

        //dd($ClassSubjectExams);
//        foreach ($ClassSubjectExams as $ClassSubjectExam ){
//            $SumBySubjects = DB::table('exam_marks')
//                ->join('class_subject_exams', 'class_subject_exams.id', '=', 'exam_marks.class_subject_exam_id')
//                ->where('exam_marks.class_subject_exam_id','=', $student_id)
//                ->groupBy('exam_marks.subject_id')
//                ->get();
//        }

//        dd($ClassSubjectExams);



        return view('ibubapa.peperiksaan.senarai_markah_induvidu_peperiksaan_pelajar',compact('nama_peperiksaan','sesi_peperiksaan','ClassSubjectExams','student','SubjectNames','AvgBySubjects'));

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
