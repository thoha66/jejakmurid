@extends('layouts.master')

@section('title')
  Senarai Kesalahan Disiplin  {{ $nama_pelajar }}
@endsection

@section('begin_title_left')
  Senarai Kesalahan Disiplin   {{ $nama_pelajar }}
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Senarai Kesalahan Disiplin   {{ $nama_pelajar }}</li>
@endsection

@section('content')
  <div class="panel panel-blue" style="background:#FFF;">
    <div class="panel-heading">Senarai Kesalahan Disiplin   {{ $nama_pelajar }}</div>
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
@stop
