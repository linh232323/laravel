<html>
    <head>
        <title>Note</title>
    </head>
    <body>
        {!!Form::open(array('route'=>'note.store'))!!}
        {!!Form::label('title','Title')!!}
        {!!Form::text('title')!!}
        <br/>
        {!!Form::label('info','Infomation')!!}
        {!!Form::textarea('info')!!}
        <br/>
        {!!Form::submit('Submit')!!}
        {!!Form::close()!!}
    </body>
</html>
