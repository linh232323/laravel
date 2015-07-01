@extends('admin.admin')
@section('content')
<div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td class="text-left">
                    <a href="#" class="asc">Title</a>
                  </td>
                  <td class="text-left">
                    <a href="#" class="asc">Code</a>
                  </td>
                  <td class="text-left">
                    <a href="#" class="asc">Symbol Left</a>
                  </td>
                  <td class="text-left">
                    <a href="#" class="asc">Symbol Right</a>
                  </td>
                  <td class="text-left">
                    <a href="#" class="asc">Decimal Place</a>
                  </td>
                  <td class="text-left">
                    <a href="#" class="asc">Value</a>
                  </td>
                  <td class="text-left">
                    <a href="#" class="asc">Status</a>
                  </td>
                  <td class="text-right">Action</td>
                </tr>
              </thead>
              <tbody>
                @foreach($lists as $list)
                <tr>
                  <td class="text-left">{{$list->title}}</td>
                  <td class="text-left">{{$list->code}}</td>
                  <td class="text-left">{{$list->symbol_left}}</td>
                  <td class="text-left">{{$list->symbol_right}}</td>
                  <td class="text-left">{{$list->decimal_place}}</td>
                  <td class="text-left">{{$list->value}}</td>
                  @if($list->status==0)
                  <td class="text-right">Enabled</td>
                  @else
                  <td class="text-right">Disabled</td>
                  @endif
                  <td class="text-right" width="150">
                    <span class="col-sm-5">
                      <a href="{{URL::route('admin.currency.edit',$list->id)}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                    </span>
                    <span class="col-sm-5">
                      {!!Form::open(array("route"=>array('admin.currency.destroy',$list->id),'method' => 'DELETE'))!!}
                      <button type="submit" href="{{URL::route('admin.currency.destroy',$list->id)}}" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Delete" onClick="return confirm('Are you sure')" id="detele"><i class="fa fa-trash-o"></i></button>
                      {!!Form::close()!!}
                    </span>
                  </td>
                </tr>
                @endforeach
                <tr>
                  <td colspan="8"><a href="{{URL::route('admin.currency.create')}}" data-toggle="tooltip" title="" class="btn btn-primary pull-right" data-original-title="Add New"><i class="fa fa-plus"> Add New</i></a></td>
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