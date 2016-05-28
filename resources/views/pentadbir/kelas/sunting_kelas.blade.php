@extends('layouts.master')

@section('title')
  Sunting Kelas
@endsection

@section('begin_title_left')
  Sunting Kelas
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Sunting Kelas</li>
@endsection

@section('content')
  <div class="col-lg-12">
    @include('includes/error')
    @include('includes/success')
    @include('includes/not_success')

    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-9">

        <div class="panel panel-blue" style="background:#fff;">
          <div class="panel-heading">
            Sunting Kelas</div>
          <div class="panel-body pan">
            <form class="form-horizontal" action="{!! url('classroom/'.$classroom->id) !!}" method="POST" >
              <div class="form-body pal">
                <input type="hidden" name="_method" value="PUT">

                {!! csrf_field() !!}
                <div class="form-group">
                  <label for="admin_id" class="col-md-3 control-label">
                    Pendaftar</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="admin_id" type="text" placeholder="" class="form-control" value="{{ $classroom->admin->nama_admin }}" disabled></div>
                    <input type="hidden" name="admin_id" value="{{ $admin_id }}" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="kod_Kelas" class="col-md-3 control-label">
                    Kod Kelas</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-barcode"></i>
                      <input id="kod_Kelas" type="text" placeholder="" class="form-control" value="{{$classroom->kod_kelas}}" maxlength="5" disabled></div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nama_Kelas" class="col-md-3 control-label">
                    Nama Kelas</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-institution"></i>
                      <input id="nama_Kelas" type="text" placeholder="" class="form-control" name="nama_kelas" value="{{$classroom->nama_kelas}}" ></div>
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
