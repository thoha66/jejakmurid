<?php

namespace App\Http\Controllers;

use App\ClassSubjectExam;
use App\ExamMark;
use App\Student;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Auth;
use App\Teacher;
use App\Exam;
use App\ClassroomSubject;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ClassSubjectExamController extends Controller
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

        $ClassSubjectExams = DB::table('class_subject_exams')
            ->join('exams', 'exams.id', '=', 'class_subject_exams.exam_id')
            ->join('classroom_subjects', 'classroom_subjects.id', '=', 'class_subject_exams.classroom_subject_id')
            ->join('classrooms', 'classrooms.id', '=', 'classroom_subjects.classroom_id')
            ->join('subjects', 'subjects.id', '=', 'classroom_subjects.subject_id')
            ->where('class_subject_exams.teacher_id','=', $teacher_id)
            ->select('exams.nama_peperiksaan','class_subject_exams.id','class_subject_exams.sesi_peperiksaan','classrooms.nama_kelas','subjects.nama_subjek')
            ->get();

//        $ClassSubjectExams = ClassSubjectExam::where('teacher_id',$teacher_id)->with('subject')->get();
        return view('guru.peperiksaan.senarai_markah_peperiksaan_pelajar',compact('ClassSubjectExams'));
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
        $teacher_id = $teacher->id;

        $classroomsubjects = ClassroomSubject::with('classroom')->with('subject')->with('teacher')->where('teacher_id',$teacher_id)->get();

        $exams = Exam::all();
        return view('guru.peperiksaan.beri_markah_peperiksaan',compact('exams','classroomsubjects','teacher_id'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ClassSubjectExam = ClassSubjectExam::where('classroom_subject_id',$request->input('classroom_subject_id'))
            ->where('exam_id',$request->input('exam_id'))
            ->where('sesi_peperiksaan',$request->input('sesi_peperiksaan'))
            ->first();

        if( $ClassSubjectExam != NULL){

            Session::flash('flash_message_danger','Markah peperiksaan yang ingin dimasukkan telah ada dalam sistem.');

            return Redirect::back();
        }
        else{

            $exam_id                = $request->input('exam_id');
            $teacher_id             = $request->input('teacher_id');
            $classroom_subject_id   = $request->input('classroom_subject_id');
            $sesi_peperiksaan       = $request->input('sesi_peperiksaan');

            $NamaExam = Exam::find($exam_id);
            $NamaExam = $NamaExam->nama_peperiksaan;

            $ClassroomSubject = ClassroomSubject::where('id',$classroom_subject_id)->with('subject')->first();

            $students = Student::where('classroom_id',$ClassroomSubject->classroom_id)->with('classroom')->get();


            return view('guru.peperiksaan.beri_markah_peperiksaan_pelajar',compact('exam_id','teacher_id','classroom_subject_id','sesi_peperiksaan','NamaExam','ClassroomSubject','students'));

        }
    }

    public function store2(Request $request)
    {
//        dd($request);

        $ClassSubjectExam = new ClassSubjectExam();
        $ClassSubjectExam->exam_id = $request->input('exam_id');
        $ClassSubjectExam->teacher_id = $request->input('teacher_id');
        $ClassSubjectExam->classroom_subject_id = $request->input('classroom_subject_id');
        $ClassSubjectExam->sesi_peperiksaan = $request->input('sesi_peperiksaan');
        $ClassSubjectExam->save();


        foreach( $request->student_id as $index => $val ) {
            $input = new ExamMark();
            $input->class_subject_exam_id = $ClassSubjectExam->id;
            $input->subject_id = $request->input('subject_id');
            $input->student_id = $val;
            $input->markah_peperiksaan = $request->markah_peperiksaan[$index];

            $input->save();

            Session::flash('flash_message','Markah peperiksaan berjaya dimasukkan.');
        }

        return redirect('classsubjectexam');
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
//        $nama_peperiksaan = $request->input('nama_peperiksaan');
//        $nama_kelas = $request->input('nama_kelas');
//        $nama_subjek = $request->input('nama_subjek');
//        $sesi_peperiksaan = $request->input('sesi_peperiksaan');

        $ClassSubjectExams = DB::table('exam_marks')
            ->join('class_subject_exams', 'class_subject_exams.id', '=', 'exam_marks.class_subject_exam_id')
            ->join('exams', 'exams.id', '=', 'class_subject_exams.exam_id')
            ->join('students', 'students.id', '=', 'exam_marks.student_id')
            ->join('subjects', 'subjects.id', '=', 'exam_marks.subject_id')
            ->join('classroom_subjects', 'classroom_subjects.id', '=', 'class_subject_exams.classroom_subject_id')
            ->join('classrooms', 'classrooms.id', '=', 'classroom_subjects.classroom_id')
//            ->join('subjects', 'subjects.id', '=', 'classroom_subjects.subject_id')
            ->where('exam_marks.class_subject_exam_id','=', $id)
           // ->select('exam_marks','class_subject_exams','students.no_kp_pelajar','subjects')
            ->select('exam_marks.id','exam_marks.markah_peperiksaan','classrooms.nama_kelas','subjects.nama_subjek','class_subject_exams.sesi_peperiksaan','students.no_kp_pelajar','students.nama_pelajar','exams.nama_peperiksaan')
            ->get();

        return view('guru.peperiksaan.sunting_markah_peperiksaan_pelajar',compact('nama_peperiksaan','nama_kelas','nama_subjek','sesi_peperiksaan','ClassSubjectExams','id'));
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

            $input = ExamMark::find($val);
            $input->markah_peperiksaan = $request->markah_peperiksaan[$index];
            $input->save();
        }

        Session::flash('flash_message','Markah peperiksaan berjaya dikemaskini.');

        return redirect('classsubjectexam');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ClassSubjectExam::destroy($id);
        Session::flash('flash_message','Maklumat markah peperiksaan berjaya dibuang.');
        return redirect('classsubjectexam');
    }
}
