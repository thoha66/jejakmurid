@extends('layouts.master')

@section('title')
  Markah Tugasan : Pilih Pelajar
@endsection

@section('begin_title_left')
  Markah Tugasan : Pilih Pelajar
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Markah Tugasan : Pilih Pelajar</li>
@endsection

@section('content')
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-9">

            <div class="row">
              @foreach($students as $student)
                <div class="col-sm-4 col-lg-4 col-md-4">

                  <form class="form-horizontal" method="POST" action="{!! url('StudentTaskMarkAll') !!}">
                    {!! csrf_field() !!}

                    <div class="thumbnail">
                      <img class="center-block" src="/uploads/avatars/{{ $student->user->avatar }}" alt="" style="width: 150px; height: 150px; border-radius: 50%;">
                      <div class="caption text-center">
                        <strong>{{ $student->nama_pelajar  }}</strong>
                        </h4>
                      </div>
                      <div class="center center-block">
                        <button class="btn btn-success add-to-cart center-block"><i class="fa fa-user"></i> Lengkap</button>
                      </div>
                    </div>
                  </form>
                </div>
              @endforeach
            </div>

            {{--<div class="panel panel-blue" style="background:#fff;">--}}
              {{--<div class="panel-heading">--}}
                {{--Tugasan : Pilih Pelajar</div>--}}
              {{--<div class="panel-body pan">--}}
                {{--<form class="form-horizontal" method="POST" action="{!! url('StudentTaskMarkAll') !!}">--}}
                  {{--<div class="form-body pal">--}}
                    {{--{!! csrf_field() !!}--}}

                    {{--<div class="row">--}}
                      {{--@foreach($students as $student)--}}
                          {{--<div class="col-sm-4 col-lg-4 col-md-4">--}}

                            {{--<form class="form-horizontal" method="POST" action="{!! url('StudentTaskMarkAll') !!}">--}}
                              {{--{!! csrf_field() !!}--}}

                            {{--<div class="thumbnail">--}}
                              {{--<img src="/uploads/avatars/{{ $student->user->avatar }}" alt="">--}}
                              {{--<div class="caption">--}}

                                    {{--{{ $student->nama_pelajar  }}--}}

                                {{--</h4>--}}
                              {{--</div>--}}
                              {{--<div class="center center-block">--}}
                                {{--<button class="btn btn-success add-to-cart center-block"><i class="fa fa-shopping-cart"></i> Lengkap</button>--}}
                              {{--</div>--}}
                            {{--</div>--}}
                            {{--</form>--}}
                          {{--</div>--}}
                      {{--@endforeach--}}
                    {{--</div>--}}

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

                  {{--<div class="form-actions text-right pal">--}}
                    {{--<button type="submit" class="btn btn-primary">--}}
                      {{--Cari</button>--}}
                  {{--</div>--}}
                {{--</form>--}}
              {{--</div>--}}
            {{--</div>--}}
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