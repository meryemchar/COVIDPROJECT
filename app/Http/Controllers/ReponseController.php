<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reponse;
use App\Helpers\APIHelpers;

class ReponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rr=Reponse::all();
        $response=APIHelpers::CreateApiResponse(false,200,'',$rr);
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
        $rr=new Reponse();
        $rr->rep1=$request->rep1;
        $rr->rep2=$request->rep2;
        $rr->rep3=$request->rep3;
        $rr->rep4=$request->rep4;
        $rr->rep5=$request->rep5;
        $rr->id_f=$request->id_f;
        $rr_save=$rr->save();
        if($rr_save)
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
        $rr=Reponse::find($id);
        //return $ch;
        $res=APIHelpers::CreateApiResponse(false,200,'',$rr);
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
