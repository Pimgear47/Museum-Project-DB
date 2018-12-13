<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donated_collection;
use App\Art_obj;


class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DonateArt = Donated_collection::with('Art_obj')->get();
        //dd($DonateArt->toArray());
        return view('ArtFromYou', compact('DonateArt'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($art_obj_Id_no)
    {
        
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
    public function update(Request $request)
    {
        // $DArt = Donated_collection::find($request->art_obj_Id_no);
        // if($DArt->status_display == 0){
        //     $DArt->status_display = 1;
        // }
        // if($DArt->status_display == 1){
        //     $DArt->status_display = 0;
        // }
        // $DArt->save();
        // return redirect()->with('message', 'visita updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($art_obj_Id_no)
    {
        $DArt = Donated_collection::find($art_obj_Id_no);
        $DArt->delete();
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
        if($Art_obj->Type_of_art == 1){
            $painting = Painting::find($art_obj_Id_no);
            $painting->delete();
        }
        if($Art_obj->Type_of_art == 2){
            $sculpture = Sculpture::find($art_obj_Id_no);
            $sculpture->delete();
        }
        if($Art_obj->Type_of_art == 3){
            $statue = Statue::find($art_obj_Id_no);
            $statue->delete();
        }
        if($Art_obj->Type_of_art == 4){
            $other = Other::find($art_obj_Id_no);
            $other->delete();
        }
        $id = $art_obj_Id_no;
        $art_objs = Art_obj::find($id);
        $art_objs->delete();
        return redirect()->back()->with('success','The art is already deleted.');
    }
}
