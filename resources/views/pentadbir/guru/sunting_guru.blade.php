@extends('layouts.master')

@section('title')
  Butiran Guru
@endsection

@section('begin_title_left')
  Butiran Guru
@endsection

@section('begin_title_right')
  <li><i class="fa fa-user "></i>&nbsp;Butiran Guru&nbsp;&nbsp;
    @endsection

    @section('content')

        <div class="row">

          <div class="col-lg-2"></div>
          <div class="col-lg-9">
            <div class="panel panel-grey">
              <div class="panel-heading">
                Butiran Guru
              </div>
              <div class="panel-body pan">
                <form class="form-horizontal" action="{!! url('teacher/'.$teacher->id) !!}" method="POST" >
                  <div class="form-body pal">

                    <input type="hidden" name="_method" value="PUT">
                    {!! csrf_field() !!}

                    <div class="form-group">
                      <label for="inputKp" class="col-md-3 control-label">
                        Kad Pengenalan
                      </label>
                      <div class="col-md-9">
                        <div class="input-icon right">
                          <i class="fa fa-credit-card "></i>
                          <input id="inputKp" type="text" placeholder="" class="form-control" name="no_kp_guru" value="{{ $teacher->no_kp_guru }} " >
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputNama" class="col-md-3 control-label">
                        Nama Guru</label>
                      <div class="col-md-9">
                        <div class="input-icon right">
                          <i class="fa fa-user "></i>
                          <input id="inputNama" type="text" placeholder="" class="form-control" name="nama_guru" value="{{ $teacher->nama_guru }}" disabled>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="classroom_id" class="col-md-3 control-label">
                        Guru Kelas</label>
                      <div class="col-md-9">

                        <select class="form-control" id="classroom_id" name="guru_kelas_id" >
                          @foreach($classrooms as $classroom)
                            <option value="{{ $classroom->id }}">{{ $classroom->nama_kelas }}</option>
                          @endforeach
                        </select>

                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputJG" class="col-md-3 control-label">
                        Jenis Guru</label>
                      <div class="col-md-9">

                        <select class="form-control" id="inputJG" name="jenis_guru">
                          <option value="guru biasa">Guru Biasa</option>
                          <option value="guru kelas">Guru Kelas</option>
                          <option value="guru disiplin">Guru Disiplin</option>
                        </select>

                      </div>
                    </div>

                    <div class="form-group">
                      <label for="no_tel" class="col-md-3 control-label">
                        No Tel</label>
                      <div class="col-md-9">
                        <div class="input-icon right">
                          <i class="fa fa-volume-control-phone"></i>
                          <input id="no_tel" type="text" placeholder="" class="form-control" name="no_tel_guru" value="{{ $teacher->no_tel_guru }}" disabled>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="no_hp" class="col-md-3 control-label">
                        No HP</label>
                      <div class="col-md-9">
                        <div class="input-icon right">
                          <i class="fa fa-mobile"></i>
                          <input id="no_hp" type="text" placeholder="" class="form-control" name="no_hp_guru" value="{{ $teacher->no_hp_guru }}" disabled>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="tarikh_lahir" class="col-md-3 control-label">
                        Tarikh Lahir</label>
                      <div class="col-md-9">
                        <div class="input-icon right">
                          <i class="fa fa-calendar"></i>
                          <input id="tarikh_lahir" type="date" placeholder="" class="form-control" name="tarikh_lahir_guru" value="{{ $teacher->tarikh_lahir_guru }}" disabled>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="alamat" class="col-md-3 control-label">
                        Alamat</label>
                      <div class="col-md-9">
                        <div class="input-icon right">
                          <i class="fa fa-home"></i>
                          <input id="alamat" type="text" placeholder="" class="form-control" name="alamat_guru" value="{{ $teacher->alamat_guru }}" disabled>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="poskod" class="col-md-3 control-label">
                        Poskod</label>
                      <div class="col-md-9">
                        <div class="input-icon right">
                          <i class="fa fa-braille"></i>
                          <input id="poskod" type="text" placeholder="" class="form-control" name="poskod_guru" value="{{ $teacher->poskod_guru }}" disabled>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="email" class="col-md-3 control-label">
                        Email</label>
                      <div class="col-md-9">
                        <div class="input-icon right">
                          <i class="fa fa-location-arrow"></i>
                          <input id="email" type="text" placeholder="" class="form-control" name="email_guru" value="{{ $teacher->email_guru }}" disabled>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="umur" class="col-md-3 control-label">
                        Umur</label>
                      <div class="col-md-9">
                        <div class="input-icon right">
                          <i class="fa fa-hashtag"></i>
                          <input id="umur" type="text" placeholder="" class="form-control" name="umur_guru" value="{{ $teacher->umur_guru }}" disabled>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="jantina" class="col-md-3 control-label">
                        Jantina</label>
                      <div class="col-md-9">
                        <div class="input-icon right">
                          <i class="fa fa-venus-mars"></i>
                          <input id="jantina" type="text" placeholder="" class="form-control" name="jantina_guru" value="{{ $teacher->jantina_guru }}" disabled>
                        </div>
                      </div>
                    </div>

                    <div class="form-actions pal">
                      <div class="form-group mbn">
                        <div class="btn pull-right">

                          <button type="submit" class="btn btn btn-warning btn-lg"><i class="glyphicon glyphicon-edit"></i>  Kemaskini</button>
                          <button type="reset" value="Reset" class="btn btn btn-danger btn-lg"><i class="glyphicon glyphicon-remove-sign"></i>  Semula</button>

                        </div>
                      </div>
                    </div>
                  </div>
                </form>

              </div>
            </div>
          </div>
          <div class="col-lg-1"></div>
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