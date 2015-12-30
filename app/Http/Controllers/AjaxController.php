<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
class AjaxController extends Controller
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

    public function transaction_list(Request $request){

        $barcode = $request->input('barcode');


        $member = DB::select(DB::raw("SELECT * FROM SysMember WHERE ReferenceID = '$barcode'"));

        $member_id = (@$member[0]->MemberID);

        if(!empty($member_id)){

            $results = DB::select(DB::raw("SELECT TOP (200) TransactionID,MemberID,CardID,DatetimeCarIn,DatetimeCarOut,CarTypeName FROM TransactionCarIn INNER JOIN SysCarType ON CarType = SysCarType.CarTypeID WHERE MemberID = '".$member_id."'"));

        }else {

            $results = DB::select(DB::raw("SELECT TOP (200) TransactionID,MemberID,CardID,DatetimeCarIn,DatetimeCarOut,CarTypeName FROM TransactionCarIn INNER JOIN SysCarType ON CarType = SysCarType.CarTypeID"));
        }

        return Response::json($results);
    }


    public function money_list(Request $request){

        $barcode = $request->input('barcode');


        $member = DB::select(DB::raw("SELECT * FROM SysMember WHERE ReferenceID = '$barcode'"));

        $member_id = (@$member[0]->MemberID);

        if(!empty($member_id)){

            $results = DB::select(DB::raw("SELECT TOP (200) * FROM Transaction_Topup WHERE MemberID = '".$member_id."'"));

        }else {

            $results = DB::select(DB::raw("SELECT TOP (200) * FROM Transaction_Topup ORDER BY SysDate DESC"));
        }

        return Response::json($results);
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
