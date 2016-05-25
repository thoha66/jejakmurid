@extends('layouts.master')

@section('title')
  Keputusan Peperiksaan {{ $sesi_peperiksaan }}
@endsection

@section('begin_title_left')
  Keputusan Peperiksaan {{ $sesi_peperiksaan }}
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Keputusan Peperiksaan </li>
@endsection

@section('content')
  <div class="panel panel-blue" style="background:#FFF;">
    <div class="panel-heading">{{ $nama_peperiksaan }}</div>
    <div class="panel-body">
      <table class="table table-hover table-bordered">
        <thead>
        <tr>
          <th colspan="2">
            NAMA :&nbsp;&nbsp;&nbsp;{{ $student->nama_pelajar }}
          </th>
          <th>
            KELAS:&nbsp;&nbsp;{{ $student->classroom->nama_kelas }}
          </th>
        </tr>
        <tr >
          <th class="text-center">#</th>
          <th>Nama Subjek</th>
          <th class="text-center">Markah</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=0; ?>
        @forelse ($ClassSubjectExams as $ClassSubjectExam)

          <?php
          $no += 1;
          ?>

          <tr>
            <td class="text-center">
              <?php echo $no; ?>
            </td>
            <td>
              {{ $ClassSubjectExam->nama_subjek  }}
            </td>
            <td class="text-center">
              {{ $ClassSubjectExam->markah_peperiksaan  }}/100
              {{--<form action="{!! url('CaretakerStudentExamDetails') !!}" method="POST" >--}}
                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                {{--hidden input--}}
                {{--<input type="hidden" name="id" value="{{ $exam->id }}">--}}
                {{--<input type="hidden" name="student_id" value="{{ $student_id }}">--}}
                {{--<input type="hidden" name="sesi_peperiksaan" value="{{ $sesi_peperiksaan }}">--}}

                {{--<button  class="btn btn btn-info btn-sm"><i class="glyphicon glyphicon-info-sign"></i>  Maklumat Lengkap</button>--}}
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
      {{--<div class="text-center">--}}
        {{--{!! $tasks->render() !!}--}}
      {{--</div>--}}



    </div>
  </div>
@stop
