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
            <form class="form-horizontal" method="POST" action="{!! url('attendance') !!}">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr >
                        <th class="text-center">#</th>
                        <th class="text-center">No IC</th>
                        <th class="text-center">Nama Pelajar</th>
                        <th class="text-center">Kehadiran</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no=0; ?>
                    <?php $no1=0; ?>
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
                                {{--hiddent input--}}

                                {!! csrf_field() !!}
                                <?php
                                $no1 += 1;
                                ?>

                                <input id="mark" type="hidden" placeholder="" class="form-control" name="teacher_id" value="1">
                                <input id="mark" type="hidden" placeholder="" class="form-control" name="tarikh" value="{{ $tarikh }}">
                                <input id="mark" type="hidden" placeholder="" class="form-control" name="student_id[<?php echo $no1; ?>]" value="{{ $student->id }}">

                                <div>
                                    <input type="radio" name="kedatangan[<?php echo $no1; ?>]" value="hadir">  Hadir
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="kedatangan[<?php echo $no1; ?>]" value="tidak hadir">  Tidak Hadir
                                </div>



                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="6">
                                <p class="alert alert-warning">Tiada data yang dijumpai ...</p>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>

                </table>
                <div class="btn pull-right">
                    <button type="submit" class="btn btn-primary">
                        Hantar</button>
                </div>

        </div>
    </div>
    </form>

@stop

{{--<input type="checkbox" name="kedatangan[]" value="hadir"> Hadir--}}
