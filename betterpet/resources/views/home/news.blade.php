@extends('layout.template')

@section('content')
<div class='container-fluid page-wrap' style='margin-top:100px;' >
	<div class='news'>
		<div class="row">
            <h3 class="text-center"> Read our latest news</h3>
            <hr class="line">
			<div class="col-sm-12 col-xs-12 col-md-12">
				<div class="news-thumbnail thumbnail">
				  <div class="caption">
					<h3>Judul News</h3>
					<p>Lorem ipsum lalala Lorem ipsum lalala Lorem ipsum lalala Lorem ipsum lalala</p>
					<p><a href="{{URL::to('/news/1')}}" class="btn btn-default" role="button">Read More</a></p>
				  </div>
				</div>
			</div>
			<div class="col-sm-12 col-xs-12 col-md-12">
				<div class="news-thumbnail thumbnail">
				  <div class="caption">
					<h3>Judul News</h3>
					<p>Lorem ipsum lalala Lorem ipsum lalala Lorem ipsum lalala Lorem ipsum lalala</p>
					<p><a href="{{URL::to('/news/1')}}" class="btn btn-default" role="button">Read More</a></p>
				  </div>
				</div>
			</div>
			<div class="col-sm-12 col-xs-12 col-md-12">
				<div class="news-thumbnail thumbnail">
				  <div class="caption">
					<h3>Judul News</h3>
					<p>Lorem ipsum lalala Lorem ipsum lalala Lorem ipsum lalala Lorem ipsum lalala</p>
					<p><a href="{{URL::to('/news/1')}}" class="btn btn-default" role="button">Read More</a></p>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection