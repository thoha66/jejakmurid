@extends('layouts.master')

@section('title')
  Daftar Guru
@endsection

@section('begin_title_left')
  Daftar Guru
@endsection

@section('begin_title_right')
  <li><i class="fa fa-user "></i>&nbsp;Daftar Guru</li>
@endsection

@section('content')
      <div class="col-lg-12">
        <div class="row">

          <div class="col-lg-2"></div>
          <div class="col-lg-9">
            <div class="panel panel-grey">
              <div class="panel-heading">
                Daftar Guru</div>
              <div class="panel-body pan">
                <form class="form-horizontal" method="POST" action="{!! url('teacher') !!}">
                  <div class="form-body pal">

                    {!! csrf_field() !!}
                    <div class="form-group">
                      <label for="inputKp" class="col-md-3 control-label">
                        Kad Pengenalan</label>
                      <div class="col-md-9">
                        <div class="input-icon right">
                          <i class="fa fa-user "></i>
                          <input id="inputKp" type="text" placeholder="" class="form-control" name="no_kp_guru"></div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputJG" class="col-md-3 control-label">
                        Jenis Guru</label>
                      <div class="col-md-9">

                        <select class="form-control" id="inputJG" name="jenis_guru">
                          <option value="guru biasa">Guru Biasa</option>
                          <option value="guru kelas">Guru Kelas</option>
                          <option value="guru disiplin">Guru Disiplin</option>
                        </select>

                      </div>
                    </div>

                    {{--<div class="form-group">--}}
                      {{--<label for="inputGK" class="col-md-3 control-label">--}}
                        {{--Guru Kelas</label>--}}
                      {{--<div class="col-md-9">--}}
                        {{--<div class="input-icon right">--}}
                          {{--<i class="fa fa-info-circle"></i>--}}
                          {{--<input id="inputGK" type="text" placeholder="" class="form-control" name="guru_kelas">--}}
                        {{--</div>--}}
                      {{--</div>--}}
                    {{--</div>--}}

                    <div class="form-group">
                      <label for="classroom_id" class="col-md-3 control-label">
                        Guru Kelas</label>
                      <div class="col-md-9">

                        <select class="form-control" id="classroom_id" name="guru_kelas_id" >
                          @foreach($classrooms as $classroom)
                            <option value="{{ $classroom->id }}">{{ $classroom->nama_kelas }}</option>
                          @endforeach
                        </select>

                      </div>
                    </div>

                      {{--hiddent input--}}
                      <input type="hidden" name="admin_id" value="1">
                      {{--<input type="hidden" name="nama" value="">--}}
                      {{--<input type="hidden" name="no_tel" value="">--}}
                      {{--<input type="hidden" name="no_hp" value="">--}}
                      {{--<input type="hidden" name="tarikh_lahir" value="">--}}
                      {{--<input type="hidden" name="alamat" value="">--}}
                      {{--<input type="hidden" name="poskod" value="">--}}
                      {{--<input type="hidden" name="email" value="">--}}
                      {{--<input type="hidden" name="umur" value="">--}}
                      {{--<input type="hidden" name="jantina" value="">--}}


                    <div class="form-actions pal">
                      <div class="form-group mbn">
                        <div class="btn pull-right">
                          {{--<a href="#" class="btn btn-primary">Register</a>&nbsp;&nbsp;--}}
                          <button type="submit" class="btn btn-primary">
                            Hantar</button>
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