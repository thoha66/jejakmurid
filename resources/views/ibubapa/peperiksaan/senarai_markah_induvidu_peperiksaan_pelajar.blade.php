@extends('layouts.master')

@section('title')
  Keputusan Peperiksaan {{ $sesi_peperiksaan }}
@endsection

@section('begin_title_left')
  Keputusan Peperiksaan {{ $sesi_peperiksaan }}
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Keputusan Peperiksaan </li>
@endsection

@section('content')
  <div class="panel panel-blue" style="background:#FFF;">
    <div class="panel-heading">{{ $nama_peperiksaan }}</div>
    <div class="panel-body">
      <table class="table table-hover table-bordered">
        <thead>
        <tr>
          <th colspan="2">
            NAMA :&nbsp;&nbsp;&nbsp;{{ $student->nama_pelajar }}
          </th>
          <th>
            KELAS:&nbsp;&nbsp;{{ $student->classroom->nama_kelas }}
          </th>
        </tr>
        <tr >
          <th class="text-center">#</th>
          <th>Nama Subjek</th>
          <th class="text-center">Markah</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=0; ?>
        @forelse ($ClassSubjectExams as $ClassSubjectExam)

          <?php
          $no += 1;
          ?>

          <tr>
            <td class="text-center">
              <?php echo $no; ?>
            </td>
            <td>
              {{ $ClassSubjectExam->nama_subjek  }}
            </td>
            <td class="text-center">
              {{ $ClassSubjectExam->markah_peperiksaan  }}/100
              {{--<form action="{!! url('CaretakerStudentExamDetails') !!}" method="POST" >--}}
                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                {{--hidden input--}}
                {{--<input type="hidden" name="id" value="{{ $exam->id }}">--}}
                {{--<input type="hidden" name="student_id" value="{{ $student_id }}">--}}
                {{--<input type="hidden" name="sesi_peperiksaan" value="{{ $sesi_peperiksaan }}">--}}

                {{--<button  class="btn btn btn-info btn-sm"><i class="glyphicon glyphicon-info-sign"></i>  Maklumat Lengkap</button>--}}
              {{--</form>--}}

            </td>
          </tr>

        @empty
          <tr>
            <td colspan="5">
              <p class="alert alert-warning">Tiada data yang dijumpai ...</p>
            </td>
          </tr>
        @endforelse
        </tbody>

      </table>
      {{--<div class="text-center">--}}
        {{--{!! $tasks->render() !!}--}}
      {{--</div>--}}

      {{--Start canves--}}
        <div class="row">
        <div class="col-md-4"></div>

        <div class="col-md-4">
        <div class="section-text">
        <div class="canvas-holder ">
        <!-- Step 1. Create a canvas on your web page. -->
        <canvas id="myChart" width="400" height="400"></canvas>
        </div>
        </div>
        </div>

        <div class="col-md-4"></div>
        </div>

        <div class="text-center">
          <p><b><font class="purple"> . . . </font>  Purata Markah Setiap Subjek Dalam Kelas <br><font class="wine"> . . . </font> Gread Skor Pelajar </b></p>
        </div>
      {{--End canves--}}



      <script>
        'use strict'

        $(function () {

        // Step 3. Create a data object
        var data = {
        labels: [
          @foreach ($SubjectNames as $SubjectName)
          "{{ $SubjectName }}",
          @endforeach
          ],
        datasets: [
        {
        label: "The First Dataset",
        fillColor: "rgba(153,0,76,0.2)", // magenta
        strokeColor: "rgba(153,0,76,1)", // magenta
        pointColor: "rgba(153,0,76,1)", // magenta
        pointStrokeColor: "#fff", // white
        pointHighlightFill: "#fff", // white
        pointHighlightStroke: "rgba(153,0,76,1)", // magenta
          data: [
            @foreach ($ClassSubjectExams as $ClassSubjectExam)
            {{ $ClassSubjectExam->markah_peperiksaan }},
            @endforeach
          ]
        },
        {
        label: "The Second dataset",
        fillColor: "rgba(76,0,153,0.2)",
        strokeColor: "rgba(76,0,153,1)",
        pointColor: "rgba(76,0,153,1)",
        pointStrokeColor: "#fff", // white
        pointHighlightFill: "#fff", // white
        pointHighlightStroke: "rgba(76,0,153,1)",
        data: [
          @foreach ($AvgBySubjects as $AvgBySubject)
          {{ $AvgBySubject }},
          @endforeach
        ]
        }
        ]
        };

        // Step 2. Get the context of the canvas element we want to select
        var ctx = document.getElementById("myChart").getContext("2d");
        var myNewChart = new Chart(ctx).Line(data, {
        ///Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines : true,

        //String - Colour of the grid lines
        scaleGridLineColor : "rgba(0,0,0,.05)",

        //Number - Width of the grid lines
        scaleGridLineWidth : 1,

        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,

        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines: true,

        //Boolean - Whether the line is curved between points
        bezierCurve : true,

        //Number - Tension of the bezier curve between points
        bezierCurveTension : 0.4,

        //Boolean - Whether to show a dot for each point
        pointDot : true,

        //Number - Radius of each point dot in pixels
        pointDotRadius : 4,

        //Number - Pixel width of point dot stroke
        pointDotStrokeWidth : 1,

        //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
        pointHitDetectionRadius : 20,

        //Boolean - Whether to show a stroke for datasets
        datasetStroke : true,

        //Number - Pixel width of dataset stroke
        datasetStrokeWidth : 2,

        //Boolean - Whether to fill the dataset with a colour
        datasetFill : true,
        });

        });
        </script>

    </div>
  </div>
@stop
