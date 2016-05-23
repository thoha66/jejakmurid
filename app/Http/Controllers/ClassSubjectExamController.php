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
            ->where('classroom_subject_id',$request->input('classroom_subject_id'))
            ->where('sesi_peperiksaan',$request->input('sesi_peperiksaan'))
            ->first();

        if( $ClassSubjectExam != NULL){
            return 'Duplicate';
        }
        else{

            $exam_id                = $request->input('exam_id');
            $teacher_id             = $request->input('teacher_id');
            $classroom_subject_id   = $request->input('classroom_subject_id');
            $sesi_peperiksaan       = $request->input('sesi_peperiksaan');

            $ClassroomSubject = ClassroomSubject::where('id',$classroom_subject_id)->with('subject')->first();

            $students = Student::where('classroom_id',$ClassroomSubject->classroom_id)->with('classroom')->get();


            return view('guru.peperiksaan.beri_markah_peperiksaan_pelajar',compact('exam_id','teacher_id','classroom_subject_id','sesi_peperiksaan','ClassroomSubject','students'));

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
        ClassSubjectExam::destroy($id);

        return redirect('classsubjectexam');
    }
}
