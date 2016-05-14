@extends('layouts.master')

@section('title')
  Senarai Tugasan
@endsection

@section('begin_title_left')
  Senarai Tugasan
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Senarai Tugasan</li>
@endsection

@section('content')
  <div class="panel panel-blue" style="background:#FFF;">
    <div class="panel-heading">Senarai Tugasan</div>
    <div class="panel-body">
      <table class="table table-hover table-bordered">
        <thead>
        <tr >
          <th class="text-center">#</th>
          <th class="text-center">Nama Guru</th>
          <th class="text-center">Kelas Subjek</th>
          <th class="text-center">Tajuk</th>
          <th class="text-center">Penerangan Tugasan</th>
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
              {{ $task->teacher->nama }}

            </td>
            <td class="text-center">
              {{ $task->classroom_subject_id }}
            </td>
            <td class="text-center">
              {{ $task->tajuk_tugasan }}
            </td>
            <td class="text-center">
              {{ $task->penerangan_tugasan }}
            </td>
            <td class="text-center">

              <form action="{!! url('task/'.$task->id) !!}" method="POST" >
                <a href="{!! url('task/'.$task->id) !!}" class="btn btn btn-info btn-sm"><i class="glyphicon glyphicon-info-sign"></i>  Maklumat Lengkap</a>
                <a href="{!! url('task/'.$task->id.'/edit') !!}" type="button" class="btn btn btn-warning btn-sm"><i class="glyphicon glyphicon-edit"></i>  Kemaskini</a>
                <a href="{{ URL::route('addmark', $task->id) }}" class="btn btn btn-success btn-sm"><i class="glyphicon glyphicon-info-sign"></i> Beri Markah</a>
                <button type="submit" onclick="clicked(event)" value="Submit" class="btn btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove-sign"></i>   Buang</button>
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </form>

            </td>
          </tr>

        @empty
          <tr>
            <td colspan="6">
              <p class="alert alert-warning">Tiada pengumuman yang dijumpai ...</p>
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
