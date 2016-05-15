@extends('layout.template')

@section('content')
<div class='container-fluid page-wrap' style='margin-top:100px;' >
    <div class='news'>
        <div class="row">
            <h3 class="text-center"> Read our latest news</h3>
            <hr class="line">
            @foreach ($allnews as $news)
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
    @endsection