@extends('layout.template')

@section('content')
<script>
    $(document).ready(function(){
      if(!($("#flsmsg").html()==="")){
        $("#flash-msg").delay(1500).fadeOut("slow");        
      }
      else{
        $("#flash-msg").hide(); 
      }
    });    
</script>
<!-- Full Page Image Background Carousel Header -->
<div id="flash-msg" class="center-block"
    style="background-color:pink;position:absolute
        ;margin-top:100px;width:100%;z-index:999;width:300px;border-radius: 10px;
        margin-left:40%;">
    @if(Session::get('msg'))
    <h4 class="text-center" id="flsmsg">{{Session::get('msg')}}</h4>
    @else
    <h4 class="text-center" id="flsmsg"></h4>
    @endif
    
</div>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for Slides -->
    <div class="carousel-inner">
        <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('image/catndog-01.jpg');"></div>
            <div class="carousel-caption">

            </div>
        </div>
        <div class="item">
            <!-- Set the second background image using inline CSS below. -->
            <div class="fill" style="background-image:url('image/cats-home-01.jpg');"></div>
            <div class="carousel-caption">

            </div>
        </div>
        <div class="item">
            <!-- Set the third background image using inline CSS below. -->
            <div class="fill" style="background-image:url('image/corgi-home-01-01.jpg');"></div>
            <div class="carousel-caption">

            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>


</div>


<div class='home1' style='padding-top:10px;' >
    <div class='container-fluid' style='padding-top:20px'>
        <div class='row'>
            <div class='col-md-8 col-xs-12 col-sm-12' style='padding-left:15px'>
                <i class="fa fa-search fa-3x"> We would be glad to help you find your dream pets here!</i>
                <img src="{{URL::to('/image/Cats.png')}}" width="740" height="335" class="img-responsive">
            </div>
            <div class='col-md-4 col-xs-12 col-sm-12'>
                <blockquote>
                    <p>
                        "Time spent with cats is never wasted."
                    </p>
                    <h5>
                        - Sigmund Freud
                    </h5>
                </blockquote><br>
                <blockquote>
                    <p>
                        "A dog is the only thing on earth that loves you more than you love yourself"
                    </p>
                    <h5>
                        - Josh Billings
                    </h5>
                </blockquote>
                <blockquote>
                    <p>
                        "Until one has loved an animal a part of one's soul remains unawakened"
                    </p>
                    <h5>
                        - Anatole France
                    </h5>
                </blockquote>
            </div>
            
        </div>
    </div>  
</div>

@section('content')
<div class='container-fluid page-wrap' style='margin-top:100px;' >
    <div class='news'>
        <div class="row">
            <h3 class="text-center"> Read our latest news</h3>
            <hr class="line">
            @foreach ($news as $news)
                <?php $newcontent = AppHelper::snippetgreedy($news->content, 125, "..."); ?>
                <div class="col-md-offset-1 col-sm-10 col-xs-10 col-md-10 news-thumbnail">
                <div class="col-md-4" style="margin-left:2%;margin-top:2%;margin-bottom:2%;"><img src="{{URL::to('/engine/storage/app/newsimage')}}/{{$news->photo}}" width="200" height="250"> </div>
                    <div class="col-md-7">
                        <div class="caption">
                            <h3>{{$news->title}}</h3>

                            <p>{!! $newcontent  !!}</p>

                            <?php
                                echo $newcontent;
                            ?>

                            <p><a href="{{URL::to('/news/')}}/{{$news->id}}" class="btn btn-default" role="button">Read More</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
<div class='home2' style='padding-top:10px; min-height:95%;'>
    <div class="container-fluid" id="tourpackages-carousel">
        <h3 class='text-center' style="margin-top:4%;">They are searching for a home!</h3>
        <hr class='line' style='width:500px;'>
        @if(count($adoptions)>0)
        <div class="row">
            <div class="col-md-offset-1 col-xs-12 col-sm-6 col-md-10">
            @foreach ($adoptions as $adoption)
            <div class="shelter-adoption col-md-4 col-sm-12 col-xs-12">
                <img class="img-responsive img-rounded img-adoption" width="300px" height="300px" src="{{URL::to('/engine/storage/app/adoptionimage')}}/{{$adoption->picture}}">
                <h3 class="text-center">{{$adoption->name}}</h3>
                <p class="text-center"><a href="{{URL::to('/adoption')}}/{{$adoption->id}}" class="btn btn-primary" role="button">See the details</a></p>
            </div>
            @endforeach
            </div>
        </div>
        @else
        There are no adoption available right now
        @endif

            
        </div><!-- End row -->

    </div><!-- End container -->

</div>



<div class="container-fluid text-center" style="min-height:300px;">
  
  <h2 style="margin-top:80px;">What our customers say</h2>
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators1 carousel-indicators" style="bottom:-100px;">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <h4>"This company is the best. I am so happy with the result!"<br><span style="font-style:normal;">Michael Roe, Vice President, Comment Box</span></h4>
      </div>
      <div class="item">
        <h4>"One word... WOW!!"<br><span style="font-style:normal;">John Doe, Salesman, Rep Inc</span></h4>
      </div>
      <div class="item">
        <h4>"Could I... BE any more happy with this company?"<br><span style="font-style:normal;">Chandler Bing, Actor, FriendsAlot</span></h4>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control1 carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control1 carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            EMBED MAP HERE
        </div>
    </div>
</div>

<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 3000 //changes the speed
    })
</script>


@endsection