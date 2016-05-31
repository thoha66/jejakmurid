@extends('layouts.master')

@section('title')
    Butiran Guru
@endsection

@section('begin_title_left')
    Butiran Guru
@endsection

@section('begin_title_right')
    <li><i class="fa fa-user "></i>&nbsp;Butiran Guru</li>
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
                        Butiran Guru</div>
                    <div class="panel-body pan">
                        <form class="form-horizontal" action="{!! url('TeacherProfile/'.$teacher->id) !!}" method="POST" >
                            <div class="form-body pal">

                                <input type="hidden" name="_method" value="PUT">
                                {!! csrf_field() !!}

                                <div class="form-group">
                                    <label for="no_kp_guru" class="col-md-3 control-label">
                                        No KP</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-credit-card"></i>
                                            <input id="no_kp_guru" type="text" placeholder="" class="form-control" name="no_kp_guru" value="{{ $teacher->no_kp_guru }}" disabled></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="guru_kelas_id" class="col-md-3 control-label">
                                        Guru Kelas</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-institution "></i>
                                            <input id="guru_kelas_id" type="text" placeholder="" class="form-control" name="guru_kelas_id" value="{{ $teacher->classroom4->nama_kelas }}" disabled></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jenis_guru" class="col-md-3 control-label">
                                        Jenis Guru</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-joomla  "></i>
                                            @if($teacher->jenis_guru ==2)
                                                <input id="jenis_guru" type="text" placeholder="" class="form-control" name="jenis_guru" value="Guru Biasa" disabled>

                                            @elseif($teacher->jenis_guru ==3)
                                                <input id="jenis_guru" type="text" placeholder="" class="form-control" name="jenis_guru" value="Guru Kelas" disabled>
                                            @else
                                                <input id="jenis_guru" type="text" placeholder="" class="form-control" name="jenis_guru" value="Guru Disiplin" disabled>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nama_guru" class="col-md-3 control-label">
                                        Nama </label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="nama_guru" type="text" placeholder="" class="form-control" name="nama_guru" value="{{ $teacher->nama_guru }}" ></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="no_tel_guru" class="col-md-3 control-label">
                                        No Tel </label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-phone"></i>
                                            <input id="no_tel_guru" type="text" placeholder="" class="form-control" name="no_tel_guru" value="{{ $teacher->no_tel_guru }}" maxlength="10"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="no_hp_guru" class="col-md-3 control-label">
                                        No HP </label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-mobile-phone"></i>
                                            <input id="no_hp_guru" type="text" placeholder="" class="form-control" name="no_hp_guru" value="{{ $teacher->no_hp_guru }}" maxlength="10"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tarikh_lahir_guru" class="col-md-3 control-label">
                                        Tarikh Lahir </label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-calendar"></i>
                                            <input id="tarikh_lahir_guru" type="date" placeholder="" class="form-control" name="tarikh_lahir_guru" value="{{ $teacher->tarikh_lahir_guru }}" ></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="alamat_guru" class="col-md-3 control-label">
                                        Alamat </label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-home "></i>
                                            <input id="alamat_guru" type="text" placeholder="" class="form-control" name="alamat_guru" value="{{ $teacher->alamat_guru }}" ></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="poskod_guru" class="col-md-3 control-label">
                                        Poskod </label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="poskod_guru" type="text" placeholder="" class="form-control" name="poskod_guru" value="{{ $teacher->poskod_guru }}" maxlength="5"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email_guru" class="col-md-3 control-label">
                                        Email </label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-hashtag "></i>
                                            <input id="email_guru" type="text" placeholder="" class="form-control" name="email_guru" value="{{ $teacher->user->email }}" ></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="umur_guru" class="col-md-3 control-label">
                                        Umur </label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa-hourglass-half"></i>
                                            <input id="umur_guru" type="text" placeholder="" class="form-control" name="umur_guru" value="{{ $teacher->umur_guru }}" ></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jantina_guru" class="col-md-3 control-label">
                                        Jantina</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-venus-mars"></i>
                                            <input id="jantina_guru" type="text" placeholder="" class="form-control" name="jantina_guru" value="{{ $teacher->jantina_guru }}" ></div>
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