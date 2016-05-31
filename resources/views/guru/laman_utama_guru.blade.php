@extends('layouts.master')

@section('title')
  Laman Utama
@endsection

@section('begin_title_left')
  Laman Utama
@endsection

@section('begin_title_right_icon')
  <ol class="breadcrumb page-breadcrumb pull-right">
@endsection


@section('begin_title_right')
<li><i class="fa fa-home"></i>&nbsp;Laman Utama&nbsp;&nbsp;
@endsection

@section('content')


        <div id="sum_box" class="row mbl">
            <div class="col-sm-6 col-md-3 span3 wow bounceInLeft animated">
                <div class="panel profit db mbm">
                    <div class="panel-body">
                        <p class="icon">
                            <i class="icon fa fa-graduation-cap"></i>
                        </p>
                        <h4 class="value">
                            <span data-counter="" data-start="10" data-end="50" data-step="1" data-duration="0">
                            </span><span> {{ $total }} Org</span></h4>
                        <p class="description">
                            Bil Pelajar Diajar</p>
                        <div class="progress progress-sm mbn">
                            <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                style="width: 80%;" class="progress-bar progress-bar-success">
                                <span class="sr-only">80% Complete (success)</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 span3 wow bounceInLeft animated">
                <div class="panel income db mbm">
                    <div class="panel-body">
                        <p class="icon">
                            <i class="icon fa fa-tasks"></i>
                        </p>
                        <h4 class="value">
                            <span>{{ $tasks }} Bil</span></h4>
                        <p class="description">
                            Bilangan Tugasan</p>
                        <div class="progress progress-sm mbn">
                            <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                style="width: 60%;" class="progress-bar progress-bar-info">
                                <span class="sr-only">60% Complete (success)</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 span3 wow bounceInRight animated">
                <div class="panel task db mbm">
                    <div class="panel-body">
                        <p class="icon">
                            <i class="icon fa fa-institution"></i>
                        </p>
                        <h4 class="value">
                            <span>{{ $bil_classroom }} Kelas</span></h4>
                        <p class="description">
                            Bilangan Kelas</p>
                        <div class="progress progress-sm mbn">
                            <div role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                                style="width: 50%;" class="progress-bar progress-bar-danger">
                                <span class="sr-only">50% Complete (success)</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 span3 wow bounceInRight animated">
                <div class="panel visit db mbm">
                    <div class="panel-body">
                        <p class="icon">
                            <i class="icon fa fa-bullhorn"></i>
                        </p>
                        <h4 class="value">
                            <span>{{ $news }} Berita</span></h4>
                        <p class="description">
                            Bilangan Berita</p>
                        <div class="progress progress-sm mbn">
                            <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                style="width: 70%;" class="progress-bar progress-bar-warning">
                                <span class="sr-only">70% Complete (success)</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mbl">
            <div class="row">
                <div class="col-md-12 center text-center wow pulse animated" data-wow-iteration="3" data-wow-duration="0.15s" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 3; animation-name: pulse;">
                    <img src="{{ url('assets/intro/guru.png') }}" class="img-fluid img-responsive" alt="Responsive image">
                </div>
            </div>
            </br></br>
        </div>
        <div class="row">
        </div>
@stop
