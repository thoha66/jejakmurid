<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminProfileController extends Controller
{
    public function edit()
    {
        $user_id = Auth::user()->id;
        $admin_user_id = Admin::with('user')->where('user_id',$user_id)->first();
        $admin_id = $admin_user_id->id;

        $admin = Admin::with('user')->find($admin_id)->first();
        return view('pentadbir.kemaskini_profil',compact('admin'));
    }

    public function update(Requests\CreateAdminProfileUpdateRequest $request, $id)
    {
        $admin = Admin::find($id);
        $admin_user_id = $admin->user_id;

        $admin->no_kp_admin           = $request->input('no_kp_admin');
        $admin->nama_admin            = $request->input('nama_admin');
        $admin->no_tel_admin          = $request->input('no_tel_admin');
        $admin->no_hp_admin           = $request->input('no_hp_admin');
        $admin->tarikh_lahir_admin    = $request->input('tarikh_lahir_admin');
        $admin->alamat_admin          = $request->input('alamat_admin');
        $admin->poskod_admin          = $request->input('poskod_admin');
        $admin->email_admin           = $request->input('email_admin');
        $admin->jantina_admin         = $request->input('jantina_admin');
        $admin->save();

        $user = User::find($admin_user_id);

        $user->name                     = $request->input('nama_admin');
        $user->email                    = $request->input('email_admin');
        $user->save();

        Session::flash('flash_message','Maklumat pentadbir berjaya dikemaskini.');
        return Redirect::back();
    }

    public function password()
    {
        $user_id = Auth::user()->id;
        $admin_user_id = Admin::with('user')->where('user_id',$user_id)->first();
        $admin_id = $admin_user_id->id;

        $admin = Admin::find($admin_id);
        return view('pentadbir.kemaskini_katalaluan',compact('admin'));
    }

    public function updatepassword(Request $request)
    {
        $user_id = Auth::user()->id;
        $admin_user_id = Admin::with('user')->where('user_id',$user_id)->first();
        $admin_id = $admin_user_id->id;

        $admin = Admin::find($admin_id);
        $admin_user_id = $admin->user_id;

        $user = User::find($admin_user_id);

        $user->password                 = bcrypt($request->input('password'));
        $user->save();
        Session::flash('flash_message','Maklumat katalaluan berjaya dikemaskini.');
        return Redirect::back();
    }
}
