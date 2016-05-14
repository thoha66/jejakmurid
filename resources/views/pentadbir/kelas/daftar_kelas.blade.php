@extends('layouts.master')

@section('title')
    Daftar Kelas
@endsection

@section('begin_title_left')
    Daftar Kelas
@endsection

@section('begin_title_right')
    <li><i class="fa fa-book"></i>&nbsp;Daftar Kelas</li>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-9">

                <div class="panel panel-blue" style="background:#fff;">
                    <div class="panel-heading">
                        Daftar Kelas</div>
                    <div class="panel-body pan">
                        <form class="form-horizontal" method="POST" action="{!! url('classroom') !!}">
                            <div class="form-body pal">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label for="admin_id" class="col-md-3 control-label">
                                        Pendaftar</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="admin_id" type="text" placeholder="" class="form-control" name="admin_id" value="1" ></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="kod_Kelas" class="col-md-3 control-label">
                                        Kod Kelas</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="kod_Kelas" type="text" placeholder="" class="form-control" name="kod_kelas"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nama_Kelas" class="col-md-3 control-label">
                                        Nama Kelas</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="nama_Kelas" type="text" placeholder="" class="form-control" name="nama_kelas"></div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions text-right pal">
                                <button type="submit" class="btn btn-primary">
                                    Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
@stop
