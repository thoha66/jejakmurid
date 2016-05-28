<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Subject;
use Auth;
use App\Admin;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::with('admin')->orderBy('created_at','desc')->paginate(5);

        return view('pentadbir.subjek.senarai_subjek',['subjects' => $subjects]);
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

        return view('pentadbir.subjek.daftar_subjek',compact('admin_id','admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateSubjectRequest $request)
    {
        $kod_subjek = $request->input('kod_subjek');
        $subject_kod_subjek = Subject::where('kod_subjek',$kod_subjek)->first();

        if ($subject_kod_subjek != null){

            Session::flash('flash_message_danger','Subjek yang sedang didaftar telah ada dalam sistem.');
            return Redirect::back();
        }
        else
        {
            $subject = new Subject;

            $subject->admin_id = $request->input('admin_id');
            $subject->kod_subjek = $request->input('kod_subjek');
            $subject->nama_subjek = $request->input('nama_subjek');

            $subject->save();

            Session::flash('flash_message','Subjek berjaya didaftarkan.');

        }
        return redirect('subject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::findOrFail($id);
        return view('pentadbir.subjek.papar_subjek',['subject' => $subject]);
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

        $subject = Subject::findOrFail($id);
        return view('pentadbir.subjek.sunting_subjek',compact('subject','admin_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CreateSubjectRequest $request, $id)
    {
//        $kod_subjek = $request->input('kod_subjek');
//        $subject_kod_subjek = Subject::where('kod_subjek',$kod_subjek)->first();
//
//        if ($subject_kod_subjek != null){
//
//            Session::flash('flash_message_danger','Kod subjek yang sedang didaftar telah ada dalam sistem.');
//            return Redirect::back();
//        }
//        else{

            $subject = Subject::find($id);
            $subject->admin_id = $request->input('admin_id');
            $subject->kod_subjek = $request->input('kod_subjek');
            $subject->nama_subjek = $request->input('nama_subjek');
            $subject->save();
            Session::flash('flash_message','Maklumat subjek berjaya dikemaskini..');

            return redirect('subject');
//        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subject::destroy($id);
        Session::flash('flash_message','Maklumat subjek berjaya dibuang.');
        return redirect('subject');
    }
}
