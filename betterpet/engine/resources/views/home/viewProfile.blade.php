@extends('layout.template-about')

@section('content')
<style>
    body {
        background-color:#dfeef7;  
        height: 100%;
    }
</style>
<div class='container-fluid page-wrap'>
    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-sm-12 col-xs-12" style="background-color:white; min-height: 100%; margin-top:8%;">
            <div class="col-md-2 col-sm-2" style="margin-top:5%;margin-bottom:2%;padding-left:3%;">
                @if($user->avatar=="")
                <img src="http://placehold.it/200x200" alt="">
                @else
                <img width="200px" height="200px" src="{{URL::to('/engine/storage/app/userimage')}}/{{$user->avatar}}">
                @endif
                @if($check==1)
                <div>
                    <a style="color:white;text-decoration:none;" href="{{URL::to('/profile')}}"><button class="button btn pro" style="width:200px;margin-top:5%;background:#337ab7;color:white;"> Edit Profile</button></a> 
                </div>
                @endif
            </div>
            <div class="col-md-offset-1 col-sm-offset-1 col-md-5 col-sm-5" style="margin-top:3%;margin-bottom:2%;padding-left:4%;">
                <h1 >Hello, I am {{ $user->name }}!</h1>
                <ul style="padding: 0;">
                    <li style="display:inline;">{{$domicile}}</li>
                    <li style="display:inline;">&#8226 Member since {{$user->created_at->format('d/m/y')}}</li>
                </ul>

                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a data-target="#home" data-toggle="tab" >Profile</a></li>
                    <li><a data-target="#adoptions" data-toggle="tab">Adoptions</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="home">

                        <div class="panel panel-default" style="margin-top:8%;">
                            <div class="panel-heading">About Me</div>
                            <div class="panel-body">
                                <p>You can call me at {{$user->phone}}</p>
                                <p>{{$description}}</p>
                            </div>
                        </div>      
                    </div>
                    <div class="tab-pane" id="adoptions">
                        <h3 style="margin-top:8%;">Adoptions owned</h3>
                        <div class="row">
                            @if($check==1)
                            <h5>Add new adoption post <button style="margin-left:3%;" type="button" data-toggle="modal" data-target="#myModal">
                                <span class="glyphicon glyphicon-edit"></span>  
                                </button>
                            </h5>
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

                            @endif
                        </div>
                        <div class='row'>
                            @foreach($adoptions as $adoption)
                                <h4>{{$adoption->name}}</h4>
                                <a href="{{URL::to('/adoption')}}/{{$adoption->id}}">View</a>
                                @if($check==1)
                                <a href="{{URL::to('/adoption')}}/edit/{{$adoption->id}}">Edit</a>
                                <form action="{{URL::to('/adoption')}}/delete/{{$adoption->id}}" method="POST">
                                    {!! csrf_field() !!}
                                    <button type="submit">delete</button>
                                </form>
                                @endif
                                <hr>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>


        </div>      
    </div>
</div>

@endsection