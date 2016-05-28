<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Classroom;
use Auth;
use App\Admin;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classroom::with('admin')->orderBy('created_at','desc')->paginate(5);

        return view('pentadbir.kelas.senarai_kelas',['classrooms' => $classrooms]);
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

        return view('pentadbir.kelas.daftar_kelas',compact('admin_id','admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateClassroomRequest $request)
    {
        $kod_kelas = $request->input('kod_kelas');
        $classroom_kod_kelas = Classroom::where('kod_kelas',$kod_kelas)->first();

        $nama_kelas = $request->input('nama_kelas');
        $classroom_nama_kelas = Classroom::where('nama_kelas',$nama_kelas)->first();

        if ($classroom_kod_kelas != null){

            Session::flash('flash_message_danger','Kod kelas yang sedang didaftar telah ada dalam sistem.');
            return Redirect::back();
        }
        elseif($classroom_nama_kelas != null){

            Session::flash('flash_message_danger','Nama kelas yang sedang didaftar telah ada dalam sistem.');
            return Redirect::back();
        }
        else
        {
            $classroom = new Classroom;

            $classroom->admin_id = $request->input('admin_id');
            $classroom->kod_kelas = $request->input('kod_kelas');
            $classroom->nama_kelas = $request->input('nama_kelas');

            $classroom->save();
            Session::flash('flash_message','Kelas berjaya didaftarkan.');

        }
        return redirect('classroom');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classroom = Classroom::findOrFail($id);
        return view('pentadbir.kelas.papar_kelas',['classroom' => $classroom]);
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
        $admin = Admin::with('user')->where('user_id',$user_id)->first();
        $admin_id = $admin->id;

        $classroom = Classroom::findOrFail($id);
        return view('pentadbir.kelas.sunting_kelas', compact('admin_id','classroom'));
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
        $nama_kelas = $request->input('nama_kelas');
        $classroom_nama_kelas = Classroom::where('nama_kelas',$nama_kelas)->first();

       // dd($classroom_nama_kelas);
        if($classroom_nama_kelas == null){
            $id2 = null;
        }
        else{
            $id2 = $classroom_nama_kelas->id;
        }

        if($id2 == $id){

            $classroom = classroom::find($id);

            $classroom->admin_id = $request->input('admin_id');
//            $classroom->kod_kelas = $request->input('kod_kelas');
            $classroom->nama_kelas = $request->input('nama_kelas');

            $classroom->save();
            Session::flash('flash_message','Maklumat kelas berjaya dikemaskini..');

            return redirect('classroom');
        }

        elseif ($id2 == null){

            $classroom = classroom::find($id);

            $classroom->admin_id = $request->input('admin_id');
//            $classroom->kod_kelas = $request->input('kod_kelas');
            $classroom->nama_kelas = $request->input('nama_kelas');

            $classroom->save();
            Session::flash('flash_message','Maklumat kelas berjaya dikemaskini..');

            return redirect('classroom');
        }

        else{
            Session::flash('flash_message_danger','Nama kelas yang sedang didaftar telah ada dalam sistem.');
            return Redirect::back();
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Classroom::destroy($id);
        return redirect('classroom');
    }
}
