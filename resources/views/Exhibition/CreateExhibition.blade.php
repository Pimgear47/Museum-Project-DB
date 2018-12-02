@extends('layout')
@section('title','Create Exhibition')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 main-content">
        <br>
            <h3 align="center">Create Exhibition</h3>
            @if(count($errors) > 0) <!-- กรณีผิดพลาด -->
                <div class="alert alert-danger">
                <ul> 
                    @foreach($errors->all() as $error) 
                        <li>{{$error}}</li> 
                    @endforeach 
                </ul> 
                </div> 
            @endif 
            @if(\Session::has('success')) <!-- กรณีสำเร็จ -->
                <div class="alert alert-success"> 
                    <p>{{ \Session::get('success') }}</p> 
                </div> 
            @endif 
            <br>
            <form method="post" action="{{action('ExhibitionController@store')}}" enctype="multipart/form-data">  {{csrf_field()}} 
                <div class="form-group">
                    <label> Name: </label> <input type="text" name="Name" class="form-control" placeholder="Name"/> 
                </div>
                <div class="form-group">
                    <label> Start date: </label> <input type="date" name="Start" class="form-control"/>
                </div>
                <div class="form-group">
                    <label> End date: </label> <input type="date" name="End" class="form-control"/>
                </div>
                <div class="form-group">
                    <label> Limit visit: </label> <input type="text" name="limit" class="form-control" placeholder="limit"/> 
                </div>
            
                <div class="form-group">
                    <label> Choose file for upload: </label><br>
                    <input type="file" name="image" />
                    <span class="text-muted">jpg, png, gif</span><br><br>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="form-group"> 
                    <input type="submit" class="btn btn-primary" value="CREATE" /> 
                </div>
            </form>
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="css/app.css">
@endsection


