<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Art_obj;
use App\Donated_collection;
use App\Painting;
use App\Sculpture;
use App\Statue;
use App\Other;
use DB;
use Intervention\Image\ImageManagerStatic as Image;

class Art_objController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('donation');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'Date_donate' => 'required',
            'Donor' => 'required',
            'Artist' => 'required',
            'Year' => 'required',
            'Title' => 'required',
            'Description' => 'required',
            'Origin' => 'required',
            'Epoch' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ));
        $success = true;
        DB::beginTransaction();
        try{
            $last_line = DB::table('art_objs')->orderBy('Id_no', 'DESC')->first();
            $last = $last_line->Id_no;
            $donated_collections = new Donated_collection(
                ['art_obj_Id_no' => ++$last,
                'Date_donate' => $request->input('Date_donate'),
                'Donor' => $request->get('Donor'),
            ]);
            $donated_collections->save();
            $art_objs = new Art_obj(
                ['Artist' => $request->get('Artist'),
                'Year' => $request->get('Year'),
                'Title' => $request->get('Title'),
                'Description' => $request->get('Description'),
                'Origin' => $request->get('Origin'),
                'Epoch' => $request->get('Epoch'),
                'Type_of_art'=>$request->input('Type_Art'),
                'Type_of_coll'=>'3',
            ]);
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(300, 300)->save( public_path('img/art_objs/' . $filename ) );
                $art_objs->picture = $filename;
                $art_objs->save();
            };
            $art_objs->save();
            switch ($request->input('Type_Art')) {
                case '1':
                    $paintings = new Painting([
                        'art_obj_Id_no' => $last,
                        'Paint_type' => $request->get('paint_type'),
                        'Drawn_on' => $request->get('paint_draw_on'),
                        'Style' => $request->get('paint_style'),
                    ]);
                    $paintings->save();
                    break;
                case '2':
                    $sculptures = new Sculpture([
                        'art_obj_Id_no' => $last,
                        'Material' => $request->get('sculpt_material'),
                        'Height' => $request->get('sculpt_height'),
                        'Weight' => $request->get('sculpt_weight'),
                        'Style' => $request->get('sculpt_style'),
                    ]);
                    $sculptures->save();
                    break;
                case '3':
                    $statues = new Statue([
                        'art_obj_Id_no' => $last,
                        'Height' => $request->get('statue_height'),
                        'Weight' => $request->get('statue_weight'),
                    ]);
                    $statues->save();
                    break;
                case '4':
                    $others = new Other([
                        'art_obj_Id_no' => $last,
                        'Type' => $request->get('other_type'),
                        'Style' => $request->get('other_style'),
                    ]);
                    $others->save();
                    break;
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            $success = false;
        }
        if($success){
            return redirect()->back()->with('success','The file is already uploaded. Please wait for permission. Your art will be displayed.');
        }
        else{
            return redirect()->back()->with('unsuccess','Something fail.');
        }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}