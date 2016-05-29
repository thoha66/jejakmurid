@extends('layouts.master')

@section('title')
    Sunting Markah Peperiksaan
@stop

@section('begin_title_left')
    Sunting Markah Peperiksaan
@stop

@section('begin_title_right')
    <li><i class="fa fa-book"></i>&nbsp; Sunting Markah Peperiksaan</li>
@stop

@section('content')

    @include('includes/error')
    @include('includes/success')
    @include('includes/not_success')

    <div class="panel panel-blue" style="background:#FFF;">
        <div class="panel-heading">Sunting Markah Peperiksaan</div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{!! url('classsubjectexam/'.$id) !!}">
                <input type="hidden" name="_method" value="PUT">
                {!! csrf_field() !!}
            <table class="table table-hover table-bordered">
                <thead>
                <tr >
                    <th class="text-center">#</th>
                    <th class="text-center">No IC</th>
                    <th class="text-center">Nama Pelajar</th>
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Subjek</th>
                    <th class="text-center">Peperiksaan</th>
                    <th class="text-center">Sesi</th>
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
                        <td class="text-center">
                            {{ $ClassSubjectExam->no_kp_pelajar }}

                        </td>
                        <td class="text-center">
                            {{ $ClassSubjectExam->nama_pelajar }}
                        </td>
                        <td class="text-center">
                            {{ $ClassSubjectExam->nama_kelas }}
                        </td>
                        <td class="text-center">
                            {{ $ClassSubjectExam->nama_subjek }}
                        </td>
                        <td class="text-center">
                            {{ $ClassSubjectExam->nama_peperiksaan }}
                        </td>
                        <td class="text-center">
                            {{ $ClassSubjectExam->sesi_peperiksaan }}
                        </td>
                        <td class="text-center">
                            {{--hiddent input--}}

                                {!! csrf_field() !!}

                                <input type="hidden" name="id[]" value="{{$ClassSubjectExam->id}}">
                                <input id="mark" type="text" placeholder="" class="form-control" name="markah_peperiksaan[]" value="{{ $ClassSubjectExam->markah_peperiksaan }}">

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