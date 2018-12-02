@extends('layout')
@section('title','Exhibition')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 main-content">
        <br>
        <br>

            <h1>Exhibition</h1>
            <br>
            <table class="table table-bordered table-striped"> 
                <tr> 
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Start date</th>
                    <th>End date</th>
                    <th>Registrants</th>
                    <th>Detail</th>
                    @if(auth()->check() && Auth::user()->status_admin == "1")
                    <div align="right"><a href="{{action('ExhibitionController@create')}}" class="btn btn-primary">CREATE</a></div><br>
                        <th>Edit</th>
                        <th>Delete</th>
                    @endif 
                    </tr> 
                        @foreach($exhibitions as $row) 
                    <tr> 
                        <td> <img src="{{ url('img/exhibitions/'.$row['picture']) }}" alt="{{$row['picture']}}" width="160"/></td>
                        <td>{{$row['Name']}}</td> 
                        <td>{{$row['Start_date']}}</td>
                        <td>{{$row['End_date']}}</td> 
                        <td>{{$row['Booked']}}/{{$row['Limit_visit']}}</td>
                        <th>
                            <a href="{{action('ExhibitionController@show',$row['Ex_id'])}}" class="btn btn-info">Detail</button> 
                        </th>
                        @if(auth()->check() && Auth::user()->status_admin == "1")
                            <th><a href="{{action('ExhibitionController@edit',$row['Ex_id'])}}" class="btn btn-warning">Edit</a></th>
                            <th>
                                <form method="post" class="delete_form" action="{{action('ExhibitionController@destroy',$row['Ex_id'])}}">
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