<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Statue;
use App\Art_obj;
use App\Permanent;
use App\Borrowed;
use App\Donated_collection;
use DB;
use Intervention\Image\ImageManagerStatic as Image;

class StatueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statues = Statue::with('Art_obj')->get();
        return view('ArtObj.Statue', compact('statues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ArtObj.CreateStatue');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'Title' => 'required',
            'Artist' => 'required',
            'Year' => 'required',
            'Origin' => 'required',
            'Epoch' => 'required',
            'Description' => 'required',
            'Height' => 'required',
            'Weight' => 'required',
            'Type_Coll'=> 'required',
        ));

        $last_line = DB::table('art_objs')->orderBy('Id_no', 'DESC')->first();
        $last = $last_line->Id_no;

        $art_objs = new Art_obj(
            ['Artist' => $request->get('Artist'),
            'Year' => $request->get('Year'),
            'Title' => $request->get('Title'),
            'Description' => $request->get('Description'),
            'Origin' => $request->get('Origin'),
            'Epoch' => $request->get('Epoch'),
            'Type_of_art'=>'3',
            'Type_of_coll'=>$request->input('Type_Coll'),
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('img/art_objs/' . $filename ) );
            $art_objs->picture = $filename;
            $art_objs->save();
        };
        $art_objs->save();

        $statues = new Statue([
            'art_obj_Id_no' => ++$last,
            'Height' => $request->get('Height'),
            'Weight' => $request->get('Weight'),
        ]);
        $statues->save();

        switch ($request->input('Type_Coll')) {
            case '1':
                $permanents = new Permanent([
                    'art_obj_Id_no' => $last,
                    'Collections_Name' => $request->get('permanent_name'),
                    'Date_acquired' => $request->get('permanent_date'),
                    'Cost' => $request->get('permanent_costs'),
                    'Status' => $request->get('permanent_status'),
                ]);
                $permanents->save();
                break;
            case '2':
                $borrowed = new Borrowed([
                    'art_obj_Id_no' => $last,
                    'Collections_Name' => $request->get('borrowed_name'),
                    'Date_borrowed' => $request->get('borrowed_date_borrowed'),
                    'Date_returned' => $request->get('borrowed_date_returned'),
                ]);
                $borrowed->save();
                break;
        }
        return redirect()->back()->with('success','The file is already uploaded.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($art_obj_Id_no)
    {
        $statues = Statue::find($art_obj_Id_no);
            $permanents = Permanent::find($art_obj_Id_no);
            $borrowed = Borrowed::find($art_obj_Id_no);
            $donated = Donated_collection::find($art_obj_Id_no);
        $id=$art_obj_Id_no;
        $art_objs = Art_obj::find($id);
	    return view('ArtObj.EditStatue', compact('statues','art_objs','permanents','donated','borrowed','art_obj_Id_no')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $art_obj_Id_no)
    {
        $this->validate($request, array(
            'Title' => 'required',
            'Artist' => 'required',
            'Year' => 'required',
            'Origin' => 'required',
            'Epoch' => 'required',
            'Description' => 'required',
            'Height' => 'required',
            'Weight' => 'required',
            'Type_Coll'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ));
        $statues = Statue::find($art_obj_Id_no);
        $statues->Height = $request->get('Height'); 
        $statues->Weight = $request->get('Weight');
        $statues->save();

        $id = $art_obj_Id_no;
        $art_objs = Art_obj::find($id);
        $art_objs->Title = $request->get('Title');
        $art_objs->Artist = $request->get('Artist'); 
        $art_objs->Year = $request->get('Year'); 
        $art_objs->Origin = $request->get('Origin'); 
        $art_objs->Epoch = $request->get('Epoch'); 
        $art_objs->Description = $request->get('Description'); 
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('img/art_objs/' . $filename ) );
            $art_objs->picture = $filename;
            $art_objs->save();
        };
        $art_objs->save();

        switch ($request->input('Type_Coll')) {
            case '1':
                $permanent = Permanent::find($art_obj_Id_no);
                $permanent->Collections_Name = $request->get('permanent_name');
                $permanent->Date_acquired = $request->get('permanent_date');
                $permanent->Status = $request->get('permanent_status');
                $permanent->Cost = $request->get('permanent_costs');
                $permanent->save();
                break;
            case '2':
                $borrowed = Borrowed::find($art_obj_Id_no);
                $borrowed->Collections_Name = $request->get('borrowed_name');
                $borrowed->Date_borrowed = $request->get('borrowed_date_borrowed');
                $borrowed->Date_returned = $request->get('borrowed_date_returned');
                $borrowed->save();
                break;
            case '3':
                $donated = Donated_collection::find($art_obj_Id_no);
                $donated->Date_donate = $request->get('donated_date');
                $donated->Donor = $request->get('donated_donor');
                $donated->save();
                break;
        }
        return redirect()->back()->with('success','Edit success.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($art_obj_Id_no)
    {
        $statues = Statue::find($art_obj_Id_no);
        $statues->delete();
        $Id_no=$art_obj_Id_no;
        $Art_obj = Art_obj::find($Id_no);
        if($Art_obj->Type_of_coll == 1){
            $permanents = Permanent::find($art_obj_Id_no);
            $permanents->delete();
        }
        if($Art_obj->Type_of_coll == 2){
            $borrowed = Borrowed::find($art_obj_Id_no);
            $borrowed->delete();
        }
        if($Art_obj->Type_of_coll == 3){
            $donated_collections = Donated_collection::find($art_obj_Id_no);
            $donated_collections->delete();
        }
        $id = $art_obj_Id_no;
        $art_objs = Art_obj::find($id);
        $art_objs->delete();
        return redirect()->back()->with('success','The art is already deleted.');
    }
}
