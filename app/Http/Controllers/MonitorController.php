<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class MonitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {

        $id  = $request->input['id'];

    if(!empty($request->input['id'])) {
        $results = DB::select(DB::raw("SELECT TOP (50) TransactionID,MemberID,CardID,DatetimeCarIn,DatetimeCarOut,CarTypeName,PictureDriverIn,PictureCarIn FROM TransactionCarIn INNER JOIN SysCarType ON CarType = SysCarType.CarTypeID WHERE CardID ='$id'"));
    }else{
        $results = DB::select(DB::raw("SELECT TOP (50) TransactionID,MemberID,CardID,DatetimeCarIn,DatetimeCarOut,CarTypeName,PictureDriverIn,PictureCarIn FROM TransactionCarIn INNER JOIN SysCarType ON CarType = SysCarType.CarTypeID"));
    }




        return View('monitor')->with('result',$results);
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
