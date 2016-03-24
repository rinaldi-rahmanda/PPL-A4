@extends('layout.template-about')

@section('content')
<div class='container-fluid page-wrap register'>
    <div class="register-row row">
        <div class="col-xs-6 col-xs-offset-3 col-md-6 col-md-offset-3 layout">
            <div class="col-md-8 col-md-offset-2">
                <h2>Login</h2>
                @if(session('error'))
                <div class="alert alert-danger">
                    <strong>Login Failed :(</strong>
                    <br>
                    <ul>
                        {{session('error')}}
                    </ul>
                </div>
                @endif

                <form method="POST">
                    {!! csrf_field() !!}
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

                <div class="strikeThrough"><span>Login with</span></div>
                <div class="text-center" style="margin-top:4%;">
                <a href="register/facebook" style="margin-right:15px;"><img src="/PPL-A4/betterpet/public/image/facebook.png" width="35" height="35"></a>
                <a href="register/google"><img src="/PPL-A4/betterpet/public/image/google-plus.png" width="35" height="35"></a>
                </div>	
            </div>
	
        </div>
    </div>
</div>
@endsection