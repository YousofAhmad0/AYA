<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ResID, $ResName)
    {
        $tables = DB::table('tables')->where('RID', $ResID)->get();


        return view('reservation', compact('ResID', 'ResName', 'tables'));
    }


    public function submit(Request $request)
    {
        $ResID = $request->ResID;
        $ResName = $request->resName;
        $tid = $request->tid;

        DB::insert('insert into reservation (DateTime, nbOfPeople, RID, tid, uid) values(?,?,?,?,?)', [$request->dat, $request->nop, $ResID, $tid, auth()->user()->id]);
        DB::update('update tables set isFree = ? where id= ?', [0, $tid]);
        $tables = DB::table('tables')->where('RID', $ResID)->get();
        return view('reservation', compact('ResID', 'ResName', 'tables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservationRequest  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }
}