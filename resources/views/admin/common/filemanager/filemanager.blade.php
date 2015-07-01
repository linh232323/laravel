<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h4 class="modal-title">Image Manager</h4>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col-sm-5">
            <button type="button" href="{{URL::route('filemanager').$parent}}" data-toggle="" title="Parent" id="button-parent" class="btn btn-default"><i class="fa fa-level-up"></i></button> 
            <button type="button" href="{{URL::route('filemanager').$refresh}}" data-toggle="" title="Refresh" id="button-refresh" class="btn btn-default"><i class="fa fa-refresh"></i></button>
          	<button type="button" data-toggle="tooltip" title="Upload" id="button-upload" class="btn btn-primary"><i class="fa fa-upload"></i></button>
			<button class="btn btn-primary" type="button" id="button-folder" data-toggle="collapse" data-target="#createFolder" aria-expanded="false" aria-controls="createFolder">
			  <i class="fa fa-folder"></i>
			</button>
          	<button type="button" data-toggle="tooltip" title="" id="button-delete" class="btn btn-danger" data-original-title="Delete"><i class="fa fa-trash-o" ></i></button>
        </div>
        <div class="col-sm-7">
          	<div class="input-group">
	            <input type="text" name="search" value="" placeholder="Search.." class="form-control">
	            <span class="input-group-btn">
	            <button type="button" data-toggle="tooltip" title="" id="button-search" class="btn btn-primary" data-original-title="Search"><i class="fa fa-search"></i></button>
	            </span>
	        </div>
        </div>
      </div>
      <hr>
		@foreach (array_chunk($images, 4) as $image)
			<div class="row">
				@foreach ($image as $image)
					<div class="col-sm-3 text-center">
						@if ($image['type'] == 'directory')
							<div class="text-center"><a href="{{$image['href']}}" class="directory" style="vertical-align: middle;"><i class="fa fa-folder fa-5x"></i></a></div>
							<label>
							<input type="checkbox" name="path[]" value="{{$image['path']}}" />
							{{$image['name']}}</label>
						@endif
						@if ($image['type'] == 'image')
							<a href="{{$image['href']}}" class="thumbnail"><img src="{{URL::asset($image['thumb'])}}" alt="{{$image['name']}}" title="{{$image['name']}}" style="max-height: 80px;"/></a>
							<label>
							<input type="checkbox" name="path[]" value="{{$image['path']}}" />
							{{$image['name']}}</label>
						@endif
					</div>
				@endforeach
			</div>
			<br />
		@endforeach
  	</div>
    <div class="modal-footer">{!!$links->render()!!}</div>
  </div>
</div>
<div id="modal-image"></div>
<script type="text/javascript">
@if(!$slide)
$('a.thumbnail').on('click', function(e) {
	e.preventDefault();
	@if($thumb)
	$('#{{$thumb}}').find('img').attr('src', $(this).find('img').attr('src'));
	@endif
	@if($target)
	$('#{{$target}}').attr('value', $(this).parent().find('input').attr('value'));
	@else
	var range, sel = document.getSelection(); 
	if (sel.rangeCount) { 
		var img = document.createElement('img');
		img.src = $(this).attr('href');
	
		range = sel.getRangeAt(0); 
		range.insertNode(img); 
	}
	@endif

	$('#modal-image').modal('hide');
});
@else
$('a.thumbnail').on('click', function(e) {
	e.preventDefault();
	<?php if ($thumb) { ?>
	var image =  $(this).find('img').attr('src');
	<?php } ?>
	
	<?php if ($target) { ?>
	var value = $(this).parent().find('input').attr('value');
	<?php } else { ?>
	var range, sel = document.getSelection(); 
	
	if (sel.rangeCount) { 
		var img = document.createElement('img');
		img.src = $(this).attr('href');
	
		range = sel.getRangeAt(0); 
		range.insertNode(img); 
	}
	<?php } ?>

	addImage(image,value);
});
@endif
$('a.directory').on('click', function(e) {
	e.preventDefault();
	$('#modal-image').load($(this).attr('href'));
});
$('#button-parent').on('click', function(e) {
	e.preventDefault();
	$('#modal-image').load($(this).attr('href'));
});
$('#button-refresh').on('click', function(e) {
	e.preventDefault();
	$('#modal-image').load($(this).attr('href'));
});
$('.modal-footer a').on('click', function(e) {
	e.preventDefault();
	$('#modal-image').load($(this).attr('href'));
});
</script>
<script type="text/javascript">
$('#button-folder').popover({
	html: true,
	placement: 'bottom',
	trigger: 'click',
	title: 'Folder',
	content: function() {
		html  = '<div class="input-group">';
		html += '  <input type="text" name="folder" value="" placeholder="Folder" class="form-control">';
		html += '  <span class="input-group-btn"><button type="button" title="Folder" id="button-create" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></span>';
		html += '</div>';
		
		return html;	
	}
});
$('#button-folder').on('shown.bs.popover', function() {
	$('#button-create').on('click', function() {
		$.ajax({
			url: "{{URL::route('filemanager_folder')}}?directory={{$directory}}",
			type: 'post',		
			dataType: 'json',
			data: 'folder=' + encodeURIComponent($('input[name=\'folder\']').val())+"&_token={{ csrf_token() }}",
			beforeSend: function() {
				$('#button-create').prop('disabled', true);
			},
			complete: function() {
				$('#button-create').prop('disabled', false);
			},
			success: function(json) {
					alert(json.mess);
					$('.button-refresh').trigger('click');
			}
		});
	});	
});

$('#button-upload').on('click', function() {
	$('#form-upload').remove();
	$('body').prepend('<form action="{{URL::route("filemanager_upload")}}" enctype="multipart/form-data" id="form-upload" method="post" style="display: none;"><input type="file" name="file[]" value="" multiple/><input type="hidden" name="_token" value="{{csrf_token()}}"><input type="submit"/></form>');
	$('#form-upload input[type=\'file\']').trigger('click');
	timer = setInterval(function() {
		if ($('#form-upload input[type=\'file\']').val() != '') {
			clearInterval(timer);
			$.ajax({
				url: "{{URL::route('filemanager_upload')}}",
				type: 'post',		
				dataType: 'json',
				data: new FormData($('#form-upload')[0]),
				cache: false,
				contentType: false,
				processData: false,		
				beforeSend: function() {
					$('#button-upload i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
					$('#button-upload').prop('disabled', true);
				},
				complete: function() {
					$('#button-upload i').replaceWith('<i class="fa fa-upload"></i>');
					$('#button-upload').prop('disabled', false);
				},
				success: function(data) {
						alert(data.mess);
						$('#button-refresh').trigger('click');
				}
			});	
		}
	}, 500);
});
$('#button-delete').on('click', function(e) {
	if (confirm('Are you sure?')) {
		$.ajax({
			url: "{{URL::route('filemanager_delete')}}",
			type: 'get',		
			dataType: 'json',
			data: $('input[name^=\'path\']:checked'),
			beforeSend: function() {
				$('#button-delete').prop('disabled', true);
			},	
			complete: function() {
				$('#button-delete').prop('disabled', false);
			},		
			success: function(json) {
				alert(json.mess);
				$('#button-refresh').trigger('click');
			}
		});
	}
});

$('#button-search').on('click', function() {
	var url = "{{URL::route('filemanager')}}?directory={{$directory}}";
	var filter_name = $('input[name=\'search\']').val();
	
	if (filter_name) {
		url += '&filter_name=' + encodeURIComponent(filter_name);
	}
							
	<?php if ($thumb) { ?>
	url += '&thumb=' + '<?php echo $thumb; ?>';
	<?php } ?>
	
	<?php if ($target) { ?>
	url += '&target=' + '<?php echo $target; ?>';
	<?php } ?>
			
	$('#modal-image').load(url);
});
</script>
