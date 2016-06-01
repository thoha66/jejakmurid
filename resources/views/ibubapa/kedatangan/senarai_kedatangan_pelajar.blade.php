@extends('layouts.master')

@section('title')
  Senarai Kedatangan  {{ $nama_pelajar }}
@endsection

@section('begin_title_left')
  Senarai Kedatangan   Pelajar
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Senarai Kedatangan   Pelajar</li>
@endsection

@section('content')
  <div class="row">
  <div class="panel panel-blue" style="background:#FFF;">
    <div class="panel-heading">Pelajar :   {{ $nama_pelajar }}</div>
    <div class="panel-body">
      <table class="table table-hover table-bordered">
        <thead>
        <tr >
          <th class="text-center">#</th>
          <th class="text-center">Hari</th>
          <th class="text-center">Tarikh</th>
          <th class="text-center">Kedatangan</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=0; ?>
        @forelse ($StudentAttendances as $StudentAttendance)

          <?php
          $no += 1;
          ?>

          <tr>
            <td class="text-center">
              <?php echo $no; ?>
            </td>
            <td class="text-center">
              {{ date("D",  strtotime($StudentAttendance->attendance->tarikh)) }}

            </td>
            <td class="text-center">
              {{ date("d-m-Y", strtotime($StudentAttendance->attendance->tarikh))  }}
            </td>
            <td class="text-center">
              {{ $StudentAttendance->kedatangan  }}
            </td>
          </tr>

        @empty
          <tr>
            <td colspan="5">
              <p class="alert alert-warning">Tiada data yang dijumpai ...</p>
            </td>
          </tr>
        @endforelse
        </tbody>

      </table>
      <div class="text-center">
        {!! $StudentAttendances->render() !!}
      </div>



    </div>
  </div>
  </div>
  <div class="row"> h: {{ $total_hadir }} xh: {{ $total_x_hadir }}</div>

  {{--//dd--}}
  {{--new row--}}
  <div class="row">

    <div class=" text-center">
      <canvas id="totalpaymentchart" width="800px" height="400px" ></canvas>
    </div>
    <div class="text-center">
      <p><b>Rajah Menunjukkan : X-Axis [Gread Skor Pelajar], Y-Axis [Bil Pelajar]</b></p>
      {{--<p><b>Anak Anda Markah : {{ $mark }}/100</b></p>--}}
    </div>

  </div>
  {{--new row--}}
  <script>
    //        new chart
    (function() {
      var ctx = document.getElementById('totalpaymentchart').getContext('2d');
      var chart = {
        labels: ['JUM HADIR {{ $nama_pelajar }}', 'JUM TIDAK DATANG', 'JUM SEKOLAH/2016'],
        datasets: [{
          data: [ {{ json_encode($total_hadir) }}, {{ json_encode($total_x_hadir) }}, {{ json_encode(30) }} ],
          fillColor : "#2ECCFA",
          strokeColor : "#0080FF",
          pointColor : "#0080FF"
        }]
      };
      new Chart(ctx).Bar(chart, { bezierCurve: false, pointDotRadius : 3 });
    })();

  </script>
@stop
