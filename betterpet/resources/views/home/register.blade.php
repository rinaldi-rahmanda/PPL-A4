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
				<input type="text" name="name" class="form-control" placeholder="Your Name ex: John Doe" required>
			</div>
			<div clas="form-group">
				 <select class="form-control" id="domisili">
				    <option>Jakarta Utara</option>
				    <option>Jakarta Timur</option>
				    <option>Jakarta Pusat</option>
				    <option>Jakarta Barat</option>
				    <option>Jakarta Selatan</option>
				    <option>Bogor</option>
				    <option>Depok</option>
				    <option>Tangerang</option>
				    <option>Bekasi</option>
				 </select>
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
@endsection