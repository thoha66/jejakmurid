<?php

namespace App\Http\Controllers;

use App\ClassroomSubject;
use App\News;
use App\Student;
use App\Task;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Teacher;
use App\Classroom;
use DB;
use Auth;
use App\Admin;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laman_utama(){



        $user_id = Auth::user()->id;
        $teacher = Teacher::with('user')->where('user_id',$user_id)->first();
        $teacher_id = $teacher->id;

        $bil_classroom = ClassroomSubject::where('teacher_id',$teacher_id)->count();
        $classrooms = ClassroomSubject::where('teacher_id',$teacher_id)->get();
//        dd($classrooms);

        $total=0;
        foreach ( $classrooms as $classroom){
            $bil_student = Student::where('classroom_id',$classroom->classroom_id)->count();
            $total = $total + $bil_student;
        }

        $news       = News::all()->count();

        $tasks = Task::where('teacher_id',$teacher_id)->count();

        return view('guru.laman_utama_guru',compact('news','bil_classroom','tasks','total'));

    }
    public function index()
    {
        $teachers = Teacher::with('admin')->orderBy('created_at','desc')->paginate(5);

        return view('pentadbir.guru.senarai_guru',['teachers' => $teachers]);
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
        return view('pentadbir.guru.daftar_guru',compact('classrooms','admin_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateTeacherRequest $request)
    {
        $no_kp_guru = $request->input('no_kp_guru');
        $teacher = Teacher::with('user')->where('no_kp_guru',$no_kp_guru)->first();

        $email_guru = $request->input('email_guru');
        $teacher_email = Teacher::with('user')->where('email_guru',$email_guru)->first();

        if($teacher != null){

            Session::flash('flash_message_danger','Guru yang sedang didaftar telah ada dalam sistem.');

//            return redirect(action('TeacherController@create'));
//            return redirect('teacher/create');
            //return view('pentadbir.guru.daftar_guru');
//            return Redirect::back()->withErrors($validator);
//            return Redirect::back();
            return Redirect::back();

        }
        elseif ($teacher_email != null){

            Session::flash('flash_message_danger','Email guru yang sedang didaftar telah ada dalam sistem.');

            return Redirect::back();

        }
        else{
            $user = new User;

            $user->name = $request->input('email_guru');
            $user->email = $request->input('email_guru');
            $user->user_group = $request->input('jenis_guru');
            $user->user_group_description = $request->input('jenis_guru');
            $user->password = bcrypt($request->input('no_kp_guru'));

            $user->save();

            $teacher = new Teacher;

            $teacher->admin_id = $request->input('admin_id');
            $teacher->user_id = $user->id;
            $teacher->no_kp_guru = $request->input('no_kp_guru');
            $teacher->email_guru = $request->input('email_guru');
            $teacher->jenis_guru = $request->input('jenis_guru');

            $teacher->guru_kelas_id = $request->input('guru_kelas_id');
//            $teacher->nama = $request->input('nama');
//            $teacher->no_tel = $request->input('no_tel');
//
//            $teacher->no_hp = $request->input('no_hp');
//            $teacher->tarikh_lahir = $request->input('tarikh_lahir');
//            $teacher->alamat = $request->input('alamat');
//            $teacher->poskod = $request->input('poskod');
//            $teacher->email = $request->input('email');
//            $teacher->umur = $request->input('umur');
//            $teacher->jantina = $request->input('jantina');
            $teacher->save();
            Session::flash('flash_message','Guru berjaya didaftarkan.');

            return redirect('teacher');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::with('classroom4')->find($id);
//        $teacher = DB::table('teachers')
//            ->join('classrooms', 'classrooms.id', '=', 'teachers.guru_kelas_id')
//            ->where('teachers.guru_kelas_id','=', $id)
//            ->get();
        return view('pentadbir.guru.papar_guru',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classrooms = Classroom::all();
        $teacher = Teacher::find($id);
        return view('pentadbir.guru.sunting_guru',compact('classrooms','teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CreateTeacherRequest $request, $id)
    {


        $teacher = Teacher::find($id);
        $teacher_user_id = $teacher->user_id;
//        dd($teacher_user_id);



        $teacher->no_kp_guru = $request->input('no_kp_guru');
        $teacher->email_guru = $request->input('email_guru');
        $teacher->jenis_guru = $request->input('jenis_guru');
        $teacher->guru_kelas_id = $request->input('guru_kelas_id');

//        $teacher->nama_guru = $request->input('nama_guru');
//        $teacher->no_tel_guru = $request->input('no_tel_guru');
//        $teacher->no_hp_guru = $request->input('no_hp_guru');
//        $teacher->tarikh_lahir_guru = $request->input('tarikh_lahir_guru');
//        $teacher->alamat_guru = $request->input('alamat_guru');
//        $teacher->poskod_guru = $request->input('poskod_guru');
//        $teacher->email_guru = $request->input('email_guru');
//        $teacher->umur_guru = $request->input('umur_guru');
//        $teacher->jantina_guru = $request->input('jantina_guru');

        $teacher->save();

        $user = User::find($teacher_user_id);
//        dd($user->id);
        
        $user->name = $request->input('email_guru');
        $user->email = $request->input('email_guru');
        $user->user_group = $request->input('jenis_guru');
        $user->user_group_description = $request->input('jenis_guru');
        $user->password = bcrypt($request->input('no_kp_guru'));
        $user->save();

        Session::flash('flash_message','Maklumat guru berjaya dikemaskini..');

        return redirect('teacher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);

        Teacher::destroy($id);
        User::destroy($teacher->user_id);
        Session::flash('flash_message','Maklumat guru berjaya dibuang.');
        return redirect('teacher');
    }
}
