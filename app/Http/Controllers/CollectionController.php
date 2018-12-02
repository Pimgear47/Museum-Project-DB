<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use App\Art_obj;
use App\Permanent;
use App\Borrowed;
use App\Person;


class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::all()->toArray(); 
        return view('Collection.Collection', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Collection.CreateCollection');
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
            'Type' => 'required',
            'Responsible' => 'required',
            'Description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ));

        $collections = new Collection(
        [   'Name' => $request->get('Name'),
            'Type' => $request->get('Type'),
            'Contact_person_Name' => $request->get('Responsible'),
            'Description' => $request->get('Description'),
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('img/collections/' . $filename ) );
            $collections->picture = $filename;
            $collections->save();
        };
        $collections->save();
        return redirect()->back()->with('success','success');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Coll_id)
    {
        $collections = Collection::find($Coll_id);
        $Person = Person::with('Collection')->where('Name', '=', $collections->Contact_person_Name)->get();
        if($collections->Type == 'museum'){
            $permanents = Permanent::with('Art_obj')->where('Collections_Name', '=', $collections->Name)->get();
            //dd($Person);
            //dd($Person->toArray());
            return view('Collection.ShowCollection', compact('collections','permanents','Person')); 
        }
        if($collections->Type == 'personal'){
            $borrowed = Borrowed::with('Art_obj')->where('Collections_Name', '=', $collections->Name)->get();
            //dd($Person);
            //dd($Person->toArray());
            return view('Collection.ShowCollection', compact('collections','borrowed','Person')); 
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Coll_id)
    {
        $collections = Collection::find($Coll_id);
	    return view('Collection.EditCollection', compact('collections','Coll_id')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Coll_id)
    {
        $this->validate($request, array(
            'Name' => 'required',
            'Type' => 'required',
            'Person' => 'required',
            'Description' => 'required',
        ));
        $collections = Collection::find($Coll_id);
        $collections->Name = $request->get('Name');
        $collections->Type = $request->get('Type'); 
        $collections->Contact_person_Name = $request->get('Person');
        $collections->Description = $request->get('Description'); 
        $collections->save();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('img/collections/' . $filename ) );
            $collections->picture = $filename;
            $collections->save();
        };
        return redirect()->back()->with('success','Edit success.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Coll_id)
    {
        $collections = Collection::find($Coll_id);
        $collections->delete();
        return redirect()->back()->with('success','The artist is already deleted.');
    }
}