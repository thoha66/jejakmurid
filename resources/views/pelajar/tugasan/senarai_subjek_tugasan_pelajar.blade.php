@extends('layouts.master')

@section('title')
  Senarai Subjek
@endsection

@section('begin_title_left')
  Senarai Subjek
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Senarai Subjek</li>
@endsection

@section('content')
  <div class="panel panel-blue" style="background:#FFF;">
    <div class="panel-heading">Senarai Subjek</div>
    <div class="panel-body">
      <table class="table table-hover table-bordered">
        <thead>
        <tr >
          <th class="text-center">#</th>
          <th>Jenis Subjek</th>
          <th class="text-center">Senarai</th>
          <th class="text-center">Hasil</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=0; ?>
        @forelse ($ClassroomSubjects as $ClassroomSubject)

          <?php
          $no += 1;
          ?>

          <tr>
            <td class="text-center">
              <?php echo $no; ?>
            </td>
            <td>
              {{ $ClassroomSubject->subject->nama_subjek  }}
            </td>
            <td class="text-center">

              <form action="{!! url('StudentTaskView') !!}" method="POST" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{--hidden input--}}
                <input type="hidden" name="classroom_subject_id" value="{{ $ClassroomSubject->id }}">
                <input type="hidden" name="nama_subjek" value="{{ $ClassroomSubject->subject->nama_subjek }}">
                {{--<input type="hidden" name="student_id" value="{{ $student_id }}">--}}
                {{--<input type="hidden" name="nama_peperiksaan" value="{{ $exam->nama_peperiksaan }}">--}}
                {{--<input type="hidden" name="sesi_peperiksaan" value="{{ $sesi_peperiksaan }}">--}}

                <button  class="btn btn btn-info btn-sm"><i class="glyphicon glyphicon-info-sign"></i>  Senarai Tugasan</button>
              </form>
            </td>
            <td class="text-center">
              <form action="{!! url('SubjekTaskMarks') !!}" method="POST" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{--hidden input--}}
                <input type="hidden" name="classroom_subject_id" value="{{ $ClassroomSubject->id }}">
                <input type="hidden" name="subject_id" value="{{ $ClassroomSubject->subject->subject_id }}">

                <button  class="btn btn-success btn-sm"><i class="glyphicon glyphicon-info-sign "></i>  Pemarkahan Pemarkahan Tugasan</button>
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
        {!! $ClassroomSubjects->render() !!}
      </div>



    </div>
  </div>
@stop
