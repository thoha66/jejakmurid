<?php

namespace App\Http\Controllers;

use App\StudentOffense;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Caretaker;
use App\Student;
use Auth;
use DB;

class CaretakerStudentDisciplineController extends Controller
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

        $StudentOffenses = StudentOffense::where('student_id',$student_id)->with('student')->orderBy('tarikh_kesalahan','desc')->paginate(5);

        $total_penalty = DB::table('student_offenses')
            ->join('offenses', 'offenses.id', '=', 'student_offenses.offense_id')
            ->where('student_offenses.student_id','=', $student_id)
            ->select('offenses.bilangan_mata_kesalahan')
            ->sum('bilangan_mata_kesalahan');

        $total_penalty = (int)$total_penalty;
//        dd($total_penalty);

        return view('ibubapa.disiplin.senarai_masalah_disiplin_pelajar',compact('StudentOffenses','nama_pelajar','total_penalty'));
    }

    public function index()
    {

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

        return view('ibubapa.disiplin.cari_pelajar',compact('students'));
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
        $StudentOffense_one = StudentOffense::with('offense')->with('student')->with('teacher')->find($id);

        return view('ibubapa.disiplin.papar_kesalahan_pelajar',compact('StudentOffense_one'));
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
