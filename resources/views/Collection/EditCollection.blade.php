@extends('layout')
@section('title','Edit Collection')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 main-content">
        <br>
            <h3 align="center">Edit Collection</h3>
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
            <form method="post" action="{{action('CollectionController@update', $Coll_id)}}" enctype="multipart/form-data">  {{csrf_field()}} 
                <div class="form-group">
                    <label> Name: </label> <input type="text" name="Name" class="form-control" placeholder="Name" value="{{$collections->Name}}" /> 
                </div>
                <div class="form-group">
                    <label> Type: </label> <input type="text" name="Type" class="form-control" value="{{$collections->Type}}" />
                </div>
                <div class="form-group">
                    <label> Responsible person: </label> <input type="text" name="Person" class="form-control" value="{{$collections->Contact_person_Name}}" />
                </div>
                <div class="form-group">
                    <label> Description: </label> <textarea name="Description" class="form-control" rows="5" placeholder="description">{{$collections->Description}}</textarea>  
                </div>
                <img src="{{ url('img/collections/'.$collections->picture) }}" alt="{{$collections->picture}}" width="200"/><br><br>
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


