@extends('admin.admin')
@section('content')
          {!!Form::open(array('route'=>'admin.user.store','id'=>'form-user','class'=>'form-horizontal' ,'files'=>true))!!}
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-username">Username</label>
            <div class="col-sm-10">
              {!!Form::text('username',Input::old('username'),array("placeholder"=>"Username", "id"=>"input-username", "class"=>"form-control"))!!}
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-user-group">User Group</label>
            <div class="col-sm-10">
              {!!Form::select('user_group_id', $groups ,Input::old('user_group_id'),array( "id"=>"input-user-group", "class"=>"form-control"))!!}
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
            <div class="col-sm-10">
              {!!Form::text('firstname',Input::old('firstname'),array("placeholder"=>"First Name", "id"=>"input-firstname", "class"=>"form-control"))!!}
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
            <div class="col-sm-10">
              {!!Form::text('lastname',Input::old('lastname'),array("placeholder"=>"Last Name", "id"=>"input-lastname", "class"=>"form-control"))!!}
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
            <div class="col-sm-10">
              {!!Form::text('email',Input::old('email'),array("placeholder"=>"E-Mail", "id"=>"input-email", "class"=>"form-control"))!!}
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-image">Image</label>
            <div class="col-sm-10"><a href="" id="thumb-image" data-toggle="image" class="img-thumbnail"><img src="http://localhost/opencart/image/cache/no_image-100x100.png" alt="" title="" data-placeholder="http://localhost/opencart/image/cache/no_image-100x100.png"></a>
              <input type="hidden" name="image" value="" id="input-image">
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-password">Password</label>
            <div class="col-sm-10">
              {!!Form::password('password',array("placeholder"=>"Password", "id"=>"input-password", "class"=>"form-control"))!!}
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-confirm">Confirm</label>
            <div class="col-sm-10">
              {!!Form::password('confirm',array("placeholder"=>"Confirm", "id"=>"input-confirm", "class"=>"form-control"))!!}
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-status">Status</label>
            <div class="col-sm-10">
              {!!Form::select('status', array('0' => 'Enabled', '1' => 'Disabled'),Input::old('status'),array( "id"=>"input-status", "class"=>"form-control"))!!}
            </div>
          </div>
          <div class="pull-right">
            <button type="submit" form="form-user" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Save"><i class="fa fa-save"> Save </i></button>
          </div>
          {!!Form::close()!!}
@stop