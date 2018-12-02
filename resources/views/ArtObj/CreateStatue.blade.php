@extends('layout')
@section('title','Create Statue')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br>
            <h3 align="center">Create Statue</h3>
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
                <form method="post" action="{{action('StatueController@store')}}" enctype="multipart/form-data">  {{csrf_field()}} 
                    <div class="form-group">
                        <label> Title: </label> <input type="text" name="Title" class="form-control" placeholder="Title"/> 
                    </div>
                    <div class="form-group">
                        <label> Artist: </label> <input type="text" name="Artist" class="form-control" placeholder="Artist"/> 
                    </div>
                    <div class="form-group">
                        <label> Year: </label> <input type="text" name="Year" class="form-control" placeholder="Year"/> 
                    </div>
                    <div class="form-group">
                        <label> Origin: </label> <input type="text" name="Origin" class="form-control" placeholder="Origin"/> 
                    </div>
                    <div class="form-group">
                        <label> Epoch: </label> <input type="text" name="Epoch" class="form-control" placeholder="Epoch"/> 
                    </div>
                    <div class="form-group">
                        <label> Description: </label> <textarea name="Description" class="form-control" rows="5" placeholder="description"></textarea> 
                    </div>
                    <div class="form-group">
                    <label> Height: </label><input type="text" name="Height" class="form-control" placeholder="Height"/> 
                    </div>
                    <div class="form-group">
                    <label> Weight: </label><input type="text" name="Weight" class="form-control" placeholder="Weight"/> 
                    </div>
                    <label>Type of Collection:</label> <div class="form-group">
                    <select onchange="select_coll_type(this);" class="form-control" name="Type_Coll">
                        <option value="0">Please select type of collection.</option>
                        <option value="1">Permanent</option>
                        <option value="2">Borrowed</option>
                    </select><br>
                    <!-- **************** Form : after select type of coll ******************** -->
                    <!--  permanent [ attribute ] -->
                    <div id="ifpermanent" style="display: none;" class="form-control">
                            <label for="coll_type_permanent">Collections Name : </label> <input type="text" id="permanent" name="permanent_name" class="form-control"/><br>
                            <label for="coll_type_permanent">Date acquired : </label> <input type="date" id="permanent" name="permanent_date" class="form-control"/><br>
                            <label for="coll_type_permanent">Status : </label> </label> <select class="form-control" name="permanent_status">
                                                                                    <option value="1">On display</option>
                                                                                    <option value="2">On loan</option>
                                                                                    <option value="3">Stored</option>
                                                                                </select><br>
                            <label for="coll_type_permanent">Cost : </label> <input type="text" id="permanent" name="permanent_costs" class="form-control"/>
                            </br>
                    </div>
                    <!--  borrowed [ attribute ] -->
                    <div id="ifborrowed" style="display: none;" class="form-control">
                            <label for="coll_type_borrowed">Collections Name : </label> <input type="text" id="borrowed" name="borrowed_name" class="form-control"/><br>
                            <label for="coll_type_borrowed">Date borrowed : </label> <input type="date" id="borrowed" name="borrowed_date_borrowed" class="form-control"/><br>
                            <label for="coll_type_borrowed">Date returned : </label> <input type="date" id="borrowed" name="borrowed_date_returned" class="form-control"/>
                            </br>
                    </div><br>
                    <!-- **************** Script : after select type of coll ******************** -->
                    <script>
                    function select_coll_type(that) {
                        document.getElementById("ifpermanent").style.display = "none"; 
                        document.getElementById("ifborrowed").style.display = "none"; 
                        switch (that.value){
                            case "1" : document.getElementById("ifpermanent").style.display = "block"; break; 
                            case "2" : document.getElementById("ifborrowed").style.display = "block"; break; 
                            default : document.getElementById("ifSelectNothing").style.display = "none"; break ;
                        }
                    }
                    </script>
                    <div class="form-group">
                        <label> Choose file for upload: </label><br>
                        <input type="file" name="image" />
                        <span class="text-muted">jpg, png, gif</span><br><br>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                    <div class="form-group"> 
                        <input type="submit" class="btn btn-primary" value="CREATE" /> 
                    </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection


