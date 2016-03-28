@extends('layout.template')

@section('content')
<div class='container-fluid page-wrap' id="page-wrap">
    <div class="row">
        <div class="about">
            <div class="col-md-12 col-xs-12">
                <h1 class="text-center font-header"> About us</h1>
                <hr class="line">
                <div class="desc text-center">
                    <h4>Tired of searching through facebook and twitter to find dogs or cat for adoption? You have come to the right place! In BetterPet, you can find dogs and cats that ready for adoption, or they can advertise their own animals for adoption. As well, they can connect with the veterinarian, the animal care and pet supply stores. Here, they can also share information and stories about the animals in a forum that we provide. So, what are you waiting for? Come join BetterPet fellow!
                    </h4>

                </div>
                <br><br>
                <div class="container-fluid text-center bg-grey">
                    <hr class="line">
                    <div class="row ">
                        <div class="col-sm-4">
                            <span class="glyphicon glyphicon-certificate logo-small"></span>
                            <h4>CERTIFIED</h4>
                            <p>We are certified. We make sure everything.</p>
                        </div>
                        <div class="col-sm-4">
                            <span class="glyphicon glyphicon-heart logo-small"></span>
                            <h4>LOVE</h4>
                            <p>We offer love for your pets.</p>
                        </div>
                        <div class="col-sm-4">
                            <span class="glyphicon glyphicon-leaf logo-small"></span>
                            <h4>GREEN</h4>
                            <p>We against animal cruelty</p>
                        </div>
                    </div>
                    <hr class="line">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="team">
            <h1 class="text-center font-header">Meet the team</h1>
            <hr class="line">
            <div class="team">
                <div class="row team-row" style="margin-top: 6%;" >
                    <div class="col-xs-3 col-xs-offset-3 col-md-2 col-md-offset-3">
                        <img class="img-responsive img-circle" src="{{URL::to('/image/adit.jpg')}}" width="150" height="150">
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <h3>Aditya Rama</h3>
                        <blockquote><i>
                            "ipsumblablabla lorem ipsumblablabla lorem ipsumblablabla lorem ipsumblablabla lorem psum lalalalsjajd"
                            </i>
                        </blockquote>
                    </div> 
                </div>
                <hr class="line2">
                <div class="row team-row">
                    <div class="col-xs-3 col-xs-offset-3 col-md-4 col-md-offset-3">
                        <h3>Faiz Kautsar</h3>
                        <blockquote><i>
                            ipsumblablabla lorem ipsumblablabla lorem ipsumblablabla lorem ipsumblablabla lorem psum lalalalsjajd
                            </i>
                        </blockquote>
                    </div>
                    <div class="col-md-2 col-xs-4 img-team">
                        <img class="img-responsive img-circle" src="{{URL::to('/image/faiz.jpg')}}" width="150" height="150">

                    </div> 
                </div>
                <hr class="line2">
                <div class="row team-row">
                    <div class="col-xs-3 col-xs-offset-3 col-md-2 col-md-offset-3">
                        <img class="img-responsive img-circle" src="{{URL::to('/image/me.jpg')}}" width="150" height="150">
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <h3>Liany Gustina</h3>
                        <blockquote>
                            
                            <i>
                            "I hope that BetterPet will help people to find their dream pet."</i>
                        </blockquote>
                    </div> 
                </div>
                <hr class="line2">
                <div class="row team-row">
                    <div class="col-xs-3 col-xs-offset-3 col-md-4 col-md-offset-3">
                        <h3>Rinaldi Andrian</h3>
                        <blockquote><i>
                            ipsumblablabla lorem ipsumblablabla lorem ipsumblablabla lorem ipsumblablabla lorem psum lalalalsjajd
                            </i>
                        </blockquote>
                    </div>
                    <div class="col-md-2 col-xs-4 img-team">
                        <img class="img-responsive img-circle" src="{{URL::to('/image/aldi.jpg')}}" width="150" height="150">

                    </div> 
                </div>
                <hr class="line2">
                <div class="row team-row">
                    <div class="col-xs-3 col-xs-offset-3 col-md-2 col-md-offset-3">
                        <img class="img-responsive img-circle" src="{{URL::to('/image/tommy.jpg')}}" width="150" height="150">
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <h3>Tommy Saprikan Kahar</h3>
                        <blockquote><i>
                            ipsumblablabla lorem ipsumblablabla lorem ipsumblablabla lorem ipsumblablabla lorem psum lalalalsjajd
                            </i>
                        </blockquote>
                    </div> 
                </div>

            </div>
        </div>
    </div>  

</div>

@endsection
