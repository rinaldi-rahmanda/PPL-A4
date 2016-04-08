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

        <div class="col-md-offset-2 col-md-2" style="margin-top:10%;margin-bottom:2%;">
            <img src="http://placehold.it/200x200" alt="">
        </div>
        <div class="col-md-offset-1 col-md-5" style="margin-top:8%;margin-bottom:2%;">
            <h1 >Hello, I am {{ $user->name }}!</h1>
            <ul style="padding: 0;"><li style="display:inline;">{{ $domicile }}</li><li style="display:inline;padding-left:10px;">&#8226 Member since</li></ul>
            <div class="panel panel-default">
                <div class="panel-heading">About Me</div>
                <div class="panel-body">
                    <p>{{$description}}</p>
                </div>
            </div>      
        </div>
    </div>
</div>
@endsection