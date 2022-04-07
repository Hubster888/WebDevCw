<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Post</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!--<link href="{{ URL::asset('http://localhost:8000/hubert/webCW/resources/css/elem.css') }}" rel="stylesheet" type="text/css">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
    
        <form action="/home/posts/{{$post->id}}" method="post">
            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="title">Post Title</label>
                    <input type="text" id="title" name="title" class="form-control{{ $errors->first('title') ? 'is-invalid' : ''}}" placeholder="Cats..." value="{{$post->title}}"/>
                    @if($errors->first('title'))
                        <div class="invalid-feedback"> {{$errors->first('title')}} </div>
                    @endif 
                </div>
                <div class="col-12 col-md-6">
                    <label for="content">Post Content</label>
                    <input type="text" id="content" name="content" class="form-control{{ $errors->first('content') ? 'is-invalid' : ''}}" placeholder="Cats are great..." value="{{$post->content}}"/>
                    @if($errors->first('content'))
                        <div class="invalid-feedback"> {{$errors->first('content')}} </div>
                    @endif     
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @csrf
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </from>

    </body>

</html>