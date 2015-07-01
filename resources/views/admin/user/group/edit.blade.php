@extends('admin.admin')
@section('content')
          {!!Form::model($data,array('route'=>array('admin.usergroup.update',$data->id),'method'=>'PUT','id'=>'form-user-group','class'=>'form-horizontal' ,'files'=>true))!!}
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name">User Group Name</label>
            <div class="col-sm-10">
              {!!Form::text('name',Input::old('name'),array("placeholder"=>"User Group Name", "id"=>"input-name", "class"=>"form-control"))!!}
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Access Permission</label>
            <div class="col-sm-10">
              <div class="well well-sm" style="height: 150px; overflow: auto;">
                <div class="checkbox">
                  <label>
                  <input type="checkbox" name="permission[access][]" value="user/user_permission">
                    user/user_permission                                      
                  </label>
                </div>
              </div>
              <a onclick="$(this).parent().find(':checkbox').prop('checked', true);">Select All</a> / <a onclick="$(this).parent().find(':checkbox').prop('checked', false);">Unselect All</a></div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Modify Permission</label>
            <div class="col-sm-10">
              <div class="well well-sm" style="height: 150px; overflow: auto;"><div class="checkbox">
                  <label>
                  <input type="checkbox" name="permission[modify][]" value="user/user_permission">
                    user/user_permission                                      
                  </label>
                </div>
              </div>
              <a onclick="$(this).parent().find(':checkbox').prop('checked', true);">Select All</a> / <a onclick="$(this).parent().find(':checkbox').prop('checked', false);">Unselect All</a></div>
          </div>
          <div class="pull-right">
            <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-save"> Save </i></button>
          </div>
          {!!Form::close()!!}
@stop