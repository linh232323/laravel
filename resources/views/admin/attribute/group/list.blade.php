@extends('admin.admin')
@section('content')
<div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td class="text-left">
                    <a href="#" class="asc">Attribute Group Name</a>
                  </td>
                  <td class="text-right">
                    <a href="#">Sort Order</a>
                  </td>
                  <td class="text-right">Action</td>
                </tr>
              </thead>
              <tbody>
                @foreach($lists as $list)
                <tr>
                  <td class="text-left">{{$list->name}}</td>
                  <td class="text-right">{{$list->sort_order}}</td>
                  <td class="text-right" width="150">
                    <span class="col-sm-5">
                      <a href="{{URL::route('admin.attributegroup.'.$route.'.edit',$list->id)}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                    </span>
                    <span class="col-sm-5">
                      {!!Form::open(array("route"=>array('admin.attributegroup.'.$route.'.destroy',$list->id),'method' => 'DELETE'))!!}
                      <button type="submit" href="{{URL::route('admin.attributegroup.'.$route.'.destroy',$list->id)}}" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Delete" onClick="return confirm('Are you sure')" id="detele"><i class="fa fa-trash-o"></i></button>
                      {!!Form::close()!!}
                    </span>
                  </td>
                </tr>
                @endforeach
                <tr>
                  <td colspan="4"><a href="{{URL::route('admin.attributegroup.'.$route.'.create')}}" data-toggle="tooltip" title="" class="btn btn-primary pull-right" data-original-title="Add New"><i class="fa fa-plus"> Add New</i></a></td>
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