@extends('layouts.master')

@section('title')
  Papar Subjek
@endsection

@section('begin_title_left')
  Papar Subjek
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Papar Subjek</li>
@endsection

@section('content')
  <div class="col-lg-12">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-9">

        <div class="panel panel-blue" style="background:#fff;">
          <div class="panel-heading">
            Papar Subjek</div>
          <div class="panel-body pan">
            <form class="form-horizontal" action="{!! url('subject/'.$subject->id) !!}" method="POST" >
              <div class="form-body pal">
                {!! csrf_field() !!}
                <div class="form-group">
                  <label for="admin_id" class="col-md-3 control-label">
                    Pendaftar</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="admin_id" type="text" placeholder="" class="form-control" name="admin_id" value="{{ $subject->admin->nama }} " disabled></div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="kod_subjek" class="col-md-3 control-label">
                    Kod Subjek</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="kod_subjek" type="text" placeholder="" class="form-control" name="kod_subjek" value="{{ $subject->kod_subjek }} " disabled></div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nama_subjek" class="col-md-3 control-label">
                    Nama Subjek</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="nama_subjek" type="text" placeholder="" class="form-control" name="nama_subjek" value="{{ $subject->nama_subjek }} " disabled></div>
                  </div>
                </div>

              </div>
              <div class="form-actions text-right pal">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <a href="{!! url('subject/'.$subject->id.'/edit') !!}" type="button" class="btn btn btn-warning btn-lg"><i class="glyphicon glyphicon-edit"></i>  Kemaskini</a>
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
