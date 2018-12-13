@extends('layout')
@section('title','Donation arts')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 main-content">
        <br>
        <br>
            <h1>Art from domnation</h1>
            <br>
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
                    <th>Delivered date</th>
                    <th>Donor</th> 
                    @if(auth()->check() && Auth::user()->status_admin == "1")
                        <!-- <th>Display</th> -->
                        <th>Delete</th>
                    @endif  
                    </tr> 
                    @foreach($DonateArt as $row) 
                        <tr> 
                        <td width="180"> <img src="{{ url('img/art_objs/'.$row->Art_obj->picture) }}" alt="{{$row->Art_obj->picture}}" width="150"/></td>
                        <td>{{$row->Art_obj->Title}}</td> 
                        <td>{{$row['Date_donate']}}</td> 
                        <td>{{$row['Donor']}}</td> 
                        @if(auth()->check() && Auth::user()->status_admin == "1")
                            <!-- @if($row->status_display== "0")
                                <th>
                                    <form method="post" action="/artfromyou">
                                        <input type="hidden" name="artfromyou" value="$row->art_obj_Id_no"/>
                                        <button class="btn btn-success" type="submit">
                                            Show now
                                        </button>
                                    </form>
                                </th>
                            @endif
                            @if($row->status_display== "1")
                                <th>
                                    <form method="post" action="/artfromyou">
                                        <input type="hidden" name="artfromyou" value="$row->art_obj_Id_no"/>
                                        <button class="btn btn-danger" type="submit">
                                            Hide now
                                        </button>
                                    </form>
                                </th>
                            @endif -->
                            <th>
                                <form method="post" class="delete_form" action="{{action('DonationController@destroy',$row['art_obj_Id_no'])}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button> 
                                </form>
                            </th>
                        @endif 
                    @endforeach             
                </tr> 
            </table> 
        </div>
    </div>
</div>
@endsection

