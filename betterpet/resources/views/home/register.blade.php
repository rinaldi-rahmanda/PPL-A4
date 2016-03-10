@extends('layout.template')

@section('content')
	<div class='container-fluid'>
		<div class="register-row row">
			<div class="col-xs-6 col-xs-offset-1 col-md-6 col-md-offset-1">
				<form method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<input type="text" name="email" class="register-form form-control" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input type="password" name="password" class="register-form form-control" placeholder="Password" required>
					</div>
					<div class="form-group">
						<input type="text" name="name" class="register-form form-control" placeholder="Your Name ex: John Doe" required>
					</div>
					<div class="form-group">
						<input type="text" name="phone" class="register-form form-control" placeholder="Phone Number ex: 081234567" required>
					</div>
					<div clas="form-group">
						<h5 class="register-h5">Domisili</h5>
						 <select class="register-form form-control" name="domicile">
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
						<button type="submit" class="register-button btn btn-success">Register</button>
					</div>
				</form>
				<h4>Easier way to Register</h4>
				<a href="register/google"><button class="register-google-button register-button btn btn-danger"><span><i class="icon-google-plus"></i></span> | Register with Google</button></a>
				<a href="register/facebook"><button class="register-facebook-button register-button btn btn-primary"><span><i class="icon-facebook"></i></span> | Register with Facebook</button></a>	
			</div>
			</div>
	</div>
@endsection