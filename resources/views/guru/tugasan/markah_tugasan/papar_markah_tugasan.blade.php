@extends('layouts.master')

@section('title')
    Markah Tugasan
@stop

@section('begin_title_left')
    Markah Tugasan
@stop

@section('begin_title_right')
    <li><i class="fa fa-book"></i>&nbsp;Markah Tugasan</li>
@stop

@section('content')

    <div class="panel panel-blue" style="background:#FFF;">
        <div class="panel-heading">Markah Tugasan</div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{!! url('taskmark') !!}">
            <table class="table table-hover table-bordered">
                <thead>
                <tr >
                    <th class="text-center">#</th>
                    <th class="text-center">No IC</th>
                    <th class="text-center">Nama Pelajar</th>
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Tajuk Tugasan</th>
                    <th class="text-center">Markah</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=0; ?>
                @forelse ($students as $student)

                    <?php
                    $no += 1;
                    ?>

                    <tr>
                        <td class="text-center">
                            <?php echo $no; ?>
                        </td>
                        <td class="text-center">
                            {{ $student->no_kp_pelajar }}

                        </td>
                        <td class="text-center">
                            {{ $student->nama_pelajar }}
                        </td>
                        <td class="text-center">
                            {{ $student->nama_kelas }}
                        </td>
                        <td class="text-center">
                            {{ $student->tajuk_tugasan }}
                        </td>
                        <td class="text-center">
                            {{--hiddent input--}}

                                {!! csrf_field() !!}
                                <input id="mark" type="hidden" placeholder="" class="form-control" name="teacher_id" value="1">
                                <input id="mark" type="hidden" placeholder="" class="form-control" name="task_id" value="{{$id}}">
                                <input id="mark" type="hidden" placeholder="" class="form-control" name="student_id[]" value="{{ $student->student_id }}">

                                <input id="mark" type="text" placeholder="" class="form-control" name="mark[]" value="{{ $student->mark }}" disabled>

                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="6">
                            <p class="alert alert-warning">Tiada data murid yang dijumpai ...</p>
                        </td>
                    </tr>
                @endforelse
                </tbody>

            </table>
        </div>
    </div>
    </form>

    <!-- Step 1. Create a canvas on your web page. -->
    <canvas id="myChart" width="400" height="400"></canvas>


    <script>
        'use strict'

        $(function () {

            // Step 3. Create a data object
            var data = {
                labels: ["A", "B", "C", "D", "E", "F", "G"],
                datasets: [
                    {
                        label: "The First Dataset",
                        fillColor: "rgba(153,0,76,0.2)", // magenta
                        strokeColor: "rgba(153,0,76,1)", // magenta
                        pointColor: "rgba(153,0,76,1)", // magenta
                        pointStrokeColor: "#fff", // white
                        pointHighlightFill: "#fff", // white
                        pointHighlightStroke: "rgba(153,0,76,1)", // magenta
                        data: [{{ json_encode($users) }}, {{ json_encode($users2) }}, {{ json_encode($users3) }}, {{ json_encode($users4) }}, {{ json_encode($users5) }}, {{ json_encode($users6) }}, {{ json_encode($users7) }}]
                    },
                    {
                        label: "The Second dataset",
                        fillColor: "rgba(76,0,153,0.2)",
                        strokeColor: "rgba(76,0,153,1)",
                        pointColor: "rgba(76,0,153,1)",
                        pointStrokeColor: "#fff", // white
                        pointHighlightFill: "#fff", // white
                        pointHighlightStroke: "rgba(76,0,153,1)",
                        data: [28, 48, 40, 19, 86, 27, 90]
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


@stop

