@extends('layouts.master')

@section('title')
  Senarai Berita Aktiviti Sekolah
@endsection

@section('begin_title_left')
  Senarai Berita Aktiviti Sekolah
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Senarai Berita Aktiviti Sekolah</li>
@endsection

@section('content')
  <div class="panel panel-blue" style="background:#FFF;">
    <div class="panel-heading">Senarai Berita Aktiviti Sekolah</div>
    <div class="panel-body">
      <table class="table table-hover table-bordered">
        <thead>
        <tr >
          <th class="text-center">#</th>
          <th class="text-center">Tajuk</th>
          <th class="text-center">Tarikh Pemberitahuan</th>
          <th class="text-center">Tarikh Aktiviti</th>
          {{--<th class="text-center">Status</th>--}}
          <th class="text-center">Tindakkan</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=0; ?>
        @forelse ($Newss as $News)

          <?php
          $no += 1;
          ?>

          <tr>
            <td class="text-center">
              <?php echo $no; ?>
            </td>
            <td class="text-center">
              {{ $News->tajuk  }}

            </td>
            <td class="text-center">
              {{ date("d-m-Y", strtotime($News->created_at))  }}
            </td>
            <td class="text-center">
              {{ date("d-m-Y", strtotime($News->tarikh_mula))  }}
            </td>
            {{--<td class="text-center">--}}
              {{--{{ date("d-m-Y", strtotime($StudentOffense->tarikh_kesalahan))  }}--}}
            {{--</td>--}}
            <td class="text-center">

              <form action="{!! url('CaretakerStudentNews/'.$News->id) !!}" method="POST" >
                {{--<input type="hidden" name="_method" value="PUT">--}}
                {{--{!! csrf_field() !!}--}}
                {{--<input type="hidden" name="status_baca_berita" value="SUDAH BACA">--}}
                <a href="{!! url('CaretakerStudentNews/'.$News->id) !!}" class="btn btn btn-info btn-sm"><i class="glyphicon glyphicon-info-sign"></i>  Maklumat Lengkap</a>
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
        {!! $Newss->render() !!}
      </div>



    </div>
  </div>
@stop
