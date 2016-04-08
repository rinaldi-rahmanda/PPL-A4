@extends('layout.template-about')

@section('content')
<script>
    $(document).ready(function(){
        $("#upfile1").click(function () {
            $("#file1").trigger('click');
        });
    }); 
</script>
<div class='container-fluid'>
    <div class="row">
        <div class="row">
            <div class="col-md-offset-2 col-md-4" style="margin-top:8%;margin-bottom:2%;">
                <h2 >Hello, {{ $user->name }}</h2>
            </div>
        </div>
        <div class="col-md-offset-2 col-md-2">
            <img src="http://placehold.it/200x200" alt="">
            <div class="ava-caption">
                Edit your avatar
                <img src="image/pen.png" id="upfile1" style="cursor:pointer" width="20" height="20" style="float:right;"/>
                <input form="profile-form" type="file" id="file1"  name="profilePicture" style="display:none" />
            </div>
            <div>
                <button class="button"> <a href="{{URL::to('/viewProfile')}}">View Profile</a> </button>
            </div>
        </div>      
        <div class="col-md-offset-1 col-md-5 col-xs-6">
            <form id="profile-form" class="form-horizontal" method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="register-form profile-form form-control" name="name" value="{{$user->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddressl3" class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                        <input type="text" class="register-form profile-form form-control" name="address" value="{{$address}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Domicile</label>
                    <div class="col-sm-9">
                        @if($domicile=="None") 
                        <h5> No domicile entered</h5>
                    </div>
                    <label for="inputPassword3" class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
                        <select class="register-form form-control" name="domicile">
                            <option value="" disabled selected>Add domicile</option>
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

                    @else
                    <h5>{{ $domicile }}</h5>
                </div>
                <label for="inputPassword3" class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                    <select class="register-form form-control" name="domicile">
                        <option value="" disabled selected>Change domicile</option>
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
                @endif



                </div>
            <div class="form-group">
                <label for="inputPhone" class="col-sm-3 control-label">Phone number</label>
                <div class="col-sm-9">
                    <input type="text" class="register-form profile-form form-control" name="phone" value="{{$phone}}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputDesc" class="col-sm-3 control-label">Description</label>
                <div class="col-sm-9">
                    <textarea class="register-form profile-form form-control" name="description">{{$description}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="register-button btn btn-success">Update Profile</button>
            </div>
            </form>
    </div>
</div>
</div>
@endsection