<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formulaire;
use App\Helpers\APIHelpers;

class FormulaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ff=Formulaire::all();
        $response=APIHelpers::CreateApiResponse(false,200,'',$ff);
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
        $ff=new Formulaire();
        $ff->traitement=$request->traitement;
        $ff->id_u=$request->id_u;
        $ff_save=$ff->save();
        if($ff_save)
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
        $ff=Formulaire::find($id);
        //return $ch;
        $res=APIHelpers::CreateApiResponse(false,200,'',$ff);
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
        $ff=Formulaire::find($id);
        $ff->traitement=$request->traitement;
        $ff->id_u=$request->id_u;
        $ff_u=$ff->save();
        if($ff_u)
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
        //
    }
}
