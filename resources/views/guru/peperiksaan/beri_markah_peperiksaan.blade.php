@extends('layouts.master')

@section('title')
    Beri Markah Peperiksaan
@endsection

@section('begin_title_left')
    Beri Markah Peperiksaan
@endsection

@section('begin_title_right')
    <li><i class="fa fa-book"></i>&nbsp;Beri Markah Peperiksaan</li>
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
                        Beri Markah Peperiksaan</div>
                    <div class="panel-body pan">
                        <form class="form-horizontal" method="POST" action="{!! url('classsubjectexam') !!}">
                            <div class="form-body pal">
                                {!! csrf_field() !!}

                                {{--hidden input--}}
                                <input type="hidden" name="teacher_id" value="{{ $teacher_id }}">

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
                                    <label for="exam_id" class="col-md-3 control-label">
                                        Jenis Peperiksaan</label>
                                    <div class="col-md-9">

                                        <select class="form-control" id="exam_id" name="exam_id" >
                                        @foreach($exams as $exam)
                                        <option value="{{ $exam->id }}">{{ $exam->nama_peperiksaan }}</option>
                                        @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="sesi" class="col-md-3 control-label">
                                        Sesi</label>
                                    <div class="col-md-9">

                                        <select class="form-control" id="sesi" name="sesi_peperiksaan">
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                        </select>

                                    </div>
                                </div>

                            </div>
                            <div class="form-actions text-right pal">
                                <button type="submit" class="btn btn-primary">
                                    Hantar</button>
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

    <script type="text/javascript">
        $("#exam_id").select2({
            tags: true,
            maximumSelectionLength: 3
        })
    </script>

    {{--select2 end--}}
@stop
