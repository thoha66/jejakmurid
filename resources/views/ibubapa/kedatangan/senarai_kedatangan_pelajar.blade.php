@extends('layouts.master')

@section('title')
  Senarai Kedatangan  {{ $nama_pelajar }}
@endsection

@section('begin_title_left')
  Senarai Kedatangan   {{ $nama_pelajar }}
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Senarai Kedatangan   {{ $nama_pelajar }}</li>
@endsection

@section('content')
  <div class="panel panel-blue" style="background:#FFF;">
    <div class="panel-heading">Senarai Kedatangan   {{ $nama_pelajar }}</div>
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
@stop
