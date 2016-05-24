@extends('layouts.master')

@section('title')
  Cari Tugasan Pelajar
@endsection

@section('begin_title_left')
  Cari Tugasan Pelajar
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Cari Tugasan Pelajar</li>
@endsection

@section('content')
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-9">

            <div class="panel panel-blue" style="background:#fff;">
              <div class="panel-heading">
                Cari Tugasan Pelajar</div>
              <div class="panel-body pan">
                <form class="form-horizontal" method="POST" action="{!! url('SubjectTaskAll') !!}">
                  <div class="form-body pal">
                    {!! csrf_field() !!}

                    <div class="form-group">
                      <label for="student_id" class="col-md-3 control-label">
                        Pilih Pelajar </label>
                      <div class="col-md-9">

                        <select class="form-control" id="student_id" name="classroom_subject_id">
                          @foreach($ClassroomSubjects as $ClassroomSubject)
                            <option value="{{ $ClassroomSubject->id }}">{{ $ClassroomSubject->subject->nama_subjek }}</option>
                          @endforeach
                        </select>

                      </div>
                    </div>

                    {{--<div class="form-group">--}}
                      {{--<label for="offense_id" class="col-md-3 control-label">--}}
                        {{--Jenis Kesalahan</label>--}}
                      {{--<div class="col-md-9">--}}

                        {{--<select class="form-control" id="offense_id" name="offense_id">--}}
                          {{--@foreach($offenses as $offense)--}}
                            {{--<option value="{{ $offense->id }}">{{ $offense->nama_kesalahan }}</option>--}}
                          {{--@endforeach--}}
                        {{--</select>--}}

                      {{--</div>--}}
                    {{--</div>--}}


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