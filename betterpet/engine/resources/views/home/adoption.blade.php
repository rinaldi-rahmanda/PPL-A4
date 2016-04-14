@extends('layout.template-about')
@section('content')

<div class='container-fluid page-wrap register'>
    <div class="register-row row">

        <div class="col-xs-8 col-xs-offset-1 col-md-8 col-md-offset-1 layout" style="border-radius:5px;">

            <h2>Find your favorite pet!</h2>
            @include('common.error')
            <form method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="exampleInputEmail1">Domicile</label>
                    <select class="form-control" name="domicile">
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
                    <label for="exampleInputEmail1">Type</label>
                    <select class="form-control" name="type">
                        <option value="1">Any</option>
                        <option value="2">Cat</option>
                        <option value="3">Dog</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Breed</label>
                    <input type="text" name="breed" id="breed" class=" form-control" placeholder="breed" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Sex</label>
                    <select class="form-control" name="sex">
                        <option value="1">Any</option>
                        <option value="2">Female</option>
                        <option value="3">Male</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Age</label>
                    <select class="form-control" name="age">

                        <option value="1">Any</option>
                        <option value="2">0-6 months</option>
                        <option value="3">6-12 months</option>
                        <option value="4">12-18 months</option>
                        <option value="5">More than 2 years</option>
                        <option value="6">More than 3 years</option>

                    </select>
                </div>


                <div class="form-group">
                    <button type="submit" class="register-button btn btn-success">Search</button>
                </div>
            </form>

        </div>
    </div>
</div>


@endsection