

@extends('layout.template-about')
@section('content')
<style>
    body {
        background-color:#dfeef7;        
    }
</style>
<script src="//cdn.ckeditor.com/4.5.8/standard/ckeditor.js"></script>
<div class='container-fluid page-wrap' style='padding-top:6%; padding-bottom:3%;' >
    <div class='news'>
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-1 layout" style="border-radius:5px;">
                <h2>Find your favorite pet!</h2>
                @include('common.error')
                <form method="POST">
                    {!! csrf_field() !!}
                    <div class="form-inline">
                        <div class="form-group">
                            <label class="in-form" for="exampleInputEmail1" style="display:block;">Domicile</label>
                            <select class="form-control" name="domicile" required>
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
                            <label class="in-form" for="exampleInputEmail1"  style="display:block;">Type</label>
                            <select class="form-control" name="type">
                                <option value="1">Any</option>
                                <option value="2">Cat</option>
                                <option value="3">Dog</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="in-form" for="exampleInputEmail1"  style="display:block;">Breed</label>
                            <input type="text" name="breed" id="breed" class=" form-control" placeholder="Breed">
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-group">
                            <label class="in-form" for="exampleInputEmail1"  style="display:block;">Sex</label>
                            <select class="form-control" name="sex">
                                <option value="1">Any</option>
                                <option value="2">Female</option>
                                <option value="3">Male</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="in-form" for="exampleInputEmail1"  style="display:block;">Age</label>
                            <select class="form-control" name="age">
                                <option value="1">Any</option>
                                <option value="2">0-6 months</option>
                                <option value="3">6-12 months</option>
                                <option value="4">12-18 months</option>
                                <option value="5">More than 2 years</option>
                                <option value="6">More than 3 years</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="register-button btn btn-success">Search</button>
                        @if(Auth::check())
                        <button type="button" class="btn btn-primary register-button" data-toggle="modal" data-target="#myModal">
                            <span class="glyphicon glyphicon-edit"></span> Add New Adoption 
                        </button>
                        @endif
                    </div>

                </form>
            </div>


            @if(Auth::check())
            <div class="col-md-3 col-md-offset-1">
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Add New Adoption</h4>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(array('url'=>'adoption/new','method'=>'POST', 'files'=>true)) !!}
                                {!! csrf_field() !!}  
                                <div class="form-group">
                                    <label class="in-form" for="exampleInputEmail1"  style="display:block;">Name of your pet</label>
                                    <input type="text" name="name" id="name" class=" form-control" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <label class="in-form" for="exampleInputEmail1"  style="display:block;">Breed</label>
                                    <input type="text" name="breed" id="breed" class=" form-control" placeholder="Breed" required>
                                </div>
                                <div class="form-group">
                                    <label class="in-form" for="exampleInputEmail1" style="display:block;">Domicile</label>
                                    <select class="form-control" name="domicile" required>
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
                                    <label class="in-form" for="exampleInputEmail1"  style="display:block;">Age</label>
                                    <select class="form-control" required name="age">
                                        <option value="1" disabled>Any</option>
                                        <option value="2">0-6 months</option>
                                        <option value="3">6-12 months</option>
                                        <option value="4">12-18 months</option>
                                        <option value="5">More than 2 years</option>
                                        <option value="6">More than 3 years</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="in-form" for="exampleInputEmail1"  style="display:block;">Photo (2MB max)</label>
                                    {!! Form::file('picture',['id'=>'photo','class'=>'form-control','accept'=>'image/*']) !!}
                                </div>
                                <div class="form-group">
                                    <label class="in-form" for="exampleInputEmail1"  style="display:block;">Sex</label>
                                    <select required class="form-control" name="sex">
                                        <option value="2" selected>Female</option>
                                        <option value="3">Male</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="in-form" for="exampleInputEmail1"  style="display:block;">Description</label>
                                    <textarea class="form-control" name="description" placeholder="Anything useful and related informations about your pet like color,behaviour,etc"></textarea>
                                    <script>
                                        CKEDITOR.replace('description');
                                    </script>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endif
        </div>

        <div class="row adoption-section">

            <div class="col-md-offset-1 col-xs-12 col-md-10">
                <h3>Featured Pets :</h3>
                <br>
                @foreach ($adoptions as $adoption)
                <div class="shelter-adoption col-md-4 col-sm-12 col-xs-12">
                    <img class="img-responsive img-rounded img-adoption" width="300px" height="300px" src="{{URL::to('/engine/storage/app/adoptionimage')}}/{{$adoption->picture}}">
                    <h3 class="text-center">{{$adoption->name}}</h3>
                    <p class="text-center"><a href="{{URL::to('/adoption')}}/{{$adoption->id}}" class="btn btn-primary" role="button">See the details</a></p>
                </div>
                @endforeach
            </div>
            {!! $adoptions->render() !!}
        </div>
    </div>
</div>

@endsection

