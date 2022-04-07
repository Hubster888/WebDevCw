<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Web App</title>
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
                    @yield("add_button")
                </div>
                <div class="col-lg-4">
                    @yield("title")
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @yield("list")
                </div>
            </div>
        </div>

    </body>
</html>