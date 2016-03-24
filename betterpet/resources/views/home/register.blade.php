@extends('layout.template-about')
@section('content')
<div class='container-fluid page-wrap register'>
    <div class="register-row row">

        <div class="col-xs-6 col-xs-offset-3 col-md-6 col-md-offset-3 layout">
            <div class="col-md-8 col-md-offset-2">
                <h2>Sign up</h2>
                @include('common.error')
                <form method="POST">
                    {!! csrf_field() !!}
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
                    <div class="form-group">

                        <select class="register-form form-control" name="domicile">
                            <option value="" disabled selected>Select your domicile</option>
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
                        <button type="submit" class="register-button btn btn-success">Sign up</button>
                    </div>
                </form>
                <h4>Easier way to register</h4>
                <a href="register/facebook" style="margin-right:15px;"><img src="/PPL-A4/betterpet/public/image/facebook.png" width="35" height="35"></a>
                <a href="register/google"><img src="/PPL-A4/betterpet/public/image/google-plus.png" width="35" height="35"></a>               	
            </div>
        </div>
    </div>
</div>

@endsection