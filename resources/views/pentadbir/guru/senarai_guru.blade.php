@extends('layouts.master')

@section('title')
    Senarai Guru
@endsection

@section('begin_title_left')
  Senarai Guru
@endsection

@section('begin_title_right')
  <li><i class="fa fa-user "></i>&nbsp;Senarai Guru&nbsp;&nbsp;
@endsection

@section('content')
      <div class="panel panel-blue" style="background:#FFF;">
        <div class="panel-heading">Senarai Guru</div>
        <div class="panel-body">
          <table class="table table-hover table-bordered">
            <thead>
            <tr >
              <th class="text-center">#</th>
              <th class="text-center">Nama Pendaftar</th>
              <th class="text-center">Nama Guru</th>
              <th class="text-center">Tindakkan</th>
            </tr>
            </thead>
            <tbody>
            <?php $no=0; ?>
            @forelse ($teachers as $teacher)

              <?php
              $no += 1;
              ?>

            <tr>
              <td class="text-center">
                <?php echo $no; ?>
              </td>
              <td class="text-center">
                {{ $teacher->admin->nama_admin }}

              </td>
              <td class="text-center">
                {{ $teacher->nama_guru }}
              </td>
              <td class="text-center">

                          <form action="{!! url('teacher/'.$teacher->id) !!}" method="POST" >
                              <a href="{!! url('teacher/'.$teacher->id) !!}" class="btn btn btn-info btn-sm"><i class="glyphicon glyphicon-info-sign"></i>  Maklumat Lengkap</a>
                              <a href="{!! url('teacher/'.$teacher->id.'/edit') !!}" type="button" class="btn btn btn-warning btn-sm"><i class="glyphicon glyphicon-edit"></i>  Kemaskini</a>
                              <button type="submit" onclick="clicked(event)" value="Submit" class="btn btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove-sign"></i>   Buang</button>
                              <input type="hidden" name="_method" value="DELETE">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          </form>

              </td>
            </tr>

            @empty
              <tr>
                <td colspan="4">
                  <p class="alert alert-warning">Tiada data yang dijumpai ...</p>
                </td>
              </tr>
            @endforelse
            </tbody>

          </table>
          <div class="text-center">
            {!! $teachers->render() !!}
          </div>



        </div>
      </div>
@stop
@section('script')
          <script>
              function clicked(e)
              {
                  if(!confirm('Are you sure?'))e.preventDefault();
              }
          </script>
          <script type="text/javascript">
              function clicked() {
                  if (confirm('Do you want to submit?')) {
                      yourformelement.submit();
                  } else {
                      return false;
                  }
              }
          </script>
<script type="text/javascript">
		(function() {

		  var laravel = {
		    initialize: function() {
		      this.methodLinks = $('a[data-method]');
		      this.token = $('a[data-token]');
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
		        'name': '_token',
		        'value': link.data('token')
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
