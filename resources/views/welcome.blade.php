@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row center">
        {{--<div class="col-md-3"></div>--}}
        <div class="col-md-9 col-md-offset-3">

                {{--<div class="col-md-2"></div>--}}
                <div class="wow pulse animated" data-wow-iteration="3" data-wow-duration="0.15s" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 3; animation-name: pulse;">
                    <img src="{{ url('assets/intro/main.png') }}" class="img-fluid img-responsive " alt="Responsive image" height="70%" width="70%">
                </div>
                {{--<div class="col-md-2"></div>--}}
        </div>
        {{--<div class="col-md-3"></div>--}}
    </div>

</div>
@endsection
