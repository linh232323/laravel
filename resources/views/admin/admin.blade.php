<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="UTF-8">
  <title>{{$title}}</title>
  {!!Html::style('public/admin/css/stylesheet.css')!!}
  {!!Html::style('public/css/font-awesome/css/font-awesome.css')!!}
  {!!Html::style('public/css/font-awesome/css/font-awesome.min.css')!!}
  {!!Html::style('public/css/bootstrap.min.css')!!}
  {!!Html::script('public/js/jquery.js')!!}
  {!!Html::script('public/js/common.js')!!}
  {!!Html::script('public/js/bootstrap.min.js')!!}
  
</head>
<body>
  <div id="container">
      @include('admin.template.header')
      @include('admin.template.columnleft')
      <div id="content">
        <div class="page-header">
          <div class="container-fluid">
            <h1>{{$title}}</h1>
          </div>
        </div>
        <div class="container-fluid">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-list"></i>{{$title}}</h3>
            </div>
            <div class="panel-body">
            @if(Session::has("error"))
            <div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>
              {{Session::get("error")}}
            </div>  
            @endif
            @if(Session::has("success"))
            <div class="alert alert-success">
              <i class="fa fa-check-circle"></i> {{Session::get("success")}}<button type="button" class="close" data-dismiss="alert">×</button>
            </div>
            @endif
              @yield('content')
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
      // Override summernotes image manager
      $('button[data-event=\'showImageDialog\']').attr('data-toggle', 'image').removeAttr('data-event');
      $(document).delegate('button[data-toggle=\'image\']', 'click', function() {
        $('#modal-image').remove();
        $(this).parents('.note-editor').find('.note-editable').focus();
        $.ajax({
          url: "{{URL::route('filemanager')}}",
          dataType: 'html',
          beforeSend: function() {
            $('#button-image i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
            $('#button-image').prop('disabled', true);
          },
          complete: function() {
            $('#button-image i').replaceWith('<i class="fa fa-upload"></i>');
            $('#button-image').prop('disabled', false);
          },
          success: function(html) {
            $('body').append('<div id="modal-image" class="modal">' + html + '</div>');
            $('#modal-image').modal('show');
          }
        }); 
      });
      // Image Manager
      $(document).delegate('a[data-toggle=\'image\']', 'click', function(e) {
        e.preventDefault();
        var element = this;
        $(element).popover({
          html: true,
          placement: 'right',
          trigger: 'manual',
          content: function() {
            return '<button type="button" id="button-image" class="btn btn-primary"><i class="fa fa-pencil"></i></button> <button type="button" id="button-clear" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>';
          }
        });
        $(element).popover('toggle');   
        $('#button-image').on('click', function() {
          $('#modal-image').remove();
          $.ajax({
            url: "{{URL::route('filemanager')}}" + '?target=' + $(element).parent().find('input').attr('id') + '&thumb=' + $(element).attr('id'),
            dataType: 'html',
            beforeSend: function() {
              $('#button-image i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
              $('#button-image').prop('disabled', true);
            },
            complete: function() {
              $('#button-image i').replaceWith('<i class="fa fa-upload"></i>');
              $('#button-image').prop('disabled', false);
            },
            success: function(html) {
              $('body').append('<div id="modal-image" class="modal">' + html + '</div>');
              $('#modal-image').modal('show');
            }
          });
          $(element).popover('hide');
        });
        $('#button-clear').on('click', function() {
          $(element).find('img').attr('src', $(element).find('img').attr('data-placeholder'));
          
          $(element).parent().find('input').attr('value', '');
      
          $(element).popover('hide');
        });
      });
      $(document).delegate('#button-slide', 'click', function(e) {
        e.preventDefault();
        var element = this;
        $(element).popover({
          html: true,
          placement: 'right',
          trigger: 'manual',
          content: function() {
            return '<button type="button" id="button-image" class="btn btn-primary"><i class="fa fa-pencil"></i></button> <button type="button" id="button-clear" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>';
          }
        });
        $(element).popover('toggle');   
          $('#modal-image').remove();
          $.ajax({
            url: "{{URL::route('filemanager')}}" + '?target=' + $(element).parent().find('input').attr('id') + '&thumb=' + $(element).attr('id') + '&slide=1',
            dataType: 'html',
            beforeSend: function() {
              $('#button-image i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
              $('#button-image').prop('disabled', true);
            },
            complete: function() {
              $('#button-image i').replaceWith('<i class="fa fa-upload"></i>');
              $('#button-image').prop('disabled', false);
            },
            success: function(html) {
              $('body').append('<div id="modal-image" class="modal">' + html + '</div>');
              $('#modal-image').modal('show');
            }
          });
          $(element).popover('hide');
      });
      </script>
      @yield('script')
      @include('admin.template.footer')
  </div>
</body>
</html>