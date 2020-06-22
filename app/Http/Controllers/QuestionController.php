<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Helpers\APIHelpers;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qst=Question::all();
       // return $qst;
       $res=APIHelpers::CreateApiResponse(false,200,'',$qst);
       return response()->json($res,200);
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
        $qst=new Question();
        $qst->libelle_qst=$request->libelle_qst;
        $qst_save=$qst->save();
        if($qst_save)
        {
            $res=APIHelpers::CreateApiResponse(false,201,'success',null);
            return response()->json($res,201);          
        }
        else
        {
            $res=APIHelpers::CreateApiResponse(true,400,'failed',null);
            return response()->json($res,400);
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
        $qst=Question::find($id);
        //return $qst;
        $res=APIHelpers::CreateApiResponse(false,200,'',$qst);
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
        $qst=Question::find($id);
        $qst->libelle_qst=$request->libelle_qst;
        $qst_u=$qst->save();
        if($qst_u)
        {
            $res=APIHelpers::CreateApiResponse(false,201,'u-success',null);
            return response()->json($res,201);
        }
        else
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
        $qst=Question::find($id);
        $qst_d=$qst->delete();
        if($qst_d){
            $res=APIHelpers::createAPIResponse(false,200,'QST deleted succesfully',null);
            return response()->json($res, 200);
        }    
        else{
            $response=APIHelpers::createAPIResponse(true,400,'QST delete failed',null);
        return response()->json($res, 400);
        }
    }
}
