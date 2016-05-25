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
            <div class="col-md-12 col-sm-12 col-xs-12">
                @include('common.error')
                @include('common.success')
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-5 col-md-offset-1 col-sm-12 layout" style="border-radius:5px;">
                <h3>Find Shelter For Your Pet!</h3>
                <form method="POST">
                    {!! csrf_field() !!}
                    <div class="form-inline">
                        <div class="form-group">
                            <label class="in-form" for="exampleInputEmail1" style="display:block;">Domicile</label>
                            <select required class="form-control" name="domicile" style="width: 210px">
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
                        <div class="form-group" >
                            <label class="in-form" for="exampleInputEmail1"  style="display:block;">Name</label>
                            <input type="text" name="name" id="name" class=" form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label class="in-form" for="exampleInputEmail1"  style="display:block;">Address</label>
                            <input type="text" name="address" id="address" class=" form-control" placeholder="Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="register-button btn btn-success" style="width: 150px"> 
                            <span class="glyphicon glyphicon-search"></span> Search</button>
                    </div>
                </form>
            </div>
             @if(Auth::check())
             <div class="col-xs-12 col-md-5 col-md-offset-1 col-sm-12 layout" style="border-radius:5px; text-align: center; padding-top: 20px; padding-bottom: 40px;" >               
                 <h3>Do You Have a shelter?</h3> 
                 <h3>Help them!</h3><br><br><br><br>
                 <h3>Create Your Own Shelter</h3>
                        <button type="button" class="register-button btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <span class="glyphicon glyphicon-edit"></span> Add New Shelter
                        </button>
             </div>
            @endif
        </div>
        
        @if(Auth::check())
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add New Shelter</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(array('url'=>'shelter/new','method'=>'POST', 'files'=>true)) !!}
                        {!! csrf_field() !!}  
                        <div class="form-group">
                            <label class="in-form" for="exampleInputEmail1"  style="display:block;">Name of your shelter</label>
                            <input type="text" name="shelterName" id="shelterName" class=" form-control" placeholder="shelterName" required>
                        </div>
                        <div class="form-group">
                            <label class="in-form" for="exampleInputEmail1"  style="display:block;">Address</label>
                            <input type="text" name="address" id="address" class=" form-control" placeholder="Address" required>
                        </div>

                        <div class="form-group">
                            <label class="in-form" for="exampleInputEmail1"  style="display:block;">Photo (2MB max)</label>
                            {!! Form::file('picture',['id'=>'photo','class'=>'form-control','accept'=>'image/*']) !!}
                        </div>

                        <div class="form-group">
                            <label class="in-form" for="exampleInputEmail1" style="display:block;">Domicile</label>
                            <select class="form-control" required name="domicile">
                                <option value="" disabled required selected>Select your domicile</option>
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
                            <label class="in-form" for="exampleInputEmail1"  style="display:block;">Description</label>
                            <textarea class="form-control" name="description" placeholder="Anything useful and related informations about your shelter"></textarea>
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
        @endif


        <div class="row adoption-section">
            @foreach ($shelters as $shelter)
            <div class="shelter-adoption col-md-4 col-sm-12 col-xs-12">
                <img class="img-responsive img-rounded img-adoption" width="300px" height="300px" src="{{URL::to('/engine/storage/app/shelterimage')}}/{{$shelter->picture}}">
                <h3 class="text-center">{{$shelter->shelterName}}</h3>
                <p class="text-center"><a href="{{URL::to('/shelter')}}/{{$shelter->id}}" class="btn btn-primary" role="button">See the details</a></p>
            </div>
            @endforeach
            {!! $shelters->render() !!}
        </div>
    </div>
    @endsection

