<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Choice;
use App\Helpers\APIHelpers;

class ChoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        $ch=Choice::all();
       // return $ch;
      
       $response=APIHelpers::CreateApiResponse(false,200,'',$ch);
       return response()->json($response,200);

        
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
        $ch=new Choice();
        $ch->libelle_choix=$request->libelle_choix;
        $ch->id_qst=$request->id_qst;
        $ch_save=$ch->save();
        if($ch_save)
        {
            $res=APIHelpers::CreateApiResponse(false,201,'s-sucsess',null);
            return response()->json($res,201);
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
        $ch=Choice::find($id);
        //return $ch;
        $res=APIHelpers::CreateApiResponse(false,200,'',$ch);
        return response()->json($res,200);
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
        $ch=Choice::find($id);
        $ch->libelle_choix=$request->libelle_choix;
        $ch->id_qst=$request->id_qst;
        $ch_u=$ch->save();
        if($ch_u)
        {
            $res=APIHelpers::CreateApiResponse(false,201,'u-success',null);
            return response()->json($res,201);
        }else
        {
            $res=APIHelpers::CreateApiResponse(true,400,'u-failed',null);
            return response()->json($res,400); 
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ch=Choice::find($id);
        $ch_d=$ch->delete();
        if($ch_d){
            $res=APIHelpers::createAPIResponse(false,200,'choice deleted succesfully',null);
            return response()->json($res, 200);
        }    
        else{
            $response=APIHelpers::createAPIResponse(true,400,'choice delete failed',null);
        return response()->json($res, 400);
        }
    }
}
