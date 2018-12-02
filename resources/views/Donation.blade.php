@extends('layout')
@section('title','Donations')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 main-content">
        <br/>
            <h3 align="left">Donation form</h3>
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
            @if(\Session::has('unsuccess')) <!-- กรณีไม่สำเร็จ -->
                <div class="alert alert-success"> 
                    <p>{{ \Session::get('unsuccess') }}</p> 
                </div> 
            @endif 
            <br>
            <form method="post" action="store" enctype="multipart/form-data"> 
                <label>Donor:</label> <input type="text" name="Donor" class="form-control" placeholder="donor" /> <br>
                <label>Delivered Date:</label> <input type="date" name="Date_donate" class="form-control" /> <br>
                <label>Artist:</label> <input type="text" name="Artist" class="form-control" placeholder="artist" /> <br>
                <label>Title:</label> <input type="text" name="Title" class="form-control" placeholder="title" /> <br>
                <label>Year:</label> <input type="text" name="Year" class="form-control" placeholder="year" /> <br>
                <label>Origin:</label> <input type="text" name="Origin" class="form-control" placeholder="origin" /> <br>
                <label>Epoch:</label> <input type="text" name="Epoch" class="form-control" placeholder="epoch" /> <br>
                <label>Desciption:</label> <textarea name="Description" class="form-control" rows="5" placeholder="description"></textarea> <br>
                <label>Type of art:</label> <div class="form-group">

<!--#################################################################################################################### -->
                <select onchange="select_art_type(this);" class="form-control" name="Type_Art">
                    <option value="0">Please select type of art.</option>
                    <option value="1">Painting</option>
                    <option value="2">Sculpture</option>
                    <option value="3">Statue</option>
                    <option value="4">Others</option>
                </select><br>
    <!-- **************** Form : after select type of art ******************** -->
        <!--  Painting [ attribute ] -->
        <div id="ifPainting" style="display: none;" class="form-control">
                <label for="art_type_painting">Paint type : </label> <input type="text" id="painting" name="paint_type" class="form-control"/>
                <label for="art_type_painting">Draw on : </label> <input type="text" id="painting" name="paint_draw_on" class="form-control"/>
                <label for="art_type_painting">Style : </label> <input type="text" id="painting" name="paint_style" class="form-control"/>
                </br>
        </div>
        <!--  Sculpt [ attribute ] -->
        <div id="ifSculpt" style="display: none;" class="form-control">
                <label for="art_type_sculpt">Material : </label> <input type="text" id="sculpt" name="sculpt_material" class="form-control"/>
                <label for="art_type_sculpt">Height : </label> <input type="text" id="sculpt" name="sculpt_height" class="form-control"/>
                <label for="art_type_sculpt">Weight : </label> <input type="text" id="sculpt" name="sculpt_weight" class="form-control"/>
                <label for="art_type_sculpt">Style : </label> <input type="text" id="sculpt" name="sculpt_style" class="form-control"/>
                </br>
        </div>
        <!--  Statue [ attribute ] -->
        <div id="ifStatue" style="display: none;" class="form-control">
                <label for="art_type_statue">Height : </label> <input type="text" id="statue" name="statue_height" class="form-control"/>
                <label for="art_type_statue">Weight : </label> <input type="text" id="statue" name="statue_weight" class="form-control"/>
                </br>
        </div>        
        <!--  Other [ attribute ] -->
        <div id="ifOther" style="display: none;" class="form-control">
                <label for="art_type_other">Type : </label> <input type="text" id="art_type_other" name="other_type" class="form-control"/>
                <label for="art_type_other">Style : </label> <input type="text" id="art_type_other" name="other_style" class="form-control"/>
                </br>
        </div>

    <!-- **************** Script : after select type of art ******************** -->
            <script>
                function select_art_type(that) {
                    document.getElementById("ifPainting").style.display = "none"; 
                    document.getElementById("ifSculpt").style.display = "none"; 
                    document.getElementById("ifStatue").style.display = "none"; 
                    document.getElementById("ifOther").style.display = "none"; 
                    switch (that.value){
                        case "1" : document.getElementById("ifPainting").style.display = "block"; break; 
                        case "2" : document.getElementById("ifSculpt").style.display = "block"; break; 
                        case "3" : document.getElementById("ifStatue").style.display = "block"; break; 
                        case "4" : document.getElementById("ifOther").style.display = "block"; break;
                        default : document.getElementById("ifSelectNothing").style.display = "none"; break ;
                    }
                }
            </script>
            
<!--#################################################################################################################### -->
                    </div>
                    <label> Choose file for upload: </label><br>
                    <input type="file" name="image" />
                    <span class="text-muted">jpg, png, gif</span><br><br>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit" /> <br><br>
            </form>
        </div>
    </div>
</div>
@endsection
