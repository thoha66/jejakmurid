@extends('layouts.master')

@section('title')
    Daftar Kelas Subjek
@endsection

@section('begin_title_left')
    Daftar Kelas Subjek
@endsection

@section('begin_title_right')
    <li><i class="fa fa-book"></i>&nbsp;Daftar Kelas Subjek</li>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-9">

                <div class="panel panel-blue" style="background:#fff;">
                    <div class="panel-heading">
                        Daftar Kelas Subjek</div>
                    <div class="panel-body pan">
                        <form class="form-horizontal" method="POST" action="{!! url('classroomsubject') !!}">
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

                                        <select class="form-control" id="subject_id" name="subject_id" multiple>
                                            @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->nama_subjek }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="classroom_id" class="col-md-3 control-label">
                                        Nama Kelas</label>
                                    <div class="col-md-9">

                                        <select class="form-control" id="classroom_id" name="classroom_id" >
                                            @foreach($classrooms as $classroom)
                                                <option value="{{ $classroom->id }}">{{ $classroom->nama_kelas }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="teacher_id" class="col-md-3 control-label">
                                        Nama Guru</label>
                                    <div class="col-md-9">

                                        <select class="form-control" id="teacher_id" name="teacher_id" >
                                            @foreach($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">{{ $teacher->nama_guru }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="sesi" class="col-md-3 control-label">
                                        Sesi</label>
                                    <div class="col-md-9">

                                        <select class="form-control" id="sesi" name="sesi">
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                        </select>

                                    </div>
                                </div>

                            </div>
                            <div class="form-actions text-right pal">
                                <button type="submit" class="btn btn-primary">
                                    Daftar</button>
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
        $("#subject_id").select2({
            placeholder: "Pilih subjek",
            allowClear: true
        });
    </script>

    <script type="text/javascript">
//        $("#classroom_id").select2({
//            tags: true,
//            maximumSelectionLength: 3
//        })
        $("#classroom_id").select2({
            placeholder: "Pilih kelas",
            allowClear: true
        });
    </script>

    <script type="text/javascript">
        $("#teacher_id").select2({
            placeholder: "Pilih guru",
            allowClear: true
        });
    </script>
    {{--select2 end--}}
@stop
