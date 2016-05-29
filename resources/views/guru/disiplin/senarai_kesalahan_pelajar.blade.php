@extends('layouts.master')

@section('title')
  Senarai Kesalahan Pelajar
@endsection

@section('begin_title_left')
  Senarai Kesalahan Pelajar
@endsection

@section('begin_title_right')
  <li><i class="fa fa-book"></i>&nbsp;Senarai Kesalahan Pelajar</li>
@endsection

@section('content')
  @include('includes/error')
  @include('includes/success')
  @include('includes/not_success')
  <div class="panel panel-blue" style="background:#FFF;">
    <div class="panel-heading">Senarai Kesalahan Pelajar</div>
    <div class="panel-body">
      <table class="table table-hover table-bordered">
        <thead>
        <tr >
          <th class="text-center">#</th>
          <th class="text-center">Nama Pelajar</th>
          <th class="text-center">IC Pelajar</th>
          <th class="text-center">Kesalahan</th>
          <th class="text-center">Tindakkan</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=0; ?>
        @forelse ($StudentOffenses as $StudentOffense)

          <?php
          $no += 1;
          ?>

          <tr>
            <td class="text-center">
              <?php echo $no; ?>
            </td>
            <td class="text-center">
              {{ $StudentOffense->student->nama_pelajar }}

            </td>
            <td class="text-center">
              {{ $StudentOffense->student->no_kp_pelajar  }}
            </td>
            <td class="text-center">
              {{ $StudentOffense->offense->nama_kesalahan }}
            </td>
            <td class="text-center">

              {{--<form action="{!! url('studentoffense/'.$StudentOffense->id) !!}" method="POST" >--}}
                {{--<a href="{!! url('studentoffense/'.$StudentOffense->id) !!}" class="btn btn btn-info btn-sm"><i class="glyphicon glyphicon-info-sign"></i>  Maklumat Lengkap</a>--}}
              <a href="{!! url('studentoffense/'.$StudentOffense->id.'/edit') !!}" type="button" class="btn btn btn-warning btn-sm"><i class="glyphicon glyphicon-edit"></i>  Kemaskini</a>
              <a href="{!! url('studentoffense/'.$StudentOffense->id) !!}" class="btn btn-danger"  data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?"><i class="fa fa-trash-o"></i> Buang</a>

              {{--<button type="submit" onclick="clicked(event)" value="Submit" class="btn btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove-sign"></i>   Buang</button>--}}
                {{--<input type="hidden" name="_method" value="DELETE">--}}
                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
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
      <div class="text-center">
        {!! $StudentOffenses->render() !!}
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