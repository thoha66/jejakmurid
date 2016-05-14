@extends('layouts.master')

@section('title')
  Butiran Subjek
@endsection

@section('begin_title_left')
  Butiran Subjek
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Butiran Subjek</li>
@endsection

@section('content')
  <div class="col-lg-12">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-9">

        <div class="panel panel-blue" style="background:#fff;">
          <div class="panel-heading">
            Butiran Subjek</div>
          <div class="panel-body pan">
            <form class="form-horizontal" action="{!! url('subject/'.$subject->id) !!}" method="POST" >
              <div class="form-body pal">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="admin_id" value="1">
                {!! csrf_field() !!}
                <div class="form-group">
                  <label for="admin_id" class="col-md-3 control-label">
                    Pendaftar</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="admin_id" type="text" placeholder="" class="form-control" value="{{ $subject->admin->nama }} " ></div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="kod_subjek" class="col-md-3 control-label">
                    Kod Subjek</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="kod_subjek" type="text" placeholder="" class="form-control" name="kod_subjek" value="{{ $subject->kod_subjek }} "></div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nama_subjek" class="col-md-3 control-label">
                    Nama Subjek</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="nama_subjek" type="text" placeholder="" class="form-control" name="nama_subjek" value="{{ $subject->nama_subjek }} "></div>
                  </div>
                </div>

              </div>
              <div class="form-actions text-right pal">

                <button type="submit" class="btn btn btn-warning btn-lg"><i class="glyphicon glyphicon-edit"></i>  Kemaskini</button>
                <button type="reset" value="Reset" class="btn btn btn-danger btn-lg"><i class="glyphicon glyphicon-remove-sign"></i>  Semula</button>

              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-1"></div>
    </div>
  </div>
@stop
