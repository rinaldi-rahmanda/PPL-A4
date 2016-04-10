@extends('layout.template')

@section('content')

<style>
   
    .footer{
        background-color: white;
    }
    h2 {
        font-size: 24px;
        text-transform: uppercase;
        color: #303030;
        font-weight: 600;
        margin-bottom: 0px;
    }
    h4 {
        font-size: 19px;
        line-height: 1.375em;
        color: #303030;
        font-weight: 400;
        margin-bottom: 30px;
    }  
    .jumbotron {
        background-color: #ffffff;
        background-image: url("/PPL-A4/betterpet/image/c&dFAQ.jpg");
        background-repeat: no-repeat;
        background-position: center; 
        background-size: 90%;
        color: #fff;
        padding: 22% 2% 13% 2%;
        font-family: Montserrat, sans-serif;
        margin-bottom:0px;
    }
    .bg-grey {
        background-color: #f6f6f6;
    }
    .logo-small {
        color: #3f8edd;
        font-size: 50px;
    }
    .logo {
        color: #3f8edd;
        font-size: 200px;
    }

    .poslog {
        margin-left: 100px;
        margin-top: 50px;
    }

    .thumbnail {
        padding: 0 0 15px 0;
        border: none;
        border-radius: 0;
    }
    .thumbnail img {
        width: 100%;
        height: 100%;
        margin-bottom: 10px;
    }

    .item h4 {
        font-size: 19px;
        line-height: 1.375em;
        font-weight: 400;
        font-style: italic;
        margin: 70px 0;
    }

    .slideanim {visibility:hidden;}
    .slide {
        animation-name: slide;
        -webkit-animation-name: slide;	
        animation-duration: 1s;	
        -webkit-animation-duration: 1s;
        visibility: visible;			
    }
    @keyframes slide {
        0% {
            opacity: 0;
            -webkit-transform: translateY(70%);
        } 
        100% {
            opacity: 1;
            -webkit-transform: translateY(0%);
        }	
    }
    @-webkit-keyframes slide {
        0% {
            opacity: 0;
            -webkit-transform: translateY(70%);
        } 
        100% {
            opacity: 1;
            -webkit-transform: translateY(0%);
        }
    }
    .adopt-step {
        padding-top: 4%;
        padding-bottom: 4%;
        background-color: #f6f6f6
    }

</style>

<div class="faq-jumbo jumbotron">
</div>

<!-- Container (Konten 2) -->
<div class="container-fluid text-center adopt-step">
    <div class="row slideanim">
        <div class="col-md-offset-1 col-sm-10">
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-off logo-small"></span>
                <h4>REGISTER</h4>
                <p>In order to adopt a pet, you must be a registered user.</p>
            </div>
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-search logo-small"></span>
                <h4>CHOOSE</h4>
                <p>Search for your favourite pet, choose, and fill the adoption form.</p>
            </div>
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-circle-arrow-right logo-small"></span>
                <h4>ADOPT</h4>
                <p>Click adopt and your request will be sent to the owner. Please wait for the approval.</p>
            </div>
        </div>
    </div>
</div>



<!-- Container (Konten 1) -->
<div class="container-fluid" style="margin-top:1%;margin-bottom:3%;">
    <div class="row">
        <div class='col-md-offset-1 col-sm-10 col-md-10 col-xs-10'>
            <h3 style="margin-bottom:2%;">Frequently Asked Questions:</h3>
            <div class="custom-panel panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-color panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="text-decoration:none;">
                                <span class="glyphicon glyphicon-question-sign"> </span> How to be a member
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
							1. First, click the Account tab and choose Sign up.<br>
							2. Fill in the required form or you can sign up using your Google or Facebook account.<br>
							3. After you sign up, the next time you want to login, just fill in the login form, or choose to login using your Google or Facebook account.
						</div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-color panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"  style="text-decoration:none;">
                                <span class="glyphicon glyphicon-question-sign"> </span> How to change your personal information
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
							1. Log into your account.<br>
							2. Click the account tab and choose Edit profile.<br>
							3. There, you can change your avatar or your personal information by filling the form.<br>
						</div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-color panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"  style="text-decoration:none;">
                                <span class="glyphicon glyphicon-question-sign"> </span> How to advertise your pet
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
							1. Log into your account.<br>
							2. Choose the Adoption tab.<br>
							3. Create a new adoption.<br>
							4. Fill in the form with information about your pet.<br>
						</div>
                    </div>
                </div>
				<div class="panel panel-default">
                    <div class="panel-color panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree"  style="text-decoration:none;">
                                <span class="glyphicon glyphicon-question-sign"> </span> How to adopt a pet
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
							1. Log into your account.<br>
							2. Search for a pet you want to adopt in the Adoption page.<br>
							3. Click the pet in order to view more details.<br>
							4. Choose to request the adoption, and wait for the owner's approval.<br>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        // Add smooth scrolling to all links in navbar + footer link
        $(".navbar a, footer a[href='#myPage']").on('click', function(event) {


            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 900, function(){

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        });

        $(window).scroll(function() {
            $(".slideanim").each(function(){
                var pos = $(this).offset().top;

                var winTop = $(window).scrollTop();
                if (pos < winTop + 600) {
                    $(this).addClass("slide");
                }
            });
        });
    })
</script>


@endsection