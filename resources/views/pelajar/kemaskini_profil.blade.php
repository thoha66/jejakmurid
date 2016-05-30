@extends('layouts.master')

@section('title')
    Butiran Pelajar
@endsection

@section('begin_title_left')
    Butiran Pelajar
@endsection

@section('begin_title_right')
    <li><i class="fa fa-user "></i>&nbsp;Butiran Pelajar</li>
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
                        Butiran Pelajar</div>
                    <div class="panel-body pan">
                        <form class="form-horizontal" action="{!! url('StudentProfile/'.$student->id) !!}" method="POST" >
                            <div class="form-body pal">

                                <input type="hidden" name="_method" value="PUT">
                                {!! csrf_field() !!}

                                <div class="form-group">
                                    <label for="inputNSB" class="col-md-3 control-label">
                                        No Surat Beranak</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="inputNSB" type="text" placeholder="" class="form-control" name="no_surat_beranak_pelajar" value="{{ $student->no_surat_beranak_pelajar }}" disabled></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputKp" class="col-md-3 control-label">
                                        Kad Pengenalan</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="inputKp" type="text" placeholder="" class="form-control" name="no_kp_pelajar" value="{{ $student->no_kp_pelajar }}" disabled></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tingkatan_pelajar" class="col-md-3 control-label">
                                        Tingkatan</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="tingkatan_pelajar" type="text" placeholder="" class="form-control" name="tingkatan_pelajar" value="{{ $student->tingkatan_pelajar }}" disabled></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="classroom_id" class="col-md-3 control-label">
                                        Pelajar Kelas</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="classroom_id" type="text" placeholder="" class="form-control" name="classroom_id" value="{{ $student->classroom->nama_kelas }}" disabled></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="no_kp_penjaga" class="col-md-3 control-label">
                                        Kad Pengenalan Penjaga</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="no_kp_penjaga" type="text" placeholder="" class="form-control" name="no_kp_penjaga_pelajar" value="{{ $student->no_kp_penjaga_pelajar }}" disabled></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nama_pelajar" class="col-md-3 control-label">
                                        nama_pelajar</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="nama_pelajar" type="text" placeholder="" class="form-control" name="nama_pelajar" value="{{ $student->nama_pelajar }}" ></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tarikh_lahir_pelajar" class="col-md-3 control-label">
                                        tarikh_lahir_pelajar</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="tarikh_lahir_pelajar" type="date" placeholder="" class="form-control" name="tarikh_lahir_pelajar" value="{{ $student->tarikh_lahir_pelajar }}" ></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="alamat_pelajar" class="col-md-3 control-label">
                                        alamat_pelajar</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="alamat_pelajar" type="text" placeholder="" class="form-control" name="alamat_pelajar" value="{{ $student->alamat_pelajar }}" ></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="poskod_pelajar" class="col-md-3 control-label">
                                        poskod_pelajar</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="poskod_pelajar" type="text" placeholder="" class="form-control" name="poskod_pelajar" value="{{ $student->poskod_pelajar }}" maxlength="5"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email_pelajar" class="col-md-3 control-label">
                                        email_pelajar</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="email_pelajar" type="text" placeholder="" class="form-control" name="email_pelajar" value="{{ $student->user->email }}" ></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="umur_pelajar" class="col-md-3 control-label">
                                        umur_pelajar</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="umur_pelajar" type="text" placeholder="" class="form-control" name="umur_pelajar" value="{{ $student->umur_pelajar }}" ></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jantina_pelajar" class="col-md-3 control-label">
                                        jantina_pelajar</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="jantina_pelajar" type="text" placeholder="" class="form-control" name="jantina_pelajar" value="{{ $student->jantina_pelajar }}" ></div>
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