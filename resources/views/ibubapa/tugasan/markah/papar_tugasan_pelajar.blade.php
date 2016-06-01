@extends('layouts.master')

@section('title')
  Papar Tugasan
@endsection

@section('begin_title_left')
  Papar Tugasan
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Papar Tugasan</li>
@endsection

@section('content')
  <div class="row">
  <div class="col-lg-12">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-9">

        <div class="panel panel-blue" style="background:#fff;">
          <div class="panel-heading">
            Papar Tugasan</div>
          <div class="panel-body pan">
            <form class="form-horizontal" action="{!! url('#') !!}" method="POST" >
              <div class="form-body pal">
                {!! csrf_field() !!}

                <div class="form-group">
                  <label for="teacher_id" class="col-md-3 control-label">
                    Nama Guru</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="teacher_id" type="text" placeholder="" class="form-control" name="teacher_id"  value="{{ $task->nama_guru }}" disabled>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="classroom_subject_id" class="col-md-3 control-label">
                    Kelas Subjek</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="classroom_subject_id" type="text" placeholder="" class="form-control" name="classroom_subject_id" value="{{ $task->nama_kelas }} : {{ $task->nama_subjek }}" disabled>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="tajuk_tugasan" class="col-md-3 control-label">
                    Tajuk Tugasan</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="tajuk_tugasan" type="text" placeholder="" class="form-control" name="tajuk_tugasan" value="{{ $task->tajuk_tugasan }}" disabled></div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="penerangan_tugasan" class="col-md-3 control-label">
                    Penerangan Tugasan</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <textarea id="penerangan_tugasan" type="text" placeholder="" class="form-control" name="penerangan_tugasan" disabled> {{ $task->penerangan_tugasan }} </textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="tarikh_beri" class="col-md-3 control-label">
                    Tarikh Beri</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="tarikh_beri" type="date" placeholder="" class="form-control" name="tarikh_beri" value="{{ $task->tarikh_beri }}" disabled>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="tarikh_hantar" class="col-md-3 control-label">
                    Tarikh Hantar</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="tarikh_hantar" type="date" placeholder="" class="form-control" name="tarikh_hantar" value="{{ $task->tarikh_hantar }}" disabled>
                    </div>
                  </div>
                </div>


              </div>
              <div class="form-actions text-right pal">
                {{--<input type="hidden" name="_method" value="DELETE">--}}
                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

                {{--<a href="{!! url('task/'.$task->id.'/edit') !!}" type="button" class="btn btn btn-warning btn-lg"><i class="glyphicon glyphicon-edit"></i>  Kemaskini</a>--}}
                {{--<button type="submit" value="Submit" class="btn btn btn-green btn-lg"><i class="glyphicon glyphicon-ok"></i>   Noted</button>--}}

              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-1"></div>
    </div>
    {{--new row--}}
    <div class="row">

      <div class=" text-center">
        <canvas id="totalpaymentchart" width="800px" height="400px" ></canvas>
      </div>
      <div class="text-center">
        <p><b>Rajah Menunjukkan : X-Axis [Gread Skor Pelajar], Y-Axis [Bil Pelajar]</b></p>
        <p><b>Anak Anda Markah : {{ $mark }}/100</b></p>
      </div>

    </div>
    {{--new row--}}
  </div>
  </div>
  <script>
    //        new chart
    (function() {
      var ctx = document.getElementById('totalpaymentchart').getContext('2d');
      var chart = {
        labels: ['A+[90-100]', 'A[80-89]', 'A-[75-79]', 'B+[70-74]', 'B[65-69]', 'C+[60-64]', 'C[50-59]', 'D[45-49]', 'E[40-44]', 'G[0-39]'],
        datasets: [{
          data: [ {{ json_encode($at) }}, {{ json_encode($a) }},
            {{ json_encode($ak) }}, {{ json_encode($bt) }},
            {{ json_encode($b) }}, {{ json_encode($ct) }},
            {{ json_encode($c) }}, {{ json_encode($d) }},
            {{ json_encode($e) }}, {{ json_encode($g) }}
          ],
          fillColor : "#2ECCFA",
          strokeColor : "#0080FF",
          pointColor : "#0080FF"
        }]
      };
      new Chart(ctx).Bar(chart, { bezierCurve: false, pointDotRadius : 3 });
    })();

  </script>
@stop
