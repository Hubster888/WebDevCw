<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Posts</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!--<link href="{{ URL::asset('http://localhost:8000/hubert/webCW/resources/css/elem.css') }}" rel="stylesheet" type="text/css">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-lg-4">
                    <button type="button" class="btn btn-success">Add post</button>
                </div>
                <div class="col-lg-4">
                    <h1>All Posts</h1>
                    <p>Left shows posts and right shows related comments</p> 
                </div>
                <div class="col-lg-4">
                    <button type="button" class="btn btn-success">Log In</button>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h3>Posts</h3>
                    @yield("post_list")
                </div>
                <div class="col-lg-6">
                    <h3>Comments</h3>
                    @yield("comment_list")
                </div>
            </div>
        </div>

    </body>
</html>