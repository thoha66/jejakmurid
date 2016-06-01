@extends('layouts.master')

@section('title')
  Senarai Kesalahan Disiplin  Pelajar
@endsection

@section('begin_title_left')
  Senarai Kesalahan Disiplin  Pelajar
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Senarai Kesalahan Disiplin  Pelajar</li>
@endsection

@section('content')
  <div class="row">
  <div class="panel panel-blue" style="background:#FFF;">
    <div class="panel-heading">Pelajar :  {{ $nama_pelajar }}</div>
    <div class="panel-body">
      <table class="table table-hover table-bordered">
        <thead>
        <tr >
          <th class="text-center">#</th>
          <th class="text-center">Kesalahan</th>
          <th class="text-center">Tarikh Berlaku</th>
          <th class="text-center">Tindakkan</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=0; ?>
        @forelse ($StudentOffenses as $StudentOffense)

          <?php
          $no += 1;
          ?>

          <tr>
            <td class="text-center">
              <?php echo $no; ?>
            </td>
            <td class="text-center">
              {{ $StudentOffense->offense->nama_kesalahan  }}

            </td>
            <td class="text-center">
              {{ date("d-m-Y", strtotime($StudentOffense->tarikh_kesalahan))  }}
            </td>
            <td class="text-center">

              <form action="{!! url('CaretakerStudentDiscipline/'.$StudentOffense->id) !!}" method="POST" >
                <a href="{!! url('CaretakerStudentDiscipline/'.$StudentOffense->id) !!}" class="btn btn btn-info btn-sm"><i class="glyphicon glyphicon-info-sign"></i>  Maklumat Lengkap</a>
                {{--<a href="{!! url('CaretakerStudentTask/'.$task->id.'/edit') !!}" type="button" class="btn btn btn-warning btn-sm"><i class="glyphicon glyphicon-edit"></i>  Kemaskini</a>--}}
                {{--<button type="submit" onclick="clicked(event)" value="Submit" class="btn btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove-sign"></i>   Buang</button>--}}
                {{--<input type="hidden" name="_method" value="DELETE">--}}
                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
              </form>

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
        {!! $StudentOffenses->render() !!}
      </div>



    </div>
  </div>
  </div>
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
        labels: ['JUM PENALTI {{ $nama_pelajar }}', 'AMARAN PERTAMA', 'AMARAN KE 2', 'AMARAN KE 3', 'BUANG SEKOLAH'],
        datasets: [{
          data: [ {{ json_encode($total_penalty) }}, {{ json_encode(15) }}, {{ json_encode(30) }}, {{ json_encode(40) }},{{ json_encode(50) }} ],
          fillColor : "#2ECCFA",
          strokeColor : "#0080FF",
          pointColor : "#0080FF"
        }]
      };
      new Chart(ctx).Bar(chart, { bezierCurve: false, pointDotRadius : 3 });
    })();

  </script>
@stop
