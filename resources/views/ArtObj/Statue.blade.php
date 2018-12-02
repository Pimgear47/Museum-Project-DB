@extends('layout')
@section('title','Statue')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <br>
        <br>
            <h1>Statue</h1>
            <br>
            @if(auth()->check() && Auth::user()->status_admin == "1")
                <div align="right"><a href="{{action('StatueController@create')}}" class="btn btn-primary">CREATE</a></div>
            @endif <br>
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
            <table class="table table-bordered table-striped"> 
                <tr>
                    <th>Picture</th>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Year</th>
                    <th>Height</th>
                    <th>Weight</th>
                    <th>Origin</th>
                    <th>Epoch</th>
                    <th>Description</th>
                    @if(auth()->check() && Auth::user()->status_admin == "1")
                        <th>Edit</th>
                        <th>Delete</th>
                    @endif  
                    </tr> 
                        @foreach($statues as $row) 
                    <tr> 
                    <td> <img src="{{ url('img/art_objs/'.$row->Art_obj->picture) }}" alt="{{$row->Art_obj->picture}}" width="120"/></td>
                    <td>{{$row->Art_obj->Title}}</td>
                    <td>{{$row->Art_obj->Artist}}</td>
                    <td>{{$row->Art_obj->Year}}</td>
                    <td>{{$row['Height']}}</td> 
                    <td>{{$row['Weight']}}</td> 
                    <td>{{$row->Art_obj->Origin}}</td>
                    <td>{{$row->Art_obj->Epoch}}</td> 
                    <td>{{$row->Art_obj->Description}}</td> 
                    @if(auth()->check() && Auth::user()->status_admin == "1")
                        <th><a href="{{action('StatueController@edit',$row['art_obj_Id_no'])}}" class="btn btn-warning">Edit</a></th>
                        <th>
                            <form method="post" class="delete_form" action="{{action('StatueController@destroy',$row['art_obj_Id_no'])}}">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE" />
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button> 
                            </form>
                        </th>
                    @endif 
                </tr> 
                @endforeach 
            </table> 
        </div>
    </div>
</div>
@endsection