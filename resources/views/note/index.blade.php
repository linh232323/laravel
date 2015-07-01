<html>
    <head>
        <title>Note</title>
    </head>
    <body>
        <table>
            <tr>
                <td>#</td>
                <td>Title</td>
                <td>Infomation</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            @foreach ($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->info}}</td>
                <td><a href="{{URL::route('note.edit',$item->id)}}">Edit</a></td>
                <td>
                    {!!Form::open(array('route'=>array('note.destroy',$item->id),'method'=>'DELETE'))!!}
                    <button type="submit" href="{{URL::route('note.destroy',$item->id)}}">Delete</button>
                    {!!Form::close();!!}
                </td>
            </tr>
            @endforeach
        </table>
    </body>
</html>
