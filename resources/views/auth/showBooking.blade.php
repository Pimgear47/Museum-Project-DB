@extends('layout')
@section('title','Show Exhibition')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 main-content">
        <br>
        <br>
            <h1>My enrollment</h1>
            <br>
            @if(\Session::has('success')) <!-- กรณีสำเร็จ -->
                <div class="alert alert-success"> 
                    <p>{{ \Session::get('success') }}</p> 
                </div> 
            @endif 
            <table class="table table-bordered table-striped"> 
                <tr>
                    <td>No.</td>
                    <td>Picture</td>
                    <td>Name</td>
                    <td>Start</td>
                    <td>End</td>
                    <td>Cancel</td>
                </tr>
                @php
                    $i = 1;
                @endphp
                @foreach($list as $row) 
                        <tr>
                            <td>
                                {{$i++}}
                            </td>
                            <td> <img src="{{ url('img/exhibitions/'.$row->Exhibition->picture) }}" alt="{{$row->Exhibition->picture}}" width="150"/></td>
                            <td>{{$row->Exhibition->Name}}</td>
                            <td>{{$row->Exhibition->Start_date}}</td>
                            <td>{{$row->Exhibition->End_date}}</td>
                            <td><a role="button" class="btn btn-danger" onclick="return confirm('Are you sure?')" href="/cancel/{{ $row->Exhibition->Ex_id }}/{{Auth::user()->id}}">Cancel</a></td>
                        </tr>
                @endforeach
            </table><br><br><br>
        </div>
    </div>
</div>
@endsection

