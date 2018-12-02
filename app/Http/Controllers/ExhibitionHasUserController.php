<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exhibition;
use App\ExhibitionHasUser;
use App\User;
use DB;

class ExhibitionHasUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
    public function store(Request $request,$Ex_id,$id)
    {
        {
            $success = false;
            DB::beginTransaction();
            try{
                $CheckRepeat = DB::table('exhibition_has_users')
                            ->where('exhibition_id',$Ex_id)
                            ->where('username_id',$id)
                            ->count();
                $Exhibition = Exhibition::find($Ex_id);
                $Limit = $Exhibition->Limit_visit;
                $CheckLimit = $Exhibition->Booked;
                //dd($CheckLimit);                    
                if($Limit > $CheckLimit){
                    if($CheckRepeat > 0){
                        return back()->with('unsuccess','You already enrolled this exhibition.');
                    }else{
                        $exhibtionHasUser = new ExhibitionHasUser(
                            ['exhibition_id' => $Ex_id,
                            'username_id' => $id,
                        ]);
                        $exhibtionHasUser->save();
                        
                        $exhibition = Exhibition::find($Ex_id);
                        $exhibition->Booked += 1;
                        $exhibition->save();
                        $success = true;
                    }
                }
                DB::commit();
            }catch(\Exception $e){
                DB::rollback();
                $success = false;
            }
            if($success){
                return back()->with('success','Enroll success!');
            }
            else{
                return back()->with('unsuccess','The exhibition in which you want to enroll is full');
            }
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
