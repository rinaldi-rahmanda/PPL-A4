@extends('layout.template')

@section('content')
	<div class='container-fluid'>
		<div class="row">
			<div class="col-xs-6 col-md-6">
				<form method="POST">
					<div class="form-group">
						<input type="text" name="email" class="register-form form-control" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input type="password" name="password" class="register-form form-control" placeholder="Password" required>
					</div>
					<div class="form-group">
						<button type="submit" class="register-button btn btn-success">Login</button>
					</div>
					<div class='form-group'>
						<a href="register/button"><social class="register-button btn btn-danger">Login with Google</button></a>
						<a href="register/social"><button class="register-button btn btn-primary">Login with Facebook</button></a>
					</div>
				</form>	
			</div>	
		</div>
	</div>
@endsection