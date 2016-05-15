@extends('layout.template-about')

@section('content')
<style>
    body {
        background-color:#dfeef7;        
    }
</style>

<div class='container-fluid page-wrap' style='padding-top:6%; padding-bottom:3%;' >
	<div class='news'>
		<div class="row">
           
            <div class="col-md-offset-1 col-md-10 layout">
                 <h3 class="text-center">{{$news->title}}</h3>
            <hr class="line">
                <div class="col-sm-4 col-xs-4 col-md-4">
                <img src="{{URL::to('/engine/storage/app/newsimage')}}/{{$news->photo}}" width="200" height="250">
            </div>
            <div class="col-sm-8 col-xs-8 col-md-8">
                <div class="text-center" style="text-align: justify;">

                    {!! $news->content !!}

                    <!--
                    <ol>
                         <li>
                         Alcohol – I’m sure you’ve heard of the birthday parties where the dog accidentally gets into some of the spilled keg beer, and then gets all silly to the amusement of the crowd. While it may be funny to you, it’s not funny to your dog. Alcohol can cause not only intoxication, lack of coordination, poor breathing, and abnormal acidity, but potentially even coma and/or death.
                        </li>
                         <li>
                        Apple Seeds – The casing of apple seeds are toxic to a dog as they contain a natural chemical (amygdlin) that releases cyanide when digested. This is really only an issue if a large amount was eaten and the seed were chewed up by the dog, causing it to enter its blood stream. But to play it safe, be sure to core and seed apples before you feed them to your dog.
                        </li>
                         <li>Avocado – Avocados contain Persin, which can cause diarrhea, vomiting, and heart congestion.</li>
                         <li>Baby food – Baby food by itself isn’t terrible, just make sure it doesn’t contain any onion powder. Baby food also doesn’t contain all the nutrients a dog relies on for a healthy, well maintained diet.
                        </li>
                         <li>
                             Cooked Bones – When it comes to bones, the danger is that cooked bones can easily splinter when chewed by your dog. Raw (uncooked) bones, however, are appropriate and good for both your dog’s nutritional and teeth.
                        </li>
                         <li>
                             Candy and chewing gum – Not only does candy contain sugar, but it often contains Xylitol, which can lead to the over-release of insulin, kidney failure, and worse.
                        </li>
                         <li>
Cat food – Not that they would want this anyway, but cat food contains proteins and fats that are targeted at the diet of a cat, not a dog. The protein and fat levels in cat food are too high for your dog, and not healthy.
                        </li>
                         <li>
                        Chocolate – You’ve probably heard this before, but chocolate is a definite no no for your pup. And it’s not just about caffeine, which is enough to harm your dog by itself, but theobromine and theophylline, which can be toxic, cause panting, vomiting, and diarrhea, and damage your dog’s heart and nervous systems.
                        </li>
                         <li>Citrus oil extracts – Can cause vomiting.</li>
                        <li>
Coffee – Not sure why you would give your dog coffee, but pretty much the same applies here as to chocolate. This is essentially poison for your dog if ingested.</li>
                    </ol>
                    <p>source : http://www.caninejournal.com/foods-not-to-feed-dog/</p>
                    -->
                </div>
            </div>
            </div>			
		</div>
	</div>
</div>
@endsection