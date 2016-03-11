@extends('layout.template-about')

@section('content')
	<div class='container-fluid page-wrap'>
		<div class="row">
			<div class="col-md-6 col-xs-6 leftHalf">
		
			</div>
			<div class="col-md-6 col-xs-6 rightHalf">
                <h3 class='text-center'>Don't hesitate to ask us!</h3>
                <br>
    				<form method="POST">
                    <div class="form-group">
					<input type="text" class="register-form form-control" name="Your Name" placeholder="name" required></div>
					<div class="form-group">
					<input type="text" class="register-form form-control" name="Your Email" placeholder="email" required></div>
					<div class="form-group">
					<input type="text" class="register-form form-control" name="Title" placeholder="subject" required></div>
					<div class="form-group">
					<textarea name="content" class="register-form form-control" placeholder="question" required></textarea></div>
					<div class="form-group">
					<button class='btn btn-primary pull-right'>Send</button></div>
				</form>
			</div>
		</div>
	</div>
@endsection