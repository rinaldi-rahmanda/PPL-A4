

@extends('layout.template-about')
@section('content')
<style>
   body {
   background-color:#dfeef7;        
   }
</style>
<div class='container-fluid page-wrap' style='padding-top:6%; padding-bottom:3%;' >
<div class='news'>
   <div class="row">
      <div class="col-xs-8 col-xs-offset-1 col-md-6 col-md-offset-1 layout" style="border-radius:5px;">
         <h2>Find shelter for your pet!</h2>
         @include('common.error')
         <form method="POST">
            {!! csrf_field() !!}
            <div class="form-inline">
               <div class="form-group">
                  <label class="in-form" for="exampleInputEmail1" style="display:block;">Domicile</label>
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
                  <label class="in-form" for="exampleInputEmail1"  style="display:block;">Name</label>
                  <input type="text" name="name" id="name" class=" form-control" placeholder="Name" >
               </div>
               <div class="form-group">
                  <label class="in-form" for="exampleInputEmail1"  style="display:block;">Address</label>
                  <input type="text" name="address" id="address" class=" form-control" placeholder="Address" >
               </div>
            </div>
            <div class="form-group">
               <button type="submit" class="register-button btn btn-success">Search</button>
            </div>
         </form>
      </div>
   </div>
   <div class="row">
      <div class="col-md-10 col-md-offset-1">
         <h3>Featured Pets :</h3>
         <div class="col-xs-18 col-sm-6 col-md-4">
            <div class="thumbnail thumbnail-home">
               <img src="{{URL::to('/image/shelter1.jpg')}}" alt="">
               <div class="caption">
                  <h4>Shelter X</h4>
                  <p>
                     Lorem ipsum
                  </p>
                  <a href="#" class="btn btn-info btn-sm" role="button">Learn More</a>
               </div>
            </div>
         </div>
         <div class="col-xs-18 col-sm-6 col-md-4">
            <div class="thumbnail thumbnail-home">
               <img src="{{URL::to('/image/shelter2.jpg')}}" alt="">
               <div class="caption">
                  <h4>Shelter Y</h4>
                  <p>
                     Lorem ipsum
                  </p>
                  <a href="#" class="btn btn-info btn-sm" role="button">Learn More</a>
               </div>
            </div>
         </div>
         <div class="col-xs-18 col-sm-6 col-md-4">
            <div class="thumbnail thumbnail-home">
               <img src="{{URL::to('/image/shelter3.jpg')}}" alt="">
               <div class="caption">
                  <h4>Sheter Z</h4>
                  <p>Lorem ipsum
                  </p>
                  <a href="#" class="btn btn-info btn-sm" role="button">Learn More</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
       @foreach($shelters as $shelter)
            
       @endforeach
   </div>
</div>
@endsection

