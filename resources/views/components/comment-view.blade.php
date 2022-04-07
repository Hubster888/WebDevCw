<div id="comment_container">
    <!-- Create the list html using bootstrap and leave room for injections of data and add CSS to make it nice -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" id="title">
                {{$title}}
            </div>
            <div class="col-sm-12">
                {{$content}}  
            </div>
            <div class="col-sm-12" id="author">
                By {{$author}} 
            </div>
        </div>
    </div>
</div>
</style>
<div id="post_container">
    <!-- Create the list html using bootstrap and leave room for injections of data and add CSS to make it nice -->
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col-sm-12" id="title">
                {{$title}}
            </div>
            <div class="col-sm-12">
                {{$content}}
            </div>
            <div class="col-sm-12" id="author">
                By {{$author}} 
            </div>
        </div>
    </div>
</div>