@extends('layout')
@section('title','Show Collection')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 main-content">
        <br>
        <br>
            <h1>Collection: {{$collections->Name}}</h1>
            <h3>Responsible person : {{$Person[0]->Name}}</h3>
            <h4>Address {{$Person[0]->Address}} Tel.{{$Person[0]->Phone}}</h4>
            <hr>
            <h3>Art objects in this collection</h3>
            <br>
        <table class="table table-bordered table-striped"> 
            @if($collections->Type == 'museum' )   
                <tr>
                    <td>Picture</td>
                    <td>Title</td>
                    <td>Status</td>
                    <td>Cost (USD)</td>
                </tr>          
                @foreach($permanents as $row) 
                    <tr>
                    <td> <img src="{{ url('img/art_objs/'.$row->Art_obj->picture) }}" alt="{{$row->Art_obj->picture}}" width="100"/></td>
                        <td>{{$row->Art_obj->Title}}</td>
                        <td>{{$row->Status}}</td>
                        <td>{{$row->Cost}}</td>
                    </tr>
                @endforeach 
            @endif
            @if($collections->Type == 'personal' )
                <tr>
                    <td>Picture</td>
                    <td>Title</td>
                </tr>    
                @foreach($borrowed as $row) 
                    <tr>
                    <td> <img src="{{ url('img/art_objs/'.$row->Art_obj->picture) }}" alt="{{$row->Art_obj->picture}}" width="100"/></td>
                        <td>{{$row->Art_obj->Title}}</td>
                    </tr>
                @endforeach 
            @endif
            
            </table> 
        </div>
    </div>
</div>
@endsection

