<?php

namespace App\Http\Controllers;

use App\Caretaker;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CaretakerController extends Controller
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
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user_id = Auth::user()->id;
        $caretaker_user_id = Caretaker::with('user')->where('user_id',$user_id)->first();
        $caretaker_id = $caretaker_user_id->id;

        $caretaker = Caretaker::find($caretaker_id);
        return view('ibubapa.kemaskini_profil',compact('caretaker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CreateProfileUpdateRequest $request, $id)
    {
        $caretaker = Caretaker::find($id);
        $caretaker_user_id = $caretaker->user_id;

        $caretaker->no_kp_penjaga       = $request->input('no_kp_penjaga');
        $caretaker->nama_penjaga        = $request->input('nama_penjaga');
        $caretaker->alamat_penjaga      = $request->input('alamat_penjaga');
        $caretaker->poskod_penjaga      = $request->input('poskod_penjaga');
        $caretaker->no_tel_penjaga      = $request->input('no_tel_penjaga');
        $caretaker->email_penjaga       = $request->input('email_penjaga');
        $caretaker->save();

        $user = User::find($caretaker_user_id);

        $user->name                     = $request->input('nama_penjaga');
        $user->email                    = $request->input('email_penjaga');
//        $user->user_group               = $request->input('jenis_guru');
//        $user->user_group_description   = $request->input('jenis_guru');
        $user->password                 = bcrypt($request->input('password'));
        $user->save();

        Session::flash('flash_message','Maklumat penjaga berjaya dikemaskini.');
        return Redirect::back();
    }

    public function password()
    {
        $user_id = Auth::user()->id;
        $caretaker_user_id = Caretaker::with('user')->where('user_id',$user_id)->first();
        $caretaker_id = $caretaker_user_id->id;

        $caretaker = Caretaker::find($caretaker_id);
        return view('ibubapa.kemaskini_katalaluan',compact('caretaker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatepassword(Request $request)
    {
        $user_id = Auth::user()->id;
        $caretaker_user_id = Caretaker::with('user')->where('user_id',$user_id)->first();
        $caretaker_id = $caretaker_user_id->id;

        $caretaker = Caretaker::find($caretaker_id);
        $caretaker_user_id = $caretaker->user_id;

        $user = User::find($caretaker_user_id);

        $user->password                 = bcrypt($request->input('password'));
        $user->save();
        Session::flash('flash_message','Maklumat katalaluan berjaya dikemaskini.');
        return Redirect::back();
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
