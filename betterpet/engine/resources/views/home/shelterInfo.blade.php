@extends('layout.template-about')

@section('content')
<style>
    body {
        background-color:#dfeef7;  
        height: 100%;
    }
</style>
<script src="//cdn.ckeditor.com/4.5.8/standard/ckeditor.js"></script>
<div class='container-fluid'>
    <div class="row" style="margin-top:100px">
        <div class="col-md-12 col-sm-12 col-xs-12">
            @include('common.success')
            @include('common.error')
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-4 col-xs-4 col-sm-4">
                <img src="{{URL::to('/engine/storage/app/shelterimage')}}/{{$shelter->picture}}"
                class="img img-responsive img-rounded" style="max-width:100%;max-height: 100%">
            </div> 
            <div class="container col-md-8 col-xs-8 col-sm-8">
                <h2 class="text-center">{{$shelter->shelterName}}</h2>
                <h4 class="text-center">Owned by 
                    <a href="{{URL::to('/profile/view/')}}/{{$shelterOwner->id}}">
                        {{$shelterOwner->name}}
                    </a>
                </h4>
                <p class="text-center">
                    <?php
                        if ($shelter->numRating > 0) {
                            echo "Rating: " . ($shelter->rating / 100) . "/5";
                        } else {
                            echo "No ratings yet!";
                        }
                    ?>
                    <br>
                    @if(Auth::check())
                    <button type="button" class="register-button btn btn-primary" data-toggle="modal" data-target="#myModal">
                        <span class="glyphicon glyphicon-edit"></span> Leave a rating
                    </button>
                    @endif
                    @if(Auth::check() && $shelterOwner->id==Auth::user()->id)
                        <button class="register-button btn btn-success" data-toggle="modal" data-target="#editModal">Edit this shelter</button>
                        <!-- Modal -->
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Edit Shelter</h4>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::open(array('url'=>'shelter/edit/'.$shelter->id,'method'=>'POST', 'files'=>true)) !!}
                                        {!! csrf_field() !!}  
                                        <div class="form-group">
                                            <label class="in-form" for="exampleInputEmail1"  style="display:block;">Name of your shelter</label>
                                            <input type="text" name="shelterName" id="shelterName" class=" form-control" placeholder="shelterName" value="{{$shelter->shelterName}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="in-form" for="exampleInputEmail1"  style="display:block;">Address</label>
                                            <input type="text" name="address" value="{{$shelter->address}}" id="address" class=" form-control" placeholder="Address" required>
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
                                            <textarea class="form-control" name="description" placeholder="Anything useful and related informations about your shelter">{!!$shelter->description!!}</textarea>
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
                </p>
                <div class="panel panel-default">
                  <div class="panel-heading">Description about this shelter</div>
                  <div class="panel-body">
                     {!!$shelter->description!!}
                  </div>
                </div>
            </div>
        </div>
    </div>
    @if(Auth::check())
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Rate this shelter</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(array('url'=>'shelter/rate/'.$shelter->id,'method'=>'POST')) !!}
                        {!! csrf_field() !!}  
                        <div class="form-group">
                            <label class="in-form" for="exampleInputEmail1"  style="display:block;">Rating</label>
                            <label class="control-label"><input type="radio" name="rating" class=" form-control" value="100">1</label>
                            <label class="control-label"><input type="radio" name="rating" class=" form-control" value="200">2</label>
                            <label class="control-label"><input type="radio" name="rating" class=" form-control" value="300">3</label>
                            <label class="control-label"><input type="radio" name="rating" class=" form-control" value="400">4</label>
                            <label class="control-label"><input type="radio" name="rating" class=" form-control" value="500" checked>5</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @endif
</div>
@endsection