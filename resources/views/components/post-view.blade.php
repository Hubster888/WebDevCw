<style>
body {
    background-color: white;
}
#post_container {
    width: 800px;
    height: auto;
    text-align: center;

    margin: auto;
    border-style: dashed;
    margin: 25px 50px 25px 50px;
    padding: 25px 10px 25px 10px;
}

#comment_container {
    width: 800px;
    height: auto;
    text-align: center;
    background-color: lightGray;
    margin: auto;
    border-style: dashed;
    margin: 25px 50px 25px 50px;
    padding: 25px 10px 25px 10px;
}

#title {
  font-family: "Times New Roman", Times, serif;
  font-style: oblique;
  font-weight: bold;
  font-size: 1.8em;
  margin: 10px 0px 10px 0px;
} 

#author {
    font-weight: bold;
    margin: 10px 0px 10px 0px;
} 
</style>
<!-- The style sets the look for both the post and comment views-->
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



