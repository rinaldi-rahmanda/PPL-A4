@extends('layout.template')

@section('content')
	<div class='container-fluid'>
		@if(session('error'))
			{{ session('error') }}
		@endif
		<div class="register-row row">
			<div class="col-xs-6 col-md-6 col-md-offset-1 col-xs-offset-1">
				<form method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<input type="text" name="email" class="register-form form-control" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input type="password" name="password" class="register-form form-control" placeholder="Password" required>
					</div>
					<div class="form-group">
						<button type="submit" class="register-button btn btn-success">Login</button>
					</div>
				</form>	
				<a href="register/google"><button class="register-google-button register-button btn btn-danger"><span><i class="icon-google-plus"></i></span> | Login with Google</button></a>
				<a href="register/facebook"><button class="register-facebook-button register-button btn btn-primary"><span><i class="icon-facebook"></i></span> | Login with Facebook</button></a>
			</div>	
		</div>
	</div>
@endsection