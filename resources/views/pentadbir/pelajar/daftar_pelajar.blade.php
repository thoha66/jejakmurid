@extends('layouts.master')

@section('title')
  Daftar Pelajar
@endsection

@section('begin_title_left')
  Daftar Pelajar
@endsection

@section('begin_title_right')
  <li><i class="fa fa-user "></i>&nbsp;Daftar Pelajar</li>
@endsection

@section('content')
      <div class="col-lg-12">
        @include('includes/error')
        @include('includes/success')
        @include('includes/not_success')
        <div class="row">

          <div class="col-lg-2"></div>
          <div class="col-lg-9">
            <div class="panel panel-blue" style="background:#FFF;">
              <div class="panel-heading">
                Daftar Pelajar
              </div>
              <div class="panel-body pan">
                <form class="form-horizontal" method="POST" action="{!! url('student') !!}">
                  <div class="form-body pal">

                    {!! csrf_field() !!}

                    <div class="form-group">
                      <label for="no_surat_beranak_pelajar" class="col-md-3 control-label">
                        No Surat Beranak</label>
                      <div class="col-md-9">
                        <div class="input-icon right">
                          <i class="fa fa-list-alt"></i>
                          <input id="no_surat_beranak_pelajar" type="text" placeholder="" class="form-control" name="no_surat_beranak_pelajar" maxlength="7" value="{{old('no_surat_beranak_pelajar')}}"></div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="no_kp_pelajar" class="col-md-3 control-label">
                        Kad Pengenalan</label>
                      <div class="col-md-9">
                        <div class="input-icon right">
                          <i class="fa fa-user "></i>
                          <input id="no_kp_pelajar" type="text" placeholder="" class="form-control" name="no_kp_pelajar" maxlength="12" value="{{old('no_kp_pelajar')}}"></div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="tingkatan" class="col-md-3 control-label">
                        Tingkatan</label>
                      <div class="col-md-9">

                        <select class="form-control" id="tingkatan" name="tingkatan_pelajar">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>

                      </div>
                    </div>

                    {{--<div class="form-group">--}}
                      {{--<label for="classroom_id" class="col-md-3 control-label">--}}
                        {{--Pelajar Kelas</label>--}}
                      {{--<div class="col-md-9">--}}
                        {{--<div class="input-icon right">--}}
                          {{--<i class="fa fa-info-circle"></i>--}}
                          {{--<input id="classroom_id" type="text" placeholder="" class="form-control" name="classroom_id">--}}
                        {{--</div>--}}
                      {{--</div>--}}
                    {{--</div>--}}

                    <div class="form-group">
                      <label for="classroom_id" class="col-md-3 control-label">
                        Kelas</label>
                      <div class="col-md-9">

                        <select class="form-control" id="classroom_id" name="classroom_id" >
                          @foreach($classrooms as $classroom)
                            <option value="{{ $classroom->id }}">{{ $classroom->nama_kelas }}</option>
                          @endforeach
                        </select>

                      </div>
                    </div>

                    <div class="form-group">
                      <label for="no_kp_penjaga_pelajar" class="col-md-3 control-label">
                        Kad Pengenalan Penjaga</label>
                      <div class="col-md-9">
                        <div class="input-icon right">
                          <i class="fa  fa-male "></i>
                          <input id="no_kp_penjaga_pelajar" type="text" placeholder="" class="form-control" name="no_kp_penjaga_pelajar" maxlength="12" value="{{old('no_kp_penjaga_pelajar')}}"></div>
                      </div>
                    </div>

                      {{--hiddent input--}}
                    <input type="hidden" name="admin_id" value="{{ $admin_id }}">
                    {{--<input type="hidden" name="parent_id" value="1">--}}
                      {{--<input type="hidden" name="nama" value="">--}}
                      {{--<input type="hidden" name="no_tel" value="">--}}
                      {{--<input type="hidden" name="no_hp" value="">--}}
                      {{--<input type="hidden" name="tarikh_lahir" value="">--}}
                      {{--<input type="hidden" name="alamat" value="">--}}
                      {{--<input type="hidden" name="poskod" value="">--}}
                      {{--<input type="hidden" name="email" value="">--}}
                      {{--<input type="hidden" name="umur" value="">--}}
                      {{--<input type="hidden" name="jantina" value="">--}}


                    <div class="form-actions pal">
                      <div class="form-group mbn">
                        <div class="btn pull-right">
                          {{--<a href="#" class="btn btn-primary">Register</a>&nbsp;&nbsp;--}}
                          <button type="submit" class="btn btn-primary">
                            Hantar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-3"></div>
        </div>
      </div>
@stop
@section('script')
  {{--select2 start--}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

  <script type="text/javascript">
    $("#classroom_id").select2({
      tags: true,
      maximumSelectionLength: 3
    })
  </script>

  {{--select2 end--}}
@stop