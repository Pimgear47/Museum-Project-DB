@extends('layout')
@section('title','Collection')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 main-content">
        <br>
        <br>
            <h1>Collections</h1>
            <br>
            <table class="table table-bordered table-striped"> 
                <tr> 
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Type</th> 
                    <th>Description</th>
                    <th>Responsible person</th>
                    <th>Detail</th>    
                    @if(auth()->check() && Auth::user()->status_admin == "1")
                    <div align="right"><a href="{{action('CollectionController@create')}}" class="btn btn-primary">CREATE</a></div><br>
                        <th>Edit</th>
                        <th>Delete</th>
                    @endif  
                    </tr> 
                        @foreach($collections as $row) 
                    <tr> 
                    <td> <img src="{{ url('img/collections/'.$row['picture']) }}" alt="{{$row['picture']}}" width="160"/></td>
                    <td>{{$row['Name']}}</td> 
                    <td>{{$row['Type']}}</td> 
                    <td>{{$row['Description']}}</td> 
                    <td>{{$row['Contact_person_Name']}}</td> 
                    <th>
                        <a href="{{action('CollectionController@show',$row['Coll_id'])}}" class="btn btn-info">Detail</button> 
                    </th>
                    @if(auth()->check() && Auth::user()->status_admin == "1")
                        <th><a href="{{action('CollectionController@edit',$row['Coll_id'])}}" class="btn btn-warning">Edit</a></th>
                        <th>
                            <form method="post" class="delete_form" action="{{action('CollectionController@destroy',$row['Coll_id'])}}">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE" />
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button> 
                            </form>
                        </th>
                    @endif 
                    @endforeach 
                </tr> 
            </table> <br><br>
        </div>
    </div>
</div>
@endsection