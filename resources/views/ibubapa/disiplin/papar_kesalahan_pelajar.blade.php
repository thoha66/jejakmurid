@extends('layouts.master')

@section('title')
  Butiran Kesalahan Pelajar
@endsection

@section('begin_title_left')
  Butiran Kesalahan Pelajar
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Butiran Kesalahan Pelajar</li>
@endsection

@section('content')
  <div class="col-lg-12">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-9">

        <div class="panel panel-blue" style="background:#fff;">
          <div class="panel-heading">
            Butiran Kesalahan Pelajar</div>
          <div class="panel-body pan">
            <form class="form-horizontal" action="{!! url('studentoffense/'.$StudentOffense_one->id) !!}" method="POST" >
              <div class="form-body pal">
                <input type="hidden" name="_method" value="PUT">

                {!! csrf_field() !!}

                <div class="form-group">
                  <label for="teacher_id" class="col-md-3 control-label">
                    Pendaftar Kesalahan</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="teacher_id" type="text" placeholder="" class="form-control" value="{{ $StudentOffense_one->teacher->nama_guru }}" disabled></div>
                    <input type="hidden" name="teacher_id" value="{{ $StudentOffense_one->teacher->id }}" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="student_id" class="col-md-3 control-label">
                    Nama Pelajar</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="student_id" type="text" placeholder="" class="form-control" value="{{ $StudentOffense_one->student->nama_pelajar }}" disabled></div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="offense_id" class="col-md-3 control-label">
                    Jenis Kesalahan</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="offense_id" type="text" placeholder="" class="form-control" value="{{ $StudentOffense_one->offense->nama_kesalahan }}" disabled></div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="tarikh" class="col-md-3 control-label">
                    Tarikh Berlaku</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-calendar"></i>
                      <input id="tarikh" type="date" placeholder="" class="form-control" name="tarikh_kesalahan" value="{{ $StudentOffense_one->tarikh_kesalahan }}" disabled></div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="masa" class="col-md-3 control-label">
                    Masa Berlaku</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-clock-o"></i>
                      <input id="masa" type="time" placeholder="" class="form-control" name="masa_kesalahan" value="{{ $StudentOffense_one->masa_kesalahan }}" disabled></div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="tempat" class="col-md-3 control-label">
                    Tempat Dan Nota </label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-list"></i>
                      <textarea rows="5" id="tempat" type="text" placeholder="" class="form-control" name="tempat_kesalahan" disabled >{{ $StudentOffense_one->tempat_kesalahan }}</textarea>
                    </div>
                  </div>
                </div>

              </div>
              <div class="form-actions text-right pal">

                {{--<button type="submit" class="btn btn btn-warning btn-lg"><i class="glyphicon glyphicon-edit"></i>  Kemaskini</button>--}}
                {{--<button type="reset" value="Reset" class="btn btn btn-danger btn-lg"><i class="glyphicon glyphicon-remove-sign"></i>  Semula</button>--}}

              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-1"></div>
    </div>
  </div>
@stop

@section('script')
  {{--select2 start--}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

  <script type="text/javascript">
    $("#student_id").select2({
      placeholder: "Pilih Pelajar",
      allowClear: true
    });
  </script>

  <script type="text/javascript">
    $("#offense_id").select2({
      placeholder: "Pilih Kesalahan",
      allowClear: true
    });
  </script>

  {{--select2 end--}}
@stop
