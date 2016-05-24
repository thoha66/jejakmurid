<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Student;
use App\Classroom;
use Auth;
use App\Admin;
use App\User;
use App\Caretaker;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('admin')->orderBy('created_at','desc')->paginate(2);

        return view('pentadbir.pelajar.senarai_pelajar',['students' => $students]);
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

        $classrooms = Classroom::all();
        return view('pentadbir.pelajar.daftar_pelajar',compact('classrooms','admin_id'));
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
            $user = new User;
            $emailstudent = $request->input('no_kp_pelajar');

            $user->name = $emailstudent;
            $user->email = $emailstudent.'@pelajar.jejakmurid.com';
            $user->user_group = 5;
            $user->user_group_description = 'PELAJAR';
            $user->password = bcrypt($emailstudent);

            $user->save();
//            dd($user);
            $no_kp_penjaga = $request->input('no_kp_penjaga_pelajar');
            $caretaker = Caretaker::with('user')->where('no_kp_penjaga',$no_kp_penjaga)->first();
            if($caretaker != null){

                $student = new Student;

                $student->user_id = $user->id;
                $student->admin_id = $request->input('admin_id');
                $student->caretaker_id = $caretaker->id;
                $student->classroom_id = $request->input('classroom_id');
                $student->no_surat_beranak_pelajar = $request->input('no_surat_beranak_pelajar');
                $student->no_kp_pelajar = $request->input('no_kp_pelajar');
                $student->tingkatan_pelajar = $request->input('tingkatan_pelajar');
                $student->no_kp_penjaga_pelajar = $request->input('no_kp_penjaga_pelajar');

                $student->save();

            }
            else{
                $userperent = new User;
                $emailperent = $request->input('no_kp_penjaga_pelajar');

                $userperent->name = $emailperent;
                $userperent->email = $emailperent.'@penjaga.jejakmurid.com';
                $userperent->user_group = 6;
                $userperent->user_group_description = 'PENJAGA';
                $userperent->password = bcrypt($emailperent);

                $userperent->save();

                $caretaker = new Caretaker;
                $caretaker->user_id = $userperent->id;
                $caretaker->no_kp_penjaga = $request->input('no_kp_penjaga_pelajar');

                $caretaker->save();

                $student = new Student;

                $student->user_id = $user->id;
                $student->admin_id = $request->input('admin_id');
                $student->caretaker_id = $caretaker->id;
                $student->classroom_id = $request->input('classroom_id');
                $student->no_surat_beranak_pelajar = $request->input('no_surat_beranak_pelajar');
                $student->no_kp_pelajar = $request->input('no_kp_pelajar');
                $student->tingkatan_pelajar = $request->input('tingkatan_pelajar');
                $student->no_kp_penjaga_pelajar = $request->input('no_kp_penjaga_pelajar');

                $student->save();
            }


        }

        return redirect('student');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$student = Student::findOrFail($id);
        $student = Student::with('classroom')->find($id);
        return view('pentadbir.pelajar.papar_pelajar',compact('student'));
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
        $classrooms = Classroom::all();
        $student = Student::with('parent')->find($id);
        return view('pentadbir.pelajar.sunting_pelajar',compact('classrooms','student','user_id'));
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
        $student = Student::find($id);
        $student_user_id = $student->user_id;
        
        $student->admin_id = $request->input('admin_id');
        $student->caretaker_id = $request->input('caretaker_id');
        $student->classroom_id = $request->input('classroom_id');

        $student->no_surat_beranak_pelajar = $request->input('no_surat_beranak_pelajar');
        $student->no_kp_pelajar = $request->input('no_kp_pelajar');
        $student->nama_pelajar = $request->input('nama_pelajar');

        $student->tingkatan_pelajar = $request->input('tingkatan_pelajar');
        $student->no_kp_penjaga_pelajar = $request->input('no_kp_penjaga_pelajar');
        $student->tarikh_lahir_pelajar = $request->input('tarikh_lahir_pelajar');
        $student->alamat_pelajar = $request->input('alamat_pelajar');
        $student->poskod_pelajar = $request->input('poskod_pelajar');
        $student->email_pelajar = $request->input('email_pelajar');
        $student->umur_pelajar = $request->input('umur_pelajar');
        $student->jantina_pelajar = $request->input('jantina_pelajar');

        $student->save();

        $caretaker = Caretaker::find($request->input('caretaker_id'));
        $caretaker->no_kp_penjaga = $request->input('no_kp_penjaga_pelajar');
        $user_id_with_care_taker = $caretaker->user_id;
        $caretaker->save();

        //Update Parent in table user
        $user_caretaker = User::find($user_id_with_care_taker);
        $emailperent = $request->input('no_kp_penjaga_pelajar');

        $user_caretaker->name = $emailperent;
        $user_caretaker->email = $emailperent.'@penjaga.com';
        $user_caretaker->user_group = 6;
        $user_caretaker->user_group_description = 'PENJAGA';
        $user_caretaker->password = bcrypt($emailperent);

        $user_caretaker->save();

        $kp_pelajar = $request->input('no_kp_pelajar');
        $user = User::find($student_user_id);
        $user->name = $request->input('no_kp_pelajar');
        $user->email = $kp_pelajar.'@pelajar.com';
        $user->user_group = 5;
        $user->user_group_description = 'PELAJAR';
        $user->password = bcrypt($request->input('no_kp_pelajar'));
        $user->save();

        return redirect('student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);

        Student::destroy($id);
        User::destroy($student->user_id);
        return redirect('student');
    }
}
