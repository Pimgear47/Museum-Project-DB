@extends('layout')
@section('title','Edit Sculpture')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <br>
            <h3 align="center">Edit Sculpture</h3>
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
            <form method="post" action="{{action('SculptureController@update', $art_obj_Id_no)}}" enctype="multipart/form-data">  {{csrf_field()}} 
                <div class="form-group">
                    <label> Title: </label> <input type="text" name="Title" class="form-control" placeholder="Title" value="{{$art_objs->Title}}" /> 
                </div>
                <div class="form-group">
                    <label> Artist: </label> <input type="text" name="Artist" class="form-control" placeholder="Artist" value="{{$art_objs->Artist}}" /> 
                </div>
                <div class="form-group">
                    <label> Year: </label> <input type="text" name="Year" class="form-control" placeholder="Year" value="{{$art_objs->Year}}" /> 
                </div>
                <div class="form-group">
                    <label> Origin: </label> <input type="text" name="Origin" class="form-control" placeholder="Origin" value="{{$art_objs->Origin}}" /> 
                </div>
                <div class="form-group">
                    <label> Epoch: </label> <input type="text" name="Epoch" class="form-control" placeholder="Epoch" value="{{$art_objs->Epoch}}" /> 
                </div>
                <div class="form-group">
                    <label> Description: </label> <textarea name="Description" class="form-control" rows="5" placeholder="description">{{$art_objs->Description}}</textarea> 
                </div>
                <div class="form-group">
                <label> Material: </label><input type="text" name="Material" class="form-control" placeholder="Material" value="{{$sculptures->Material}}" /> 
                </div>
                <div class="form-group">
                <label> Height: </label><input type="text" name="Height" class="form-control" placeholder="Height" value="{{$sculptures->Height}}" /> 
                </div>
                <div class="form-group">
                <label> Weight: </label><input type="text" name="Weight" class="form-control" placeholder="Weight" value="{{$sculptures->Weight}}" /> 
                </div>
                <div class="form-group">
                <label> Style: </label><input type="text" name="Style" class="form-control" placeholder="Style" value="{{$sculptures->Style}}" /> 
                </div>
                <label>Type of Collection:</label> <div class="form-group">
                <label>Type of Collection:</label> <div class="form-group">
                @php
                    $Coll = $art_objs->Type_of_coll;
                @endphp
                <select onchange="select_coll_type(this);" class="form-control" name="Type_Coll">
                    <option value="1" @if($Coll=="permanent") selected="selected" @endif> Permanent </option>
                    <option value="2" @if($Coll=="borrowed") selected="selected" @endif> Borrowed </option>
                    <option value="3" @if($Coll=="donated") selected="selected" @endif> Donated </option>
                </select><br>
                <!-- **************** Form : after select type of coll ******************** -->
                <!--  permanent [ attribute ] -->
                
                <div id="ifpermanent" class="form-control" @if($Coll=="permanent") style="display: block;" @endif @if($Coll=="borrowed") style="display: none;" @endif @if($Coll=="donated") style="display: none;" @endif>
                        <label for="coll_type_permanent">Collections Name : </label> <input type="text" id="permanent" name="permanent_name" class="form-control" @if($Coll=="permanent") value="{{$permanents->Collections_Name}}" @endif/><br>
                        <label for="coll_type_permanent">Date acquired : </label> <input type="date" id="permanent" name="permanent_date" class="form-control" @if($Coll=="permanent") value="{{$permanents->Date_acquired}}" @endif/><br>
                        <label for="coll_type_permanent">Status : </label> <input type="text" id="permanent" name="permanent_status" class="form-control" @if($Coll=="permanent") value="{{$permanents->Status}}" @endif /><br>
                        <label for="coll_type_permanent">Cost : </label> <input type="text" id="permanent" name="permanent_costs" class="form-control" @if($Coll=="permanent") value="{{$permanents->Cost}}" @endif/>
                        </br>
                </div>
                
                <!--  borrowed [ attribute ] -->
                <div id="ifborrowed" class="form-control" @if($Coll=="borrowed") style="display: block;" @endif @if($Coll=="permanent") style="display: none;" @endif @if($Coll=="donated") style="display: none;" @endif>
                        <label for="coll_type_borrowed">Collections Name : </label> <input type="text" id="borrowed" name="borrowed_name" class="form-control" @if($Coll=="borrowed") value="{{$borrowed->Collections_Name}}" @endif/><br>
                        <label for="coll_type_borrowed">Date borrowed : </label> <input type="date" id="borrowed" name="borrowed_date_borrowed" class="form-control" @if($Coll=="borrowed") value="{{$borrowed->Date_borrowed}}" @endif /><br>
                        <label for="coll_type_borrowed">Date returned : </label> <input type="date" id="borrowed" name="borrowed_date_returned" class="form-control" @if($Coll=="borrowed") value="{{$borrowed->Date_returned}}" @endif />
                        </br>
                </div>
                
                <!--  donated [ attribute ] -->
                <div id="ifdonated" class="form-control" @if($Coll=="borrowed") style="display: none;" @endif @if($Coll=="permanent") style="display: none;" @endif @if($Coll=="donated") style="display: block;" @endif>
                        <label for="coll_type_donated">Date_donate : </label> <input type="date" id="donated" name="donated_date" class="form-control" @if($Coll=="donated") value="{{$donated->Date_donate}}" @endif/><br>
                        <label for="coll_type_donated">Donor : </label> <input type="text" id="donated" name="donated_donor" class="form-control" @if($Coll=="donated") value="{{$donated->Donor}}" @endif />
                        </br>            
                </div><br>
                <!-- **************** Script : after select type of coll ******************** -->
                <script>
                function select_coll_type(that) {
                    document.getElementById("ifpermanent").style.display = "none"; 
                    document.getElementById("ifborrowed").style.display = "none"; 
                    document.getElementById("ifdonated").style.display = "none"; 
                    switch (that.value){
                        case "1" : document.getElementById("ifpermanent").style.display = "block"; break; 
                        case "2" : document.getElementById("ifborrowed").style.display = "block"; break; 
                        case "3" : document.getElementById("ifdonated").style.display = "block"; break; 
                        default : document.getElementById("ifSelectNothing").style.display = "none"; break ;
                    }
                }
                </script>
                <img src="{{ url('img/art_objs/'.$art_objs->picture) }}" alt="{{$art_objs->picture}}" width="120"/><br><br>
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
</div></div></div>
@endsection


