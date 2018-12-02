@extends('layout')
@section('title','Show Exhibition')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 main-content">
        <br>
        <br>
            <h1>Exhibition: {{$exhibitions->Name}}</h1>
            <h2>Available: {{$exhibitions->Start_date}} to {{$exhibitions->End_date}}</h2>
            <h2>Registrants: {{$exhibitions->Booked}}/{{$exhibitions->Limit_visit}}</h2>
            <h4>Art objects in this exhibition</h4>
            <br>
            @if(\Session::has('success')) <!-- กรณีสำเร็จ -->
                <div class="alert alert-success"> 
                    <p>{{ \Session::get('success') }}</p> 
                </div> 
            @endif 
            @if(\Session::has('unsuccess')) <!-- กรณีสำเร็จ -->
                <div class="alert alert-danger"> 
                    <p>{{ \Session::get('unsuccess') }}</p> 
                </div> 
            @endif 
            <table class="table table-bordered table-striped"> 
                <tr>
                    <td>picture</td>
                    <td>Title</td>
                    <td>Type of art</td>
                    <td>Artist</td>
                </tr>
                @foreach($exhibitionHasArts as $row) 
                    @if($row->exhibition_id == $exhibitions->Ex_id)
                        <tr>
                            <td> <img src="{{ url('img/art_objs/'.$row->Art_obj->picture) }}" alt="{{$row->Art_obj->picture}}" width="100"/></td>
                            <td>{{$row->Art_obj->Title}}</td>
                            <td>{{$row->Art_obj->Type_of_art}}</td>
                            <td>{{$row->Art_obj->Artist}}</td>
                        </tr>
                    @endif
                @endforeach
            </table><br>
            <div align="center">
            @if(auth()->check() && Auth::user()->status_admin == "0")
                <a role="button" class="btn btn-primary" onclick="return confirm('Are you sure?')" href="/enroll/{{ $exhibitions->Ex_id }}/{{Auth::user()->id}}" >Enroll</a> <br><br>
            @else
                <h5 style="color:red;">Please login if you want to enroll this exhibition.</h5><br><br>
            @endif 
            </div>
        </div>
    </div>
</div>
@endsection

