<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        $foods = [];
        $quantity = [];
        $f = [];
        $totalPrice = 0;
        $address = '';
        $resID = $request->resID;
        $resName = $request->resName;
        if ($foodsID = $request->select) {
            foreach ($foodsID as $id) {
                $f = DB::table('food')->where('id', $id)->get();
                $foods[] = $f[0];
            }
        }
        // untested
        for ($i = 0; $i < sizeof($foods); $i++) {
            $quantity[$foods[$i]->id] = 1;
        }
        // untested
        if ($request->redirect == 0) {
            foreach ($foods as $f) {
                $f->price /= 26000.0;
                $f->price = number_format($f->price, 2, '.', '');
            }
        }
        for ($i = 0; $i < sizeof($foods); $i++) {
            $totalPrice += $quantity[$foods[$i]->id] * $foods[$i]->price;
        }
        return view('order', compact('foods', 'quantity', 'totalPrice', 'address', 'resID', 'resName'));
    }

    public function update(Request $request)
    {
        $foods = [];
        $quantity = [];
        $foodsID = [];
        $f = [];
        $address = '';
        $totalPrice = 0;
        $resID = $request->resID;
        $resName = $request->resName;
        $fid = $request->except('_token', 'address', '', 'redirect', 'resID', 'resName');
        $address = $request->address;
        foreach ($fid as $f => $q) {
            $foodsID[] = $f;
        }
        foreach ($foodsID as $id) {
            $f = DB::table('food')->where('id', $id)->get();
            $foods[] = $f[0];
        }
        // untested
        for ($i = 0; $i < sizeof($foods); $i++) {
            $quantity[$foods[$i]->id] = 1;
        }
        // untested
        foreach ($fid as $f => $q) {
            $quantity[$f] = $q;
        }
        if ($request->redirect == 0) {
            foreach ($foods as $f) {
                $f->price /= 26000.0;
                $f->price = number_format($f->price, 2, '.', '');
            }
        }
        for ($i = 0; $i < sizeof($foods); $i++) {
            $totalPrice += $quantity[$foods[$i]->id] * $foods[$i]->price;
        }
        return view('order', compact('foods', 'quantity', 'totalPrice', 'address', 'resID', 'resName'));
    }

    public function submit(Request $request)
    {
        $address = $request->address;
        $desc = '';
        $fid = $request->except('_token', 'address', 'redirect', 'curr', 'resID', 'resName');
        $totalPrice = $request->redirect;
        $curr = $request->curr;
        foreach ($fid as $f => $q) {
            $foodsID[] = $f;
        }
        for ($i = 0; $i < sizeof($foodsID); $i++) {
            $f = DB::table('food')->where('id', $foodsID[$i])->get();
            $foods[$f[0]->name] = $fid[$f[0]->id];
        }
        $desc = json_encode($foods);
        if ($curr == 0) {
            $totalPrice *= 26000.0;
        }
        DB::insert('insert into orders (resID, UserID, address, totalPrice, Desciption) values(?,?,?,?,?)', [$request->resID, auth()->user()->id, $address, $totalPrice, $desc]);
        $resName = $request->resName;

        return view('orderInfo', compact('desc', 'totalPrice', 'address', 'resName', 'curr'));
    }
}