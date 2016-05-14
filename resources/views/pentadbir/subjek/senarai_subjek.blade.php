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
    <div class="panel-heading">Senarai Subject</div>
    <div class="panel-body">
      <table class="table table-hover table-bordered">
        <thead>
        <tr >
          <th class="text-center">#</th>
          <th class="text-center">Nama Pendaftar</th>
          <th class="text-center">Kod Subject</th>
          <th class="text-center">Nama Subject</th>
          <th class="text-center">Tindakkan</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=0; ?>
        @forelse ($subjects as $subject)

          <?php
          $no += 1;
          ?>

          <tr>
            <td class="text-center">
              <?php echo $no; ?>
            </td>
            <td class="text-center">
              {{ $subject->admin->nama_admin }}

            </td>
            <td class="text-center">
              {{ $subject->kod_subjek }}
            </td>
            <td class="text-center">
              {{ $subject->nama_subjek }}
            </td>
            <td class="text-center">

              <form action="{!! url('subject/'.$subject->id) !!}" method="POST" >
                <a href="{!! url('subject/'.$subject->id) !!}" class="btn btn btn-info btn-sm"><i class="glyphicon glyphicon-info-sign"></i>  Maklumat Lengkap</a>
                <a href="{!! url('subject/'.$subject->id.'/edit') !!}" type="button" class="btn btn btn-warning btn-sm"><i class="glyphicon glyphicon-edit"></i>  Kemaskini</a>
                <button type="submit" onclick="clicked(event)" value="Submit" class="btn btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove-sign"></i>   Buang</button>
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </form>

            </td>
          </tr>

        @empty
          <tr>
            <td colspan="5">
              <p class="alert alert-warning">Tiada pengumuman yang dijumpai ...</p>
            </td>
          </tr>
        @endforelse
        </tbody>

      </table>
      <div class="text-center">
        {!! $subjects->render() !!}
      </div>



    </div>
  </div>
@stop
