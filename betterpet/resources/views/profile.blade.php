@extends('layout.template')

@section('content')
	<div class='container-fluid'>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<h4 class='text-center'>Data Diri</h4>
				<h5 class='text-center'>{{ $user->name }}</h5>
				<h5 class='text-center'>{{ $domicile }}</h5>
				<form method="POST">
					<div class="form-group">
					<input type="text" class="register-form form-control" name="Your Email" placeholder="email" required></div>
					<div class="form-group">
					<input type="text" class="register-form form-control" name="Title" placeholder="title" required></div>
					<div class="form-group">
					<textarea name="content" class="register-form form-control" placeholder="Your Question" required></textarea></div>
					<div class="form-group">
					<button class='btn btn-primary'>Send</button></div>
				</form>
			</div>
			<div class="col-md-6 col-xs-6">

			</div>
		</div>
	</div>
@endsection