@extends('layouts.master')

@section('title')
  Papar Kelas
@endsection

@section('begin_title_left')
  Papar Kelas
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Papar Kelas</li>
@endsection

@section('content')
  <div class="col-lg-12">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-9">

        <div class="panel panel-blue" style="background:#fff;">
          <div class="panel-heading">
            Papar Kelas</div>
          <div class="panel-body pan">
            <form class="form-horizontal" action="{!! url('classroomsubject/'.$ClassroomSubject->id) !!}" method="POST" >
              <div class="form-body pal">
                {!! csrf_field() !!}
                <div class="form-group">
                  <label for="admin_id" class="col-md-3 control-label">
                    Pendaftar</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="admin_id" type="text" placeholder="" class="form-control" name="admin_id" value="1" ></div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="subject_id" class="col-md-3 control-label">
                    Nama Subjek</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="subject_id" type="text" placeholder="" class="form-control" name="subject_id"  value="{{ $ClassroomSubject->subject->nama_subjek }}" >
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="classroom_id" class="col-md-3 control-label">
                    Nama Kelas</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="classroom_id" type="text" placeholder="" class="form-control" name="classroom_id" value="{{ $ClassroomSubject->classroom->nama_kelas }}" >
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="teacher_id" class="col-md-3 control-label">
                    Nama Guru</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="teacher_id" type="text" placeholder="" class="form-control" name="teacher_id" value="{{ $ClassroomSubject->teacher->nama }}" >
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <label for="sesi" class="col-md-3 control-label">
                    Sesi</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="sesi" type="text" placeholder="" class="form-control" name="sesi" value="{{ $ClassroomSubject->sesi }}" >
                    </div>
                  </div>
                </div>

              </div>
              <div class="form-actions text-right pal">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <a href="{!! url('classroomsubject/'.$ClassroomSubject->id.'/edit') !!}" type="button" class="btn btn btn-warning btn-lg"><i class="glyphicon glyphicon-edit"></i>  Kemaskini</a>
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
