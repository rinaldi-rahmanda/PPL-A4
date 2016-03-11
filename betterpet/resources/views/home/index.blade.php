@extends('layout.template')

@section('content')

        <header id="myCarousel" class="carousel slide">
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
                    <!-- Set the second background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('image/corgi-home-01-01.jpg');"></div>
                    <div class="carousel-caption">
                        
                    </div>
                </div>

            </div>



        </header>


        <!-- /.container -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Script to Activate the Carousel -->
        <script>
            $('.carousel').carousel({
                interval: 2000 //changes the speed
            })
        </script>

@endsection