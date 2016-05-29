@extends('layouts.master')

@section('title')
  Sunting Tugasan
@endsection

@section('begin_title_left')
  Sunting Tugasan
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Sunting Tugasan</li>
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
            Sunting Tugasan</div>
          <div class="panel-body pan">
            <form class="form-horizontal" action="{!! url('task/'.$task->id) !!}" method="POST" >
              <div class="form-body pal">
                <input type="hidden" name="_method" value="PUT">
                {!! csrf_field() !!}
                <div class="form-group">
                  <label for="teacher_id" class="col-md-3 control-label">
                    Nama Guru</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="teacher_id" type="text" placeholder="" class="form-control"   value="{{ $task->teacher->nama_guru }}" disabled>
                      <input type="hidden" name="teacher_id"  value="{{ $task->teacher_id }}" >
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="classroom_subject_id" class="col-md-3 control-label">
                    Nama Kelas Subjek</label>
                  <div class="col-md-9">

                    <select class="form-control" id="classroom_subject_id" name="classroom_subject_id" >
                      @foreach($classroomsubjects as $classroomsubject)
                        <option value="{{ $classroomsubject->id }}">{{ $classroomsubject->classroom->nama_kelas }} : {{ $classroomsubject->subject->nama_subjek }}</option>
                      @endforeach
                    </select>

                  </div>
                </div>

                <div class="form-group">
                  <label for="tajuk_tugasan" class="col-md-3 control-label">
                    Tajuk Tugasan</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <input id="tajuk_tugasan" type="text" placeholder="" class="form-control" name="tajuk_tugasan" value="{{ $task->tajuk_tugasan }}" ></div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="penerangan_tugasan" class="col-md-3 control-label">
                    Penerangan Tugasan</label>
                  <div class="col-md-9">
                    <div class="input-icon right">
                      <i class="fa fa-user "></i>
                      <textarea id="penerangan_tugasan" type="text" placeholder="" class="form-control" name="penerangan_tugasan" >{{ $task->penerangan_tugasan }} </textarea>
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
@section('script')
  {{--select2 start--}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
  <script type="text/javascript">
    $("#classroom_subject_id").select2({
      tags: true,
      maximumSelectionLength: 3
    })
  </script>

  {{--select2 end--}}
@stop