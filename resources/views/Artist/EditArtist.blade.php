@extends('layout')
@section('title','Edit Artist')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 main-content">
        <br>
            <h3 align="center">Edit Artist</h3>
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
            <form method="post" action="{{action('ArtistController@update', $Artist_id)}}" enctype="multipart/form-data">  {{csrf_field()}} 
                <div class="form-group">
                    <label> Name: </label> <input type="text" name="Name" class="form-control" placeholder="Name" value="{{$artists->Name}}" /> 
                </div>
                <div class="form-group">
                    <label> Born: </label> <input type="date" name="Born" class="form-control" value="{{$artists->Date_Born}}" />
                </div>
                <div class="form-group">
                    <label> Died: </label> <input type="date" name="Died" class="form-control" value="{{$artists->Date_Died}}" /> 
                </div>
                <div class="form-group">
                    <label> Country of origin: </label> <input type="text" name="Origin" class="form-control" placeholder="Origin" value="{{$artists->Country_of_origin}}" /> 
                </div>
                <div class="form-group">
                    <label> Epoch: </label> <input type="text" name="Epoch" class="form-control" placeholder="Epoch" value="{{$artists->Epoch}}" /> 
                </div>
                <div class="form-group">
                    <label> Main style: </label> <input type="text" name="MainStyle" class="form-control" placeholder="Main style" value="{{$artists->Main_style}}" /> 
                </div>
                <div class="form-group">
                    <label> Description: </label> <textarea name="Description" class="form-control" rows="5" placeholder="description">{{$artists->Description}}</textarea> 
                </div>
                <img src="{{ url('img/artists/'.$artists->picture) }}" alt="{{$artists->picture}}" width="120"/><br><br>
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


