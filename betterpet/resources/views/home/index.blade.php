@extends('layout.template')

@section('content')
 <!-- Full Page Image Background Carousel Header -->

    <div id="myCarousel" class="carousel slide">
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
    <div class='home1'>
        <div class='container-fluid' style='padding-top:20px'>
            <div class='row'>
                <div class='col-md-4 col-xs-4 col-sm-4'>
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
                </div>
                <div class='col-md-8 col-xs-8 col-sm-8' style='padding-left:15px'>
                    <i class="fa fa-search fa-3x"> We would be glad to help you find your dream pets here</i>
                </div>
            </div>
        </div>  
    </div>
    <div class='home2' style='padding-top:10px;'>
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-md-12 col-xs-12 col-sm-12'>
                    <h3 class='text-center'>They're searching for home!</h3>
                    <hr class='home-hr center-block' style='width:500px;'>
                </div>
            </div>
            
        </div>
    </div>
<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 2200 //changes the speed
    })
</script>

@endsection