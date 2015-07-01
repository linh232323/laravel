@extends('admin.admin')
@section('content')
<div class="panel-body">
          {!!Form::model($data,array('route'=>'admin.setting.store','id'=>'form-setting','files'=>true,'class'=>'form-horizontal'))!!}
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
            <li class=""><a href="#tab-local" data-toggle="tab">Local</a></li>
            <li class=""><a href="#tab-image" data-toggle="tab">Image</a></li>
            <li><a href="#tab-mail" data-toggle="tab">Mail</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab-general">
              <div class="content">
                <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-name">Store Name</label>
                  <div class="col-sm-10">
                    {!!Form::text('name', Input::old('name'), array("placeholder"=>"Store Name", "id"=>"input-name", "class"=>"form-control"))!!}
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-address">Address</label>
                  <div class="col-sm-10">
                    {!!Form::textarea('address', Input::old('address'), array("rows"="5", "placeholder"=>"Address", "id"=>"input-address", "class"=>"form-control"))!!}
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-telephone">Telephone</label>
                  <div class="col-sm-10">
                    {!!Form::text('telephone', Input::old('telephone'), array("placeholder"=>"Telephone", "id"=>"input-telephone", "class"=>"form-control"))!!}
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-fax">Fax</label>
                  <div class="col-sm-10">
                    {!!Form::text('fax', Input::old('fax'), array("placeholder"=>"Fax", "id"=>"input-fax", "class"=>"form-control"))!!}
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-image">Image</label>
                  @if(Input::old('log'))
                  <div class="col-sm-10"><a href="" id="thumb-image" data-toggle="image" class="img-thumbnail"><img src="{{URL::asset('public/admin/image/image.png'.Input::old('image'))}}" alt="" title="" data-placeholder="{{URL::asset('public/'.Input::old('image'))}}"></a>
                  @else
                  <div class="col-sm-10"><a href="" id="thumb-image" data-toggle="image" class="img-thumbnail"><img src="{{URL::asset('public/admin/image/image.png')}}" alt="" title="" data-placeholder="{{URL::asset('public/')}}"></a>
                  @endif
                    {!!Form::hidden('image', Input::old('image'))!!}
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-status">Status</label>
                  <div class="col-sm-10">
                    {!!Form::select('status', array('0' => 'Enabled', '1' => 'Disabled'),Input::old('status'),array( "id"=>"input-status", "class"=>"form-control"))!!}
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-local">
              <div class="content">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-zone">Region / State</label>
                  <div class="col-sm-10">
                    {!!Form::select('zone_id', $zone_id, Input::old('zone_id'), array( "id"=>"input-zone_id", "class"=>"form-control"))!!}
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-image">
                <div class="content">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-logo">Store Logo</label>
                  @if(Input::old('log'))
                  <div class="col-sm-10"><a href="" id="thumb-logo" data-toggle="image" class="img-thumbnail"><img src="{{URL::asset('public/admin/image/logo.png'.Input::old('logo'))}}" alt="" title="" data-placeholder="{{URL::asset('public/'.Input::old('logo'))}}"></a>
                  @else
                  <div class="col-sm-10"><a href="" id="thumb-logo" data-toggle="image" class="img-thumbnail"><img src="{{URL::asset('public/admin/image/logo.png')}}" alt="" title="" data-placeholder="{{URL::asset('public/')}}"></a>
                  @endif
                    {!!Form::hidden('logo', Input::old('logo'))!!}
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-icon">Icon</label>
                  @if(Input::old('log'))
                  <div class="col-sm-10"><a href="" id="thumb-icon" data-toggle="image" class="img-thumbnail"><img src="{{URL::asset('public/admin/image/icon.png'.Input::old('icon'))}}" alt="" title="" data-placeholder="{{URL::asset('public/'.Input::old('icon'))}}"></a>
                  @else
                  <div class="col-sm-10"><a href="" id="thumb-icon" data-toggle="image" class="img-thumbnail"><img src="{{URL::asset('public/admin/image/icon.png')}}" alt="" title="" data-placeholder="{{URL::asset('public/')}}"></a>
                  @endif
                    {!!Form::hidden('icon', Input::old('icon'))!!}
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-mail">
              <div class="content">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-mail-protocol"><span data-toggle="tooltip" title="" data-original-title="Only choose 'Mail' unless your host has disabled the php mail function.">Mail Protocol</span></label>
                  <div class="col-sm-10">
                    {!!Form::select('protocol', array("smtp"=>"SMTP" ,"mail"=>"Mail") , Input::old('protocol'), array("placeholder"=>"SMTP Hostname", "id"=>"input-protocol", "class"=>"form-control"))!!}
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-smtp-hostname"><span data-toggle="tooltip" title="" data-original-title="Add 'tls://' prefix if security connection is required. (e.g. tls://smtp.gmail.com).">SMTP Hostname</span></label>
                  <div class="col-sm-10">
                    {!!Form::text('smtp_hostname', Input::old('smtp_hostname'), array("placeholder"=>"SMTP Hostname", "id"=>"input-smtp_hostname", "class"=>"form-control"))!!}
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-smtp-username">SMTP Username</label>
                  <div class="col-sm-10">
                    {!!Form::text('smtp_username', Input::old('smtp_username'), array("placeholder"=>"SMTP Username", "id"=>"input-smtp_username", "class"=>"form-control"))!!}
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-smtp-password">SMTP Password</label>
                  <div class="col-sm-10">
                    {!!Form::text('smtp_password', Input::old('smtp_password'), array("placeholder"=>"SMTP Password", "id"=>"input-smtp_password", "class"=>"form-control"))!!}
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-smtp-port">SMTP Port</label>
                  <div class="col-sm-10">
                    {!!Form::text('smtp_port', Input::old('smtp_port'), array("placeholder"=>"SMTP Port", "id"=>"input-smtp_port", "class"=>"form-control"))!!}
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-smtp-timeout">SMTP Timeout</label>
                  <div class="col-sm-10">
                    {!!Form::text('smtp_timeout', Input::old('smtp_timeout'), array("placeholder"=>"SMTP Timeout", "id"=>"input-smtp_timeout", "class"=>"form-control"))!!}
                  </div>
                </div>
              </div>
            </div>
          </div>
          {!!Form::close()!!}
      </div>
@stop
