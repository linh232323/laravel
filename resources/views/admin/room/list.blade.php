<div class="panel-body">
        <div class="well">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-name">Room Name</label>
                <input type="text" name="filter_name" value="" placeholder="Room Name" id="input-name" class="form-control" autocomplete="off"><ul class="dropdown-menu"></ul>
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
                  <td class="text-left"><a href="" class="asc">Room Name</a>
                    </td><td class="text-left"><a href="">Status</a>
                    </td>
                  <td class="text-right">Action</td>
                </tr>
              </thead>
              <tbody>
                @foreach($rooms as $room)
                <tr>
                  <td class="text-center"><img src="{{URL::asset('public/'.$room->image)}}" class="img-thumbnail">
                    </td>
                  <td class="text-left">{{$room->descriptions()->where('roomID',$room->id)->first()->name}}</td>
                  @if($room->status==0)
                  <td class="text-left">Enabled</td>
                  @else
                  <td class="text-left">Disabled</td>
                  @endif
                  <td class="text-right"><a href="{{URL::route('room_edit_get',array('id'=>$room->id))}}" target="_blank" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a> <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Delete" onClick="deleteRoom($(this),{{$room->id}})"><i class="fa fa-trash-o"></i></a></td>
                </tr>
                @endforeach
                <tr>
                  <td colspan="4"><a href="{{URL::route('room_create_get',array('hotel_id'=>$hotel_id))}}" target="_blank" data-toggle="tooltip" title="" class="btn btn-primary pull-right" data-original-title="Add New"><i class="fa fa-plus"> Add New</i></a></td>
                </tr>
              </tbody>
            </table>
          </div>
        <div class="row">
          <div class="col-sm-6 text-left"></div>
          <div class="col-sm-6 text-right">{!! $rooms->render() !!}</div>
        </div>
      </div>
      <script type="text/javascript">
      function deleteRoom(that,id){
        if(confirm("Are you sure!!")){
          $.ajax({
            'url':"{{URL::route('room_delete_post')}}",
            'type':"POST",
            'data':({"id":id,"_token":'{{ csrf_token() }}'}),
            'async':true,
            "success":function(data){
              if(data.mess==="0"){
                alert("Success");
                $(that).parent().parent().remove();
              }else{
                alert("Error");
              }
            }
          })
      }
    }
      </script>
