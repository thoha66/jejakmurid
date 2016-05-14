@extends('layouts.master')

@section('title')
  Papar Tugasan
@endsection

@section('begin_title_left')
  Papar Tugasan
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Papar Tugasan</li>
@endsection

@section('content')
  <div class="col-lg-12">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-9">

        <div class="panel panel-blue" style="background:#fff;">
          <div class="panel-heading">
            Papar Tugasan</div>
          <div class="panel-body pan">
            <form class="form-horizontal" action="{!! url('task/'.$task->id) !!}" method="POST" >
              <div class="form-body pal">
                {!! csrf_field() !!}

                <div class="form-group">
                  <label for="teacher_id" class="col-md-3 control-label">
                    Nama Guru</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="teacher_id" type="text" placeholder="" class="form-control" name="teacher_id"  value="{{ $task->teacher_id }}" >
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="classroom_subject_id" class="col-md-3 control-label">
                    Kelas Subjek</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="classroom_subject_id" type="text" placeholder="" class="form-control" name="classroom_subject_id" value="{{ $task->classroom_subject_id }}" >
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="tajuk_tugasan" class="col-md-3 control-label">
                    Tajuk Tugasan</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="tajuk_tugasan" type="text" placeholder="" class="form-control" name="tajuk_tugasan" value="{{ $task->tajuk_tugasan }}"></div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="penerangan_tugasan" class="col-md-3 control-label">
                    Penerangan Tugasan</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <textarea id="penerangan_tugasan" type="text" placeholder="" class="form-control" name="penerangan_tugasan" > {{ $task->penerangan_tugasan }} </textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="tarikh_beri" class="col-md-3 control-label">
                    Tarikh Beri</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="tarikh_beri" type="date" placeholder="" class="form-control" name="tarikh_beri" value="{{ $task->tarikh_beri }}" >
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="tarikh_hantar" class="col-md-3 control-label">
                    Tarikh Hantar</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="tarikh_hantar" type="date" placeholder="" class="form-control" name="tarikh_hantar" value="{{ $task->tarikh_hantar }}" >
                    </div>
                  </div>
                </div>


              </div>
              <div class="form-actions text-right pal">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <a href="{!! url('task/'.$task->id.'/edit') !!}" type="button" class="btn btn btn-warning btn-lg"><i class="glyphicon glyphicon-edit"></i>  Kemaskini</a>
                <button type="submit" value="Submit" class="btn btn btn-danger btn-lg"><i class="glyphicon glyphicon-remove-sign"></i>   Buang</button>

              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-1"></div>
    </div>
  </div>
@stop
