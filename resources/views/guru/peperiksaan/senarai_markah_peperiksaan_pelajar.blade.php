@extends('layouts.master')

@section('title')
    Senarai Peperiksaan
@endsection

@section('begin_title_left')
    Senarai Peperiksaan
@endsection

@section('begin_title_right')
    <li><i class="fa fa-book"></i>&nbsp;Senarai Peperiksaan</li>
@endsection

@section('content')
    <div class="panel panel-blue" style="background:#FFF;">
        <div class="panel-heading">Senarai Peperiksaan</div>
        <div class="panel-body">
            <table class="table table-hover table-bordered">
                <thead>
                <tr >
                    <th class="text-center">#</th>
                    <th class="text-center">Nama Peperiksaan</th>
                    <th class="text-center">Kelas </th>
                    <th class="text-center">Subjek</th>
                    <th class="text-center">Sesi</th>
                    <th class="text-center">Tindakkan</th>
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
                            {{--{{ $ClassSubjectExam->id }}--}}
                            {{ $ClassSubjectExam->nama_peperiksaan }}

                        </td>
                        <td class="text-center">
                            {{ $ClassSubjectExam->nama_kelas }}
                        </td>
                        <td class="text-center">
                            {{ $ClassSubjectExam->nama_subjek }}
                        </td>
                        <td class="text-center">
                            {{ $ClassSubjectExam->sesi_peperiksaan }}
                        </td>
                        <td class="text-center">

                            <form action="{!! url('classsubjectexam/'.$ClassSubjectExam->id) !!}" method="POST" >

                                {{--<input type="hidden" name="nama_peperiksaan" value="{{ $ClassSubjectExam->nama_peperiksaan }}">--}}
                                {{--<input type="hidden" name="nama_kelas" value="{{ $ClassSubjectExam->nama_kelas }}">--}}
                                {{--<input type="hidden" name="nama_subjek" value="{{ $ClassSubjectExam->nama_subjek }}">--}}
                                {{--<input type="hidden" name="sesi_peperiksaan" value="{{ $ClassSubjectExam->sesi_peperiksaan }}">--}}

                                <a href="{!! url('classsubjectexam/'.$ClassSubjectExam->id) !!}" class="btn btn btn-info btn-sm"><i class="glyphicon glyphicon-info-sign"></i>  Maklumat Lengkap</a>
                                <a href="{!! url('classsubjectexam/'.$ClassSubjectExam->id.'/edit') !!}" type="button" class="btn btn btn-warning btn-sm"><i class="glyphicon glyphicon-edit"></i>  Kemaskini</a>
                                <button type="submit" onclick="clicked(event)" value="Submit" class="btn btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove-sign"></i>   Buang</button>
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>

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
            <div class="text-center">
                {{--{!! $tasks->render() !!}--}}
            </div>



        </div>
    </div>
@stop
