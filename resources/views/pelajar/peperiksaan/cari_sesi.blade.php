@extends('layouts.master')

@section('title')
  Markah Peperiksaan : Pilih Pelajar
@endsection

@section('begin_title_left')
  Markah Peperiksaan : Pilih Pelajar
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Markah Peperiksaan : Pilih Pelajar</li>
@endsection

@section('content')
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-9">

            <div class="panel panel-blue" style="background:#fff;">
              <div class="panel-heading">
                Markah Peperiksaan : Pilih Pelajar</div>
              <div class="panel-body pan">
                <form class="form-horizontal" method="POST" action="{!! url('StudentExamResult') !!}">
                  <div class="form-body pal">
                    {!! csrf_field() !!}

                    {{--<div class="form-group">--}}
                      {{--<label for="student_id" class="col-md-3 control-label">--}}
                        {{--Pilih Pelajar </label>--}}
                      {{--<div class="col-md-9">--}}

                        {{--<select class="form-control" id="student_id" name="student_id">--}}
                          {{--@foreach($students as $student)--}}
                            {{--<option value="{{ $student->id }}">{{ $student->no_kp_pelajar }} : {{ $student->nama_pelajar }}</option>--}}
                          {{--@endforeach--}}
                        {{--</select>--}}

                      {{--</div>--}}
                    {{--</div>--}}

                    <div class="form-group">
                      <label for="sesi" class="col-md-3 control-label">
                        Sesi</label>
                      <div class="col-md-9">

                        <select class="form-control" id="sesi" name="sesi_peperiksaan">
                          <option value="2016">2016</option>
                          <option value="2017">2017</option>
                        </select>

                      </div>
                    </div>

                  <div class="form-actions text-right pal">
                    <button type="submit" class="btn btn-primary">
                      Cari</button>
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

  {{--select2 end--}}
@stop