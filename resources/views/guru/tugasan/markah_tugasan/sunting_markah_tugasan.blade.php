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
    @include('includes/error')
    @include('includes/success')
    @include('includes/not_success')

    <div class="panel panel-blue" style="background:#FFF;">
        <div class="panel-heading">Markah Tugasan</div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{!! url('taskmark/'.$id) !!}" >
                <input type="hidden" name="_method" value="PUT">
                {!! csrf_field() !!}
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
                                <input id="mark" type="hidden" placeholder="" class="form-control" name="id[]" value="{{ $student->id }}">
                                <input id="mark" type="hidden" placeholder="" class="form-control" name="teacher_id" value="{{ $teacher_id }}">
                                <input id="mark" type="hidden" placeholder="" class="form-control" name="task_id" value="{{ $id }}">
                                <input id="mark" type="hidden" placeholder="" class="form-control" name="student_id[]" value="{{ $student->student_id }}">

                                <input id="mark" type="text" placeholder="" class="form-control" name="mark[]" value="{{ $student->mark }}">

                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="6">
                            <p class="alert alert-warning">Tiada pengumuman yang dijumpai ...</p>
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