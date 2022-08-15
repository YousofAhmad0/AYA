<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Restaurants;
use Illuminate\Http\Request;

class NavController extends Controller
{
    public function aboutUsShow()
    {
        return view('aboutus');
    }

    public function feedbackShow()
    {
        return view('feedback');
    }
    public function resDropDown()
    {
        $restaurant = Restaurants::getRestaurants();

        $reminder = DB::table('reservation')->where('uid', auth()->user()->id)->get();
        return view('layouts/app', compact('restaurant', 'reminder'));
    }

    public function feedbackIndex(Request $request)
    {
        DB::insert('insert into feedback (uid, message) values(?,?)', [auth()->user()->id, $request->feedback]);
        return view('feedback');
    }
}