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
						<input type="text" name="name" class="register-form form-control" placeholder="Your Name ex: John Doe" required>
					</div>
					<div clas="form-group">
						<h5 class="register-h5">Domisili</h5>
						 <select class="register-form form-control" id="domisili">
						    <option value="1">Jakarta Utara</option>
						    <option value="2">Jakarta Timur</option>
						    <option value="3">Jakarta Pusat</option>
						    <option value="4">Jakarta Barat</option>
						    <option value="5">Jakarta Selatan</option>
						    <option value="6">Bogor</option>
						    <option value="7">Depok</option>
						    <option value="8">Tangerang</option>
						    <option value="9">Bekasi</option>
						 </select>
					</div>
					<div class="form-group">
						<button type="submit" class="register-button btn btn-success">Submit</button>
					</div>
				</form>
				<h4>Easier way to Register</h4>
				<div class='form-group'>
					<a href="register/button"><social class="register-button btn btn-danger">Register with Google</button></a>
					<a href="register/social"><button class="register-button btn btn-primary">Register with Facebook</button></a>
				</div>
			</div>
		</div>
	</div>
@endsection