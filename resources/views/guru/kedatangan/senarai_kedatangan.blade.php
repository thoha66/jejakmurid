@extends('layouts.master')

@section('title')
    Isi Kedatangan
@endsection

@section('begin_title_left')
    Isi Kedatangan
@endsection

@section('begin_title_right')
    <li><i class="fa fa-book"></i>&nbsp;Isi Kedatangan</li>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-9">

                <div class="panel panel-blue" style="background:#fff;">
                    <div class="panel-heading">
                        Isi Kedatangan</div>
                    <div class="panel-body pan">
                        <form class="form-horizontal" method="POST" action="{!! url('addattendance') !!}">
                            <div class="form-body pal">
                                {!! csrf_field() !!}

                                <div class="form-group">
                                    <label for="classroom_id" class="col-md-3 control-label">
                                        Nama Kelas</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user "></i>
                                            <input id="classroom_id" type="text" placeholder="" class="form-control"  value="{{ $teacher->classroom4->nama_kelas }}" disabled></div>
                                            <input type="hidden" name="guru_kelas_id" value="{{$teacher->guru_kelas_id}}" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tarikh" class="col-md-3 control-label">
                                        Tarikh Lahir</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-calendar"></i>
                                            <input id="tarikh" type="date" placeholder="" class="form-control" name="tarikh" >
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-actions text-right pal">
                                <button type="submit" class="btn btn-primary">
                                    Isi Kedatangan</button>
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
    {{--select2 end--}}
@stop
