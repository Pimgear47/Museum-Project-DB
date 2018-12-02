@extends('layout')
@section('title','Edit Exhibition')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 main-content">
        <br>
            <h3 align="center">Edit Exhibition</h3>
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
            <form method="post" action="{{action('ExhibitionController@update', $Ex_id)}}" enctype="multipart/form-data">  {{csrf_field()}} 
                <div class="form-group">
                    <label> Name: </label> <input type="text" name="Name" class="form-control" placeholder="Name" value="{{$exhibitions->Name}}" /> 
                </div>
                <div class="form-group">
                    <label> Start date: </label> <input type="date" name="Start" class="form-control" value="{{$exhibitions->Start_date}}" />
                </div>
                <div class="form-group">
                    <label> End date: </label> <input type="date" name="End" class="form-control" value="{{$exhibitions->End_date}}" />
                </div>
                <div class="form-group">
                    <label> Limit visit: </label> <input type="text" name="Limit" class="form-control" placeholder="limit" value="{{$exhibitions->Limit_visit}}" /> 
                </div>
                <img src="{{ url('img/exhibitions/'.$exhibitions->picture) }}" alt="{{$exhibitions->picture}}" width="200"/><br><br>
                <div class="form-group">
                    <label> Choose file for upload: </label><br>
                    <input type="file" name="image" />
                    <span class="text-muted">jpg, png, gif</span><br><br>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="form-group"> 
                    <input type="submit" class="btn btn-primary" value="UPDATE" /> 
                </div>
                <input type="hidden" name="_method" value="PATCH" /> 
                <!-- //ต้องมี PATCH -->
            </form>
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="css/app.css">
@endsection


