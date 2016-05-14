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
  <div class="col-lg-12">
    <div class="row">

      <div class="col-lg-2"></div>
      <div class="col-lg-9">
        <div class="panel panel-grey">
          <div class="panel-heading">
            Butiran Pelajar</div>
          <div class="panel-body pan">
            <form class="form-horizontal" action="{!! url('student/'.$student->id) !!}" method="POST" >
              <div class="form-body pal">

                <input type="hidden" name="_method" value="PUT">
                {!! csrf_field() !!}

                <div class="form-group">
                  <label for="inputNSB" class="col-md-3 control-label">
                    No Surat Beranak</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="inputNSB" type="text" placeholder="" class="form-control" name="no_surat_beranak_pelajar" value="{{ $student->no_surat_beranak_pelajar }}"></div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputKp" class="col-md-3 control-label">
                    Kad Pengenalan</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="inputKp" type="text" placeholder="" class="form-control" name="no_kp_pelajar" value="{{ $student->no_kp_pelajar }}"></div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="tingkatan" class="col-md-3 control-label">
                    Tingkatan</label>
                  <div class="col-md-9">

                    <select class="form-control" id="tingkatan" name="tingkatan_pelajar">
                      <option value="Pelajar biasa">Pelajar Biasa</option>
                      <option value="Pelajar kelas">Pelajar Kelas</option>
                      <option value="Pelajar disiplin">Pelajar Disiplin</option>
                    </select>

                  </div>
                </div>

                <div class="form-group">
                  <label for="classroom_id" class="col-md-3 control-label">
                    Pelajar Kelas</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-info-circle"></i>
                      <input id="classroom_id" type="text" placeholder="" class="form-control" name="classroom_id" value="{{ $student->classroom_id }}">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="no_kp_penjaga" class="col-md-3 control-label">
                    Kad Pengenalan Penjaga</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="no_kp_penjaga" type="text" placeholder="" class="form-control" name="no_kp_penjaga_pelajar" value="{{ $student->no_kp_penjaga_pelajar }}"></div>
                  </div>
                </div>

                {{--hiddent input--}}
                <input type="hidden" name="admin_id" value="1">
                <input type="hidden" name="parent_id" value="1">
                {{--<input type="hidden" name="nama" value="{{ $student->nama }}">--}}
                {{--<input type="hidden" name="no_tel" value="">--}}
                {{--<input type="hidden" name="no_hp" value="">--}}
                {{--<input type="hidden" name="tarikh_lahir" value="{{ $student->tarikh_lahir }}">--}}
                {{--<input type="hidden" name="alamat" value="{{ $student->alamat }}">--}}
                {{--<input type="hidden" name="poskod" value="{{ $student->poskod }}">--}}
                {{--<input type="hidden" name="email" value="{{ $student->email }}">--}}
                {{--<input type="hidden" name="umur" value="{{ $student->umur }}">--}}
                {{--<input type="hidden" name="jantina" value="{{ $student->jantina }}">--}}


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
@stop
