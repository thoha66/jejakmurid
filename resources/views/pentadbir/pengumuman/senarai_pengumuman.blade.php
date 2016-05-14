@extends('layouts.master')

@section('title')
  Daftar Guru
@endsection

@section('begin_title_left')
    Senarai Pengumuman
@endsection

@section('begin_title_right')
  <li><i class="fa fa-user "></i>&nbsp;Senarai Pengumuman&nbsp;&nbsp;
@endsection

@section('content')
      <div class="panel panel-blue" style="background:#FFF;">
        <div class="panel-heading">Senarai Pengumuman</div>
        <div class="panel-body">
          <table class="table table-hover table-bordered">
            <thead>
            <tr >
              <th class="text-center">#</th>
              <th class="text-center">Nama Pentadbir</th>
              <th class="text-center">Tajuk</th>
              <th class="text-center">Tindakkan</th>
            </tr>
            </thead>
            <tbody>
            <?php $no=0; ?>
            @forelse ($newses as $news)

              <?php
              $no += 1;
              ?>

            <tr>
              <td class="text-center">
                <?php echo $no; ?>
              </td>
              <td class="text-center">
                {{ $news->admin->nama_admin }}

              </td>
              <td class="text-center">
                {{ $news->tajuk }}
              </td>
              <td class="text-center">

                  <a href="{!! url('news/'.$news->id) !!}" class="btn btn btn-info btn-sm"><i class="glyphicon glyphicon-info-sign"></i>  Maklumat Lengkap</a>
                  <a href="{!! url('news/'.$news->id.'/edit') !!}" type="button" class="btn btn btn-warning btn-sm"><i class="glyphicon glyphicon-edit"></i>  Kemaskini</a>
                  <a href="{!! url('news/'.$news->id) !!}" class="btn btn-danger"  data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?"><i class="fa fa-trash-o"></i> Buang</a>


              </td>
            </tr>

            @empty
              <tr>
                <td colspan="4">
                  <p class="alert alert-warning">Tiada pengumuman yang dijumpai ...</p>
                </td>
              </tr>
            @endforelse
            </tbody>

          </table>
          <div class="text-center">
            {!! $newses->render() !!}
          </div>



        </div>
      </div>
@stop
@section('script')
<script>
    (function() {

        var laravel = {
            initialize: function() {
                this.methodLinks = $('a[data-method]');

                this.registerEvents();
            },

            registerEvents: function() {
                this.methodLinks.on('click', this.handleMethod);
            },

            handleMethod: function(e) {
                var link = $(this);
                var httpMethod = link.data('method').toUpperCase();
                var form;

                // If the data-method attribute is not PUT or DELETE,
                // then we don't know what to do. Just ignore.
                if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
                    return;
                }

                // Allow user to optionally provide data-confirm="Are you sure?"
                if ( link.data('confirm') ) {
                    if ( ! laravel.verifyConfirm(link) ) {
                        return false;
                    }
                }

                form = laravel.createForm(link);
                form.submit();

                e.preventDefault();
            },

            verifyConfirm: function(link) {
                return confirm(link.data('confirm'));
            },

            createForm: function(link) {
                var form =
                        $('<form>', {
                            'method': 'POST',
                            'action': link.attr('href')
                        });

                var token =
                        $('<input>', {
                            'type': 'hidden',
                            'name': 'csrf_token',
                            'value': '<?php echo csrf_token(); ?>'
                        });

                var hiddenInput =
                        $('<input>', {
                            'name': '_method',
                            'type': 'hidden',
                            'value': link.data('method')
                        });

                return form.append(token, hiddenInput)
                        .appendTo('body');
            }
        };

        laravel.initialize();

    })();
</script>
@stop
