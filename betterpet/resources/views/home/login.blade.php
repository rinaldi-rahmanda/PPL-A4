@extends('layout.template')

@section('content')
	<div class='container-fluid'>
		<form method="POST">
			<div class="form-group">
				<input type="text" name="email" class="form-control" placeholder="Email" required>
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Password" required>
			</div>
			<div class="form-group">
				<button>Sign in with Facebook</button>
				<button>Sign in with Google</button>
			</div>
			<div class="form-group">
				<button type="submit" class="register-button btn btn-primary">Submit</button>
			</div>
		</form>		
	</div>
@endsection