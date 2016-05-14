@extends('layouts.master')

@section('title')
    Beri Tugasan
@endsection

@section('begin_title_left')
    Beri Tugasan
@endsection

@section('begin_title_right')
    <li><i class="fa fa-book"></i>&nbsp;Beri Tugasan</li>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-9">

                <div class="panel panel-blue" style="background:#fff;">
                    <div class="panel-heading">
                        Beri Tugasan</div>
                    <div class="panel-body pan">
                        <form class="form-horizontal" method="POST" action="{!! url('task') !!}">
                            <div class="form-body pal">
                                {!! csrf_field() !!}

                                <div class="form-group">
                                    <label for="teacher_id" class="col-md-3 control-label">
                                        Guru</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="teacher_id" type="text" placeholder="" class="form-control" name="teacher_id" value="1" ></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="classroom_subject_id" class="col-md-3 control-label">
                                       Kelas Subjek</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="classroom_subject_id" type="text" placeholder="" class="form-control" name="classroom_subject_id" ></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tajuk_tugasan" class="col-md-3 control-label">
                                        Tajuk Tugasan</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="tajuk_tugasan" type="text" placeholder="" class="form-control" name="tajuk_tugasan" ></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="penerangan_tugasan" class="col-md-3 control-label">
                                        Penerangan Tugasan</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <textarea id="penerangan_tugasan" type="text" placeholder="" class="form-control" name="penerangan_tugasan" ></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tarikh_beri" class="col-md-3 control-label">
                                        Tarikh Beri</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="tarikh_beri" type="date" placeholder="" class="form-control" name="tarikh_beri" ></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tarikh_hantar" class="col-md-3 control-label">
                                        Tarikh Hantar</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="tarikh_hantar" type="date" placeholder="" class="form-control" name="tarikh_hantar" ></div>
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
        $("#subject_id").select2({
            tags: true,
            maximumSelectionLength: 3
        })
    </script>

    <script type="text/javascript">
        $("#classroom_id").select2({
            tags: true,
            maximumSelectionLength: 3
        })
    </script>

    <script type="text/javascript">
        $("#teacher_id").select2({
            tags: true,
            maximumSelectionLength: 3
        })
    </script>
    {{--select2 end--}}
@stop
