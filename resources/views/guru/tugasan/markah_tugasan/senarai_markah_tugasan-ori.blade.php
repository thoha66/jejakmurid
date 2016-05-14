@extends('layouts.master')

@section('title')
  Senarai Markah Tugasan
@endsection

@section('begin_title_left')
  Senarai Markah Tugasan
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Senarai Markah Tugasan</li>
@endsection

@section('content')
  <div class="panel panel-blue" style="background:#FFF;">
    <div class="panel-heading">Senarai Markah Tugasan</div>
    <div class="panel-body">
      <table class="table table-hover table-bordered">
        <thead>
        <tr >
          <th class="text-center">#</th>
          <th class="text-center">Nama Guru</th>
          <th class="text-center">Kelas : Subjek</th>
          <th class="text-center">Tajuk</th>
          <th class="text-center">Penerangan Tugasan</th>
          <th class="text-center">Tindakkan</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=0; ?>
        @forelse ($taskmarks as $taskmark)

          <?php
          $no += 1;
          ?>

          <tr>
            <td class="text-center">
              <?php echo $no; ?>
            </td>
            <td class="text-center">
              {{ $taskmark->nama }}
            </td>
            <td class="text-center">
{{--              @foreach($classroomsubjects as $classroomsubject)--}}
                {{ $taskmark->nama_kelas }}
                :
                {{ $taskmark->nama_subjek }}
              {{--@endforeach--}}
            </td>
            <td class="text-center">
              {{ $taskmark->tajuk_tugasan }}
            </td>
            <td class="text-center">
              {{ $taskmark->penerangan_tugasan }}
            </td>
            <td class="text-center">

              <form action="{!! url('taskmark/'.$taskmark->task_id) !!}" method="POST" >
                <a href="{!! url('taskmark/'.$taskmark->task_id) !!}" class="btn btn btn-info btn-sm"><i class="glyphicon glyphicon-info-sign"></i>  Maklumat Lengkap</a>
                <a href="{!! url('taskmark/'.$taskmark->task_id.'/edit') !!}" type="button" class="btn btn btn-warning btn-sm"><i class="glyphicon glyphicon-edit"></i>  Kemaskini</a>
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
      {{--<div class="text-center">--}}
        {{--{!! $taskmarks->render() !!}--}}
      {{--</div>--}}



    </div>
  </div>
@stop
