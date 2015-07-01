@extends('admin.admin')
@section('content')
<div class="panel-body">
        <div class="well">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-name">Tour Name</label>
                <input type="text" name="filter_name" value="" placeholder="Tour Name" id="input-name" class="form-control" autocomplete="off"><ul class="dropdown-menu"></ul>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-status">Status</label>
                <select name="filter_status" id="input-status" class="form-control">
                  <option value="*"></option>
                                    <option value="1">Enabled</option>
                                                      <option value="0">Disabled</option>
                                  </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-status">Status</label>
                <select name="filter_status" id="input-status" class="form-control">
                  <option value="*"></option>
                                    <option value="1">Enabled</option>
                                                      <option value="0">Disabled</option>
                                  </select>
              </div>
            </div>
              <button type="button" id="button-filter" class="btn btn-primary pull-right"><i class="fa fa-search"></i> Filter</button>
          </div>
        </div>
          <div class="table-responsive">
                  <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td class="text-center">Image</td>
                  <td class="text-left"><a href="" class="asc">Tour Name</a>
                    </td><td class="text-left"><a href="">Status</a>
                    </td>
                  <td class="text-right">Action</td>
                </tr>
              </thead>
              <tbody>
                @foreach($lists as $list)
                <tr>
                  <td class="text-center"><img src="{{URL::asset('public/'.$list->image)}}" class="img-thumbnail">
                    </td>
                  <td class="text-left">{{$list->descriptions()->where('tourID',$list->id)->first()->name}}</td>
                  @if($list->status==0)
                  <td class="text-left">Enabled</td>
                  @else
                  <td class="text-left">Disabled</td>
                  @endif
                  <td class="text-right" width="150">
                    <span class="col-sm-5">
                      <a href="{{URL::route('admin.tour.edit',$list->id)}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                    </span>
                    <span class="col-sm-5">
                      {!!Form::open(array("route"=>array('admin.tour.destroy',$list->id),'method' => 'DELETE'))!!}
                      <button type="submit" href="{{URL::route('admin.tour.destroy',$list->id)}}" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Delete" onClick="return confirm('Are you sure')" id="detele"><i class="fa fa-trash-o"></i></button>
                      {!!Form::close()!!}
                    </span>
                  </td>
                </tr>
                @endforeach
                <tr>
                  <td colspan="4"><a href="{{URL::route('admin.tour.create')}}" data-toggle="tooltip" title="" class="btn btn-primary pull-right" data-original-title="Add New"><i class="fa fa-plus"> Add New</i></a></td>
                </tr>
              </tbody>
            </table>
          </div>
        <div class="row">
          <div class="col-sm-6 text-left"></div>
          <div class="col-sm-6 text-right">{!! $lists->render() !!}</div>
        </div>
      </div>
@stop