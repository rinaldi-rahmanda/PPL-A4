@extends('layout.template')

@section('content')
<div class='container-fluid page-wrap' style='margin-top:100px;' >
    <div class='news'>
        <div class="row">
            <h3 class="text-center"> Read our latest news</h3>
            <hr class="line">
            <div class="col-md-offset-1 col-sm-10 col-xs-10 col-md-10 news-thumbnail">
                <div class="col-md-4" style="margin-left:2%;margin-top:2%;margin-bottom:2%;"><img src="{{URL::to('/image/samplex.jpg')}}" width="200" height="250"> </div>
                <div class="col-md-7">
                    <div class="caption">
                        <h3>What Foods are Toxic for Dogs?</h3>
                        <p>Alcohol – I’m sure you’ve heard of the birthday parties where the dog accidentally gets into some of the spilled keg beer
						...</p>
                        <p><a href="{{URL::to('/news/1')}}" class="btn btn-default" role="button">Read More</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-offset-1 col-sm-10 col-xs-10 col-md-10 news-thumbnail">
                <div class="col-md-4" style="margin-left:2%;margin-top:2%;margin-bottom:2%;"><img src="{{URL::to('/image/samplex.jpg')}}" width="200" height="250"> </div>
                <div class="col-md-7">
                    <div class="caption">
                        <h3>What Foods are Toxic for Dogs?</h3>
						<p>Alcohol – I’m sure you’ve heard of the birthday parties where the dog accidentally gets into some of the spilled keg beer
						...</p>
                        <p><a href="{{URL::to('/news/1')}}" class="btn btn-default" role="button">Read More</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-offset-1 col-sm-10 col-xs-10 col-md-10 news-thumbnail">
                <div class="col-md-4" style="margin-left:2%;margin-top:2%;margin-bottom:2%;"><img src="{{URL::to('/image/samplex.jpg')}}" width="200" height="250"> </div>
                <div class="col-md-7">
                    <div class="caption">
                        <h3>What Foods are Toxic for Dogs?</h3>
						<p>Alcohol – I’m sure you’ve heard of the birthday parties where the dog accidentally gets into some of the spilled keg beer
						...</p>
                        <p><a href="{{URL::to('/news/1')}}" class="btn btn-default" role="button">Read More</a></p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    @endsection