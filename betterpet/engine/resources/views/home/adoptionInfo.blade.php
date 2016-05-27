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
    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-xs-12" style="background-color:white; min-height: 100%; margin-top:8%;">
            <div class="col-md-2 col-sm-2 col-xs-12" style="margin-top:5%;margin-bottom:2%;padding-left:3%;">
                <img class="img-rounded" src="{{URL::to('/engine/storage/app/adoptionimage')}}/{{$adoption->picture}}" width="200px" height="200px" alt="">        
            </div>
            <div class="col-md-offset-1 col-md-5 col-xs-11 col-sm-11" style="margin-top:3%;margin-bottom:2%;padding-left:4%;">
                @if($adoption)
                <h1>{{$adoption->name}}</h1>
                @include('common.success')
                @include('common.error')
                @if($user && $user->id==$adoption->user_id)
                <form action="{{URL::to('/adoption')}}/delete/{{$adoption->id}}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <span class="glyphicon glyphicon-edit"></span> Edit this adoption info 
                        </button>
                        <button class="btn btn-danger" type="submit">delete</button>
                    </div>
                </form>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Edit this adoption</h4>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(array('url'=>'adoption/edit'.'/'.$adoption->id,'method'=>'POST', 'files'=>true)) !!}
                                {!! csrf_field() !!}  
                                <div class="form-group">
                                    <label class="in-form" for="exampleInputEmail1"  style="display:block;">Name of your pet</label>
                                    <input type="text" value="{{$adoption->name}}" name="name" id="name" class=" form-control" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <label class="in-form" for="exampleInputEmail1"  style="display:block;">Breed</label>
                                    <input type="text" value="{{$adoption->breed}}" name="breed" id="breed" class=" form-control" placeholder="Breed" required>
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
                                    <select class="form-control" name="sex">
                                        <option value="2">Female</option>
                                        <option value="3">Male</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="in-form" for="exampleInputEmail1"  style="display:block;">Description</label>
                                    <textarea class="form-control" name="description" placeholder="Anything useful and related informations about your pet like color,behaviour,etc">{{$adoption->description}}</textarea>
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
                
                @if($adoption->done=='1')
                <div class="alert alert-warning" role="alert">
                  This pet is already adopted
                </div>
                @endif
                <h4>Owner: <a href="{{URL::to('/profile/view')}}/{{$adoptionOwner->id}}">{{$adoptionOwner->name}}</a></h4>
                @if(!Auth::check())
                <h5><i>Want to adopt a pet ? Login <a href="{{URL::to('/login')}}">here</a></i></h5>
                @endif
                @if($user && $user->id==$adoption->user_id)
                <h5>Requested by {{$count}}</h5>
                <ul>
                    @foreach($requests as $personR)
                    <li><a href="{{URL::to('/profile/view')}}/{{$personR->id}}">{{$personR->name}}</a></li>
                    @endforeach
                </ul>
                @if($adoption->done=='0')
                <a href="{{URL::to('/adoption')}}/mark/{{$adoption->id}}"
                    class="btn btn-sm btn-success" style="margin-bottom: 5px">Mark as Done</a>
                @else
                <a href="{{URL::to('/adoption')}}/unmark/{{$adoption->id}}"
                    class="btn btn-sm btn-danger" style="margin-bottom: 5px">Unmark as Done</a>
                @endif
                @endif
                @if($user && $user->id!=$adoption->user_id && $adoption->done=='0')
                        @if($request)
                        <div class="form-group">
                            <form method="POST" action="{{URL::to('/adoption/request/cancel/')}}/{{$adoption->id}}">
                                {!! csrf_field() !!}
                                <button type="submit" class="btn btn-danger btn-sm">cancel request</button>
                            </form>
                        </div>
                        @else
                        <div class="form-group">
                            <form method="POST" action="{{URL::to('/adoption/request/')}}/{{$adoption->id}}">
                                {!! csrf_field() !!}
                                <button type="submit" class="btn btn-primary btn-sm">Request to adopt!</button>
                            </form>
                        </div>
                        @endif
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">About Me</div>
                    <div class="panel-body" style="word-wrap: break-word;">
                       <p>Breed: {{$adoption->breed}}</p>
                        <p>Sex: {{$adoption->sex}}</p>
                        <P>Age: {{$adoption->age}}</P>
                        <p>Description: </p>
                        <?php
                            echo $adoption->description;
                        ?>
                    </div>
                </div>
                <!--<ul>
                Requesting Users:
                <form method="POST" action="{{URL::to('/approve/')}}/{{$adoption->id}}">
                <select class="form-control" name="approved_user" required >
                @foreach($requests as $personR)
                    <option value="{{$personR->id}}">{{$personR->name}}</option>
                @endforeach
                </select>
                <input value="Approve" type="submit" class="form-control btn btn-sm btn-primary">
                </form>
                </ul>-->
                @else
                <h1>No Adoption Found</h1>
                @endif
            </div>
        </div>      
    </div>
</div>
@endsection