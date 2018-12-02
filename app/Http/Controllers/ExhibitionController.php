<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exhibition;
use App\ExhibitionHasArt;
use App\ExhibitionHasUser;
use App\Art_obj;
use DB;

class ExhibitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exhibitions = Exhibition::with('ExhibitionHasUser')->get(); 
        //dd($exhibitions->toArray());
        return view('Exhibition.Exhibition', compact('exhibitions','CheckLimit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function enroll()
    {

    }

    public function create()
    {
        return view('Exhibition.CreateExhibition');
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
            'Name' => 'required',
            'Start' => 'required',
            'End' => 'required',
            'limit' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ));

        $exhibitions = new Exhibition(
            ['Name' => $request->get('Name'),
            'Start_date' => $request->get('Start'),
            'End_date' => $request->get('End'),
            'Limit_visit' => $request->get('limit'),
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('img/exhibitions/' . $filename ) );
            $exhibitions->picture = $filename;
            $exhibitions->save();
        };
        $exhibitions->save();

        return redirect()->back()->with('success','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Ex_id)
    {
        $exhibitions = Exhibition::find($Ex_id);
        $exhibitionHasArts = ExhibitionHasArt::with('Art_obj')->get();
        //dd($exhibitionHasArts->toArray());
        $CheckLimit = DB::table('exhibition_has_users')
            ->where('exhibition_id',$Ex_id)
            ->count();
	    return view('Exhibition.ShowExhibition', compact('exhibitions','exhibitionHasArts','CheckLimit')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Ex_id)
    {
        $exhibitions = Exhibition::find($Ex_id);
	    return view('Exhibition.EditExhibition', compact('exhibitions','Ex_id')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Ex_id)
    {
        $this->validate($request, array(
            'Name' => 'required',
            'Start' => 'required',
            'End' => 'required',
            'Limit' => 'required',
        ));
        $exhibitions = Exhibition::find($Ex_id);
        $exhibitions->Name = $request->get('Name');
        $exhibitions->Start_date = $request->get('Start'); 
        $exhibitions->End_date = $request->get('End');
        $exhibitions->Limit_visit = $request->get('Limit'); 
        $exhibitions->save();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('img/exhibitions/' . $filename ) );
            $exhibitions->picture = $filename;
            $exhibitions->save();
        };
        return redirect()->back()->with('success','Edit success.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Ex_id)
    {
        $exhibitions = Exhibition::find($Ex_id);
        $exhibitions->delete();
        return redirect()->back()->with('success','The artist is already deleted.');
    }
}
