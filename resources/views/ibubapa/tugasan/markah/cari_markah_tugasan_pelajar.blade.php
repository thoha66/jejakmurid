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


              @foreach ($students->chunk(3) as $chunk)
                <div class="row">
                  @foreach ($chunk as $student)
                    <form class="form-horizontal" method="POST" action="{!! url('StudentTaskMarkAll') !!}">
                      {!! csrf_field() !!}
                      <input type="hidden" name="student_id" value="{{ $student->id }}">
                    <div class="col-xs-4 ">
                      <div class="panel panel-primary">
                        <div class="panel-body center ">
                          <img class="img-circle" src="/assets/uploads/avatars/{{ $student->user->avatar }}" alt="" style="width: 150px; height: 150px; border-radius: 50%;">
                          {{ $student->nama_pelajar }}
                          <button class="btn btn-success add-to-cart center-block"><i class="fa fa-user"></i> Lengkap</button>
                        </div>

                      </div>
                    </div>
                    </form>
                  @endforeach
                </div>
              @endforeach
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