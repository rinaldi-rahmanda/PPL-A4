@extends('layout.template-about')

@section('content')
	<div class='container-fluid page-wrap'>
		<div class="row">
			<div class="col-md-6 col-xs-6 leftHalf">
			</div>
			<div class="col-md-6 col-xs-6 rightHalf">
				@if (count($errors) > 0)
				    <!-- Form Error List -->
				    <div class="alert alert-danger">
				        <strong>Failed to send the question :(</strong>

				        <br><br>

				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
				@if(session('success'))
					{{ session('success') }}
				@endif
                <h3 class='text-center'>Don't hesitate to ask us!</h3>
                <br>
    				<form method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group">
					<input type="text" class="register-form form-control" name="name" placeholder="Your Name" required></div>
					<div class="form-group">
					<input type="text" class="register-form form-control" name="email" placeholder="Your Email Address" required></div>
					<div class="form-group">
					<input type="text" class="register-form form-control" name="title" placeholder="Title" required></div>
					<div class="form-group">
					<textarea name="content" class="register-form form-control" placeholder="What are you wondering?" required></textarea></div>
					<div class="form-group">
					<button class='btn btn-primary pull-right'>Send</button></div>
				</form>
			</div>
		</div>
	</div>
@endsection