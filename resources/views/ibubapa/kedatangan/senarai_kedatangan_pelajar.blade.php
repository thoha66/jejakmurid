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
              {{--<form action="{!! url('CaretakerStudentAttendance/'.$StudentAttendance->id) !!}" method="POST" >--}}
                {{--<a href="{!! url('CaretakerStudentAttendance/'.$StudentAttendance->id) !!}" class="btn btn btn-info btn-sm"><i class="glyphicon glyphicon-info-sign"></i>  Maklumat Lengkap</a>--}}
                {{--<a href="{!! url('CaretakerStudentTask/'.$task->id.'/edit') !!}" type="button" class="btn btn btn-warning btn-sm"><i class="glyphicon glyphicon-edit"></i>  Kemaskini</a>--}}
                {{--<button type="submit" onclick="clicked(event)" value="Submit" class="btn btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove-sign"></i>   Buang</button>--}}
                {{--<input type="hidden" name="_method" value="DELETE">--}}
                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
              {{--</form>--}}

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
