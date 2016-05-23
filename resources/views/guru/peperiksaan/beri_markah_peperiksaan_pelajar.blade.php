@extends('layouts.master')

@section('title')
    Beri Markah Tugasan
@stop

@section('begin_title_left')
    Beri Markah Tugasan
@stop

@section('begin_title_right')
    <li><i class="fa fa-book"></i>&nbsp; Beri Markah Tugasan</li>
@stop

@section('content')

    <div class="panel panel-blue" style="background:#FFF;">
        <div class="panel-heading">Beri Markah Tugasan</div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{!! url('addexammarks') !!}">
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
                            {{ $student->classroom->nama_kelas }}
                        </td>
                        <td class="text-center">
                            {{ $ClassroomSubject->subject->nama_subjek }}
                        </td>
                        <td class="text-center">
                            {{--hiddent input--}}

                                {!! csrf_field() !!}
                                <input id="mark" type="hidden" placeholder="" class="form-control" name="subject_id" value="{{ $ClassroomSubject->subject->id }}">
                                <input id="mark" type="hidden" placeholder="" class="form-control" name="exam_id" value="{{ $exam_id }}">
                                <input id="mark" type="hidden" placeholder="" class="form-control" name="teacher_id" value="{{ $teacher_id }}">
                                <input id="mark" type="hidden" placeholder="" class="form-control" name="classroom_subject_id" value="{{ $classroom_subject_id }}">
                                <input id="mark" type="hidden" placeholder="" class="form-control" name="sesi_peperiksaan" value="{{ $sesi_peperiksaan }}">
                                <input id="mark" type="hidden" placeholder="" class="form-control" name="student_id[]" value="{{ $student->id }}">

                                <input id="mark" type="text" placeholder="" class="form-control" name="markah_peperiksaan[]">

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