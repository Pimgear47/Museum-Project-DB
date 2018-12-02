@extends('layout')
@section('title','Artist')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 main-content">
        <br>
        <br>
            <h1>ARTIST</h1>
            <br>
            <table class="table table-bordered table-striped"> 
                <tr> 
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Born</th> 
                    <th>Died</th>
                    <th>Country of origin</th>
                    <th>Epoch</th>
                    <th>Main Style</th>
                    <th>Description</th>
                    @if(auth()->check() && Auth::user()->status_admin == "1")
                    <div align="right"><a href="{{action('ArtistController@create')}}" class="btn btn-primary">CREATE</a></div><br>
                        <th>Edit</th>
                        <th>Delete</th>
                    @endif                
                    </tr> 
                        @foreach($artists as $row) 
                    <tr> 
                    <td> <img src="{{ url( 'img/artists/'.$row['picture'] ) }}" alt="{{$row['picture']}}" width="120"/></td>
                    <td>{{$row['Name']}}</td> 
                    <td>{{$row['Date_Born']}}</td> 
                    <td>{{$row['Date_Died']}}</td> 
                    <td>{{$row['Country_of_origin']}}</td> 
                    <td>{{$row['Epoch']}}</td> 
                    <td>{{$row['Main_style']}}</td> 
                    <td>{{$row['Description']}}</td>
                    @if(auth()->check() && Auth::user()->status_admin == "1")
                        <th><a href="{{action('ArtistController@edit',$row['Artist_id'])}}" class="btn btn-warning">Edit</a></th>
                        <th>
                            <form method="post" class="delete_form" action="{{action('ArtistController@destroy',$row['Artist_id'])}}">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE" />
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button> 
                            </form>
                        </th>
                    @endif 
                </tr> 
                @endforeach 
            </table> <br><br>
        </div>
    </div>
</div>
@endsection


