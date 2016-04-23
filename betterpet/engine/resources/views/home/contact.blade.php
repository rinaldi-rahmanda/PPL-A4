@extends('layout.template-about')
<script src='https://www.google.com/recaptcha/api.js'></script>
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
				
				<div id="flash-msg" class="center-block"
				style="background-color:pink;position:absolute
				;margin-top:435px;width:100%;z-index:999;width:300px;border-radius: 10px;
				">
				@if(session('success'))
					    <h4 class="text-center" id="flsmsg">{{Session('success')}}</h4>
				@endif
				
				</div>
	
    
				
				
				
                <h3 class='text-center'>Ask us anything!</h3>
                <br>
    				<form method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group">
					<input type="text" class="register-form form-control" name="name" placeholder="Your Name (20 character maximum)" required></div>
					<div class="form-group">
					<input type="text" class="register-form form-control" name="email" placeholder="Your Email Address" required></div>
					<div class="form-group">
					<input type="text" class="register-form form-control" name="title" placeholder="Title" required></div>
					<div class="form-group">
					<textarea name="content" class="register-form form-control" placeholder="What are you wondering?" required></textarea></div>
					<div class="form-group">
					
					    <div class="g-recaptcha" data-sitekey="6LcFFR0TAAAAAPQzHzv5P_PgB00WTI_I-GaFxE_P"></div>
					<button class='btn btn-primary pull-right'>Send</button></div>
				</form>
			</div>
		</div>
	</div>
@endsection