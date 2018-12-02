<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExhibitionHasUser;
use App\Exhibition;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show($id)
    {
        $list = ExhibitionHasUser::with('Exhibition')->where('username_id', '=', $id)->get();
        //dd($list->toArray());
        return view('Auth.showBooking',compact('list'));
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
    public function destroy($Ex_id,$id)
    {
        $del = DB::table('exhibition_has_users')
                            ->where('exhibition_id',$Ex_id)
                            ->where('username_id',$id);
        $exhibition = Exhibition::find($Ex_id);
        $exhibition->Booked -= 1;
        $exhibition->save();
        $del->delete();
        return back()->with('success','Cancel success.'); 
    }
}
