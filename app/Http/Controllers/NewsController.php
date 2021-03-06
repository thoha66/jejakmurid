<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use Request;
use App\Http\Requests\CreateNewCustomer;
use App\Http\Requests;
use App\News;
use App\Admin;
use DB;
use Auth;
use Illuminate\Support\Facades\Session;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $newses = News::with('admin')->orderBy('created_at','desc')->get();
        $newses = News::with('admin')->orderBy('created_at','desc')->paginate(5);
//        $newses = News::all();
//        $newses = DB::table('news')
//            ->orderBy('created_at', 'desc')
//            ->get();

        return view('pentadbir.pengumuman.senarai_pengumuman',['newses' => $newses]);
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
//        dd($admin_id);
         return view('pentadbir.pengumuman.buat_pengumuman',compact('admin_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Requests\CreateNewsRequest $request)
    {
        //News::create(Request::all());
        if($request->isMethod('post'))
        {
            $news = new News;

            $news->admin_id = $request->input('admin_id');
            $news->tajuk = $request->input('tajuk');
            $news->tarikh_mula = $request->input('tarikh_mula');

            $news->tarikh_akhir = $request->input('tarikh_akhir');
            $news->masa_mula = $request->input('masa_mula');
            $news->masa_akhir = $request->input('masa_akhir');

            $news->tempat = $request->input('tempat');
            $news->penerangan_aktiviti = $request->input('penerangan_aktiviti');
            //$news->status_baca_berita = 'BELUM BACA';

            $news->save();
            Session::flash('flash_message','Pengumuman yang  didaftar berjaya disimpan.');

        }
        return redirect('news');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('pentadbir.pengumuman.papar_pengumuman',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);

        $user_id = Auth::user()->id;
        $admin = Admin::with('user')->where('user_id',$user_id)->first();
        $admin_id = $admin->id;

        return view('pentadbir.pengumuman.sunting_pengumuman',compact('news','admin_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CreateNewsRequest $request, $id)
    {
        $news = News::find($id);

        $news->admin_id             = $request->input('admin_id');
        $news->tajuk                = $request->input('tajuk');
        $news->tarikh_mula          = $request->input('tarikh_mula');
        $news->tarikh_akhir         = $request->input('tarikh_akhir');
        $news->masa_mula            = $request->input('masa_mula');
        $news->masa_akhir           = $request->input('masa_akhir');
        $news->tempat               = $request->input('tempat');
        $news->penerangan_aktiviti  = $request->input('penerangan_aktiviti');

        $news->save();

        Session::flash('flash_message','Maklumat pengumuman berjaya dikemaskini..');

        return redirect('news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::destroy($id);
        Session::flash('flash_message','Maklumat pengumuman berjaya dibuang.');
        return redirect('news');
    }
}
