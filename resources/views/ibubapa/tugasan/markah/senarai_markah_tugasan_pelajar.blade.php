@extends('layouts.master')

@section('title')
  Senarai Markah Semua Tugasan
@endsection

@section('begin_title_left')
  Senarai Markah Semua Tugasan
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Senarai Markah Semua Tugasan </li>
@endsection

@section('content')
  <div class="panel panel-blue" style="background:#FFF;">
    <div class="panel-heading">Senarai Markah Semua Tugasan </div>
    <div class="panel-body">
      <table class="table table-hover table-bordered">
        <thead>
        <tr >
          <th class="text-center">#</th>
          <th class="text-center">Tajuk Tugasan</th>
          <th class="text-center">Tarikh Beri</th>
          <th class="text-center">Tarikh Hantar</th>
          <th class="text-center">Markah</th>
          <th class="text-center">Tindakkan</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=0; ?>
        @forelse ($tasks as $task)

          <?php
          $no += 1;
          ?>

          <tr>
            <td class="text-center">
              <?php echo $no; ?>
            </td>
            <td class="text-center">
              {{ $task->tajuk_tugasan  }}

            </td>
            <td class="text-center">
              {{ date("d-m-Y", strtotime($task->tarikh_beri))  }}
            </td>
            <td class="text-center">
              {{ date("d-m-Y", strtotime($task->tarikh_hantar))  }}
            </td>
            <td class="text-center">
              {{ $task->mark }}/100
            </td>
            <td class="text-center">

              <form action="{!! url('TaskMarkGraf') !!}" method="POST" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="task_id" value="{{ $task->task_id }}">
                <input type="hidden" name="taskmark_mark" value="{{ $task->mark }}">
                <button class="btn btn-info btn-sm"><i class="glyphicon glyphicon-info-sign"></i>  Maklumat Lengkap</button>
                {{--<a href="{!! url('CaretakerStudentTask/'.$task->id.'/edit') !!}" type="button" class="btn btn btn-warning btn-sm"><i class="glyphicon glyphicon-edit"></i>  Kemaskini</a>--}}
                {{--<button type="submit" onclick="clicked(event)" value="Submit" class="btn btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove-sign"></i>   Buang</button>--}}
                {{--<input type="hidden" name="_method" value="DELETE">--}}
                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
              </form>

            </td>
          </tr>

        @empty
          <tr>
            <td colspan="6">
              <p class="alert alert-warning">Tiada data yang dijumpai ...</p>
            </td>
          </tr>
        @endforelse
        </tbody>

      </table>
      <div class="text-center">
        {!! $tasks->render() !!}
      </div>



    </div>
  </div>
@stop
