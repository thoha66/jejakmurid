@extends('layouts.master')

@section('title')
    Butiran Pentadbir
@endsection

@section('begin_title_left')
    Butiran Pentadbir
@endsection

@section('begin_title_right')
    <li><i class="fa fa-user "></i>&nbsp;Butiran Pentadbir</li>
@endsection

@section('content')
    <div class="row">


    <div class="col-lg-12">
        @include('includes/error')
        @include('includes/success')
        @include('includes/not_success')
        <div class="row">

            <div class="col-lg-2"></div>
            <div class="col-lg-9">
                <div class="panel panel-blue" style="background:#fff;">
                    <div class="panel-heading">
                        Butiran Pentadbir</div>
                    <div class="panel-body pan">
                        <form class="form-horizontal" action="{!! url('AdminProfile/'.$admin->id) !!}" method="POST" >
                            {{--<form class="form-horizontal" action="{!! url('AdminProfileUpdate') !!}" method="POST" >--}}

                            <div class="form-body pal">

                                <input type="hidden" name="_method" value="PUT">
                                {!! csrf_field() !!}

                                <div class="form-group">
                                    <label for="no_kp_admin" class="col-md-3 control-label">
                                        No Kp </label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-credit-card"></i>
                                            <input id="no_kp_admin" type="text" placeholder="" class="form-control" name="no_kp_admin" value="{{ $admin->no_kp_admin }}" maxlength="12"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nama_admin" class="col-md-3 control-label">
                                        Nama</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="nama_admin" type="text" placeholder="" class="form-control" name="nama_admin" value="{{ $admin->nama_admin }}" ></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="no_tel_admin" class="col-md-3 control-label">
                                        No Tel </label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-phone "></i>
                                                <input id="no_tel_admin" type="text" placeholder="" class="form-control" name="no_tel_admin" value="{{ $admin->no_tel_admin }}" maxlength="10" >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="no_hp_admin" class="col-md-3 control-label">
                                        No HP </label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-mobile-phone"></i>
                                            <input id="no_hp_admin" type="text" placeholder="" class="form-control" name="no_hp_admin" value="{{ $admin->no_hp_admin }}" maxlength="10"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tarikh_lahir_admin" class="col-md-3 control-label">
                                        Tarikh Lahir</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-calendar"></i>
                                            <input id="tarikh_lahir_admin" type="date" placeholder="" class="form-control" name="tarikh_lahir_admin" value="{{ $admin->tarikh_lahir_admin }}" ></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="alamat_admin" class="col-md-3 control-label">
                                        Alamat </label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-home"></i>
                                            <input id="alamat_admin" type="text" placeholder="" class="form-control" name="alamat_admin" value="{{ $admin->alamat_admin }}" ></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="poskod_admin" class="col-md-3 control-label">
                                        Poskod</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-hashtag"></i>
                                            <input id="poskod_admin" type="text" placeholder="" class="form-control" name="poskod_admin" value="{{ $admin->poskod_admin }}" maxlength="5"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email_admin" class="col-md-3 control-label">
                                        Email</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-location-arrow"></i>
                                            <input id="email_admin" type="email" placeholder="" class="form-control" name="email_admin" value="{{ $admin->user->email }}" ></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jantina_admin" class="col-md-3 control-label">
                                        Jantina</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-venus-mars"></i>
                                            <input id="jantina_admin" type="text" placeholder="" class="form-control" name="jantina_admin" value="{{ $admin->jantina_admin }}" ></div>
                                    </div>
                                </div>

                                <div class="form-actions pal">
                                    <div class="form-group mbn">
                                        <div class="btn pull-right">

                                            <button type="submit" class="btn btn btn-warning btn-lg"><i class="glyphicon glyphicon-edit"></i>  Kemaskini</button>
                                            <button type="reset" value="Reset" class="btn btn btn-danger btn-lg"><i class="glyphicon glyphicon-remove-sign"></i>  Semula</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
    </div>
@stop
@section('script')
    {{--select2 start--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

    <script type="text/javascript">
        $("#classroom_id").select2({
            tags: true,
            maximumSelectionLength: 3
        })
    </script>

    {{--select2 end--}}
@stop