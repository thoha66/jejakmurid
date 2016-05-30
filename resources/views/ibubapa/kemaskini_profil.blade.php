@extends('layouts.master')

@section('title')
    Butiran Penjaga
@endsection

@section('begin_title_left')
    Butiran Penjaga
@endsection

@section('begin_title_right')
    <li><i class="fa fa-user "></i>&nbsp;Butiran Penjaga&nbsp;&nbsp;
        @endsection

        @section('content')
            @include('includes/error')
            @include('includes/success')
            @include('includes/not_success')
            <div class="row">

                <div class="col-lg-2"></div>
                <div class="col-lg-9">
                    <div class="panel panel-blue" style="background:#fff;">
                        <div class="panel-heading">
                            Butiran Penjaga
                        </div>
                        <div class="panel-body pan">
                            <form class="form-horizontal" action="{!! url('caretaker/'.$caretaker->id) !!}" method="POST" >
                                <div class="form-body pal">

                                    <input type="hidden" name="_method" value="PUT">
                                    {!! csrf_field() !!}

                                    <div class="form-group">
                                        <label for="no_kp_penjaga" class="col-md-3 control-label">
                                            Kad Pengenalan
                                        </label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <i class="fa fa-credit-card "></i>
                                                <input id="no_kp_penjaga" type="text" placeholder="" class="form-control" name="no_kp_penjaga" value="{{ $caretaker->no_kp_penjaga }}" maxlength="12">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_penjaga" class="col-md-3 control-label">
                                            Nama Penjaga</label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <i class="fa fa-user "></i>
                                                <input id="nama_penjaga" type="text" placeholder="" class="form-control" name="nama_penjaga" value="{{ $caretaker->nama_penjaga }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat_penjaga" class="col-md-3 control-label">
                                            Alamat Penjaga</label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <i class="fa fa-volume-control-phone"></i>
                                                <input id="alamat_penjaga" type="text" placeholder="" class="form-control" name="alamat_penjaga" value="{{ $caretaker->alamat_penjaga }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="poskod_penjaga" class="col-md-3 control-label">
                                            Poskod</label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <i class="fa fa-mobile"></i>
                                                <input id="poskod_penjaga" type="text" placeholder="" class="form-control" name="poskod_penjaga" value="{{ $caretaker->poskod_penjaga }}" maxlength="5">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="no_tel_penjaga" class="col-md-3 control-label">
                                            No Telefon </label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <i class="fa fa-mobile"></i>
                                                <input id="no_tel_penjaga" type="text" placeholder="" class="form-control" name="no_tel_penjaga" value="{{ $caretaker->no_tel_penjaga }}" maxlength="10">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email_penjaga" class="col-md-3 control-label">
                                            Email Penjaga </label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <i class="fa fa-mobile"></i>
                                                <input id="email_penjaga" type="email" placeholder="" class="form-control" name="email_penjaga" value="{{ $caretaker->user->email }}">
                                            </div>
                                        </div>
                                    </div>

                                    {{--<div class="form-group">--}}
                                        {{--<label for="password" class="col-md-3 control-label">--}}
                                            {{--Katalaluan </label>--}}
                                        {{--<div class="col-md-9">--}}
                                            {{--<div class="input-icon right">--}}
                                                {{--<i class="fa fa-mobile"></i>--}}
                                                {{--<input id="password" type="password" placeholder="" class="form-control" name="password" >--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

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
                <div class="col-lg-1"></div>
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