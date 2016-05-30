@extends('layouts.master')

@section('title')
    Kalalaluan Guru
@endsection

@section('begin_title_left')
    Kalalaluan Guru
@endsection

@section('begin_title_right')
    <li><i class="fa fa-user "></i>&nbsp;Kalalaluan Guru&nbsp;&nbsp;
        @endsection

        @section('content')
            @include('includes/error')
            @include('includes/success')
            @include('includes/not_success')
            <div class="row">

                <div class="col-lg-2"></div>
                <div class="col-lg-9">
                    <div class="panel panel-blue" style="background:#fff;">
                        <div class="panel-heading">
                            Kalalaluan Guru
                        </div>
                        <div class="panel-body pan">
                            <form class="form-horizontal" action="{!! url('AdminProfilePasswordUpdate') !!}" method="POST" >
                                <div class="form-body pal">

                                    <input type="hidden" name="_method" value="PUT">
                                    {!! csrf_field() !!}

                                    <div class="form-group">
                                        <label for="password" class="col-md-3 control-label">
                                            Katalaluan </label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <i class="fa fa-hashtag"></i>
                                                <input id="password" type="password" placeholder="" class="form-control" name="password" required>
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