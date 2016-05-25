@extends('layouts.master')

@section('title')
  Senarai Peperiksaan
@endsection

@section('begin_title_left')
  Senarai Peperiksaan
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Senarai Peperiksaan</li>
@endsection

@section('content')
  <div class="panel panel-blue" style="background:#FFF;">
    <div class="panel-heading">Senarai Peperiksaan</div>
    <div class="panel-body">
      <table class="table table-hover table-bordered">
        <thead>
        <tr >
          <th class="text-center">#</th>
          <th>Jenis Peperiksaan</th>
          <th class="text-center">Tindakkan</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=0; ?>
        @forelse ($exams as $exam)

          <?php
          $no += 1;
          ?>

          <tr>
            <td class="text-center">
              <?php echo $no; ?>
            </td>
            <td>
              {{ $exam->nama_peperiksaan  }}
            </td>
            <td class="text-center">

              <form action="{!! url('StudentExamResultDetails') !!}" method="POST" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{--hidden input--}}
                <input type="hidden" name="id" value="{{ $exam->id }}">
                <input type="hidden" name="student_id" value="{{ $student_id }}">
                <input type="hidden" name="nama_peperiksaan" value="{{ $exam->nama_peperiksaan }}">
                <input type="hidden" name="sesi_peperiksaan" value="{{ $sesi_peperiksaan }}">

                <button  class="btn btn btn-info btn-sm"><i class="glyphicon glyphicon-info-sign"></i>  Maklumat Lengkap</button>
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
      {{--<div class="text-center">--}}
        {{--{!! $tasks->render() !!}--}}
      {{--</div>--}}



    </div>
  </div>
@stop
