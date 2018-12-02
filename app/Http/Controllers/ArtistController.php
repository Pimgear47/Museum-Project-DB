<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use Intervention\Image\ImageManagerStatic as Image;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::all()->toArray(); 
        return view('Artist.Artist', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Artist.CreateArtist');
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
            'Born' => 'required',
            'Died' => 'required',
            'Origin' => 'required',
            'Epoch' => 'required',
            'MainStyle' => 'required',
            'Description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ));

        $artists = new Artist(
        ['Name' => $request->get('Name'),
            'Date_Born' => $request->get('Born'),
            'Date_Died' => $request->get('Died'),
            'Country_of_origin' => $request->get('Origin'),
            'Epoch' => $request->get('Epoch'),
            'Main_style' => $request->get('MainStyle'),
            'Description' => $request->get('Description'),
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('img/artists/' . $filename ) );
            $artists->picture = $filename;
            $artists->save();
        };
        $artists->save();
        return redirect()->back()->with('success','success');
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
    public function edit($Artist_id)
    {
        $artists = Artist::find($Artist_id);
	    return view('Artist.EditArtist', compact('artists','artists','Artist_id')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Artist_id)
    {
        $this->validate($request, array(
            'Name' => 'required',
            'Born' => 'required',
            'Died' => 'required',
            'Origin' => 'required',
            'Epoch' => 'required',
            'MainStyle' => 'required',
            'Description' => 'required',
        ));
        $artists = Artist::find($Artist_id);
        $artists->Name = $request->get('Name');
        $artists->Date_Born = $request->get('Born'); 
        $artists->Date_Died = $request->get('Died');
        $artists->Country_of_origin = $request->get('Origin'); 
        $artists->Epoch = $request->get('Epoch');
        $artists->Main_style = $request->get('MainStyle'); 
        $artists->Description = $request->get('Description'); 
        $artists->save();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('img/artists/' . $filename ) );
            $art_objs->picture = $filename;
            $art_objs->save();
        };
        return redirect()->back()->with('success','Edit success.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Artist_id)
    {
        $artists = Artist::find($Artist_id);
        $artists->delete();
        return redirect()->back()->with('success','The artist is already deleted.');
    }
}
