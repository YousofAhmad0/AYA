<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurentController extends Controller
{
    public function index($resID, $resName, $curr)
    {
        // Read value from Model method
        // Pass to view
        $foods = [];
        $mName = '';
        $menus = DB::table('menu')->where('ResID', $resID)->get();
        foreach ($menus as $menu) {
            $foods[$menu->name] = DB::table('food')->where('menuID', $menu->id)->get();
        }
        if ($curr == 0) {
            foreach ($foods as $menu => $food) {
                foreach ($food as $f) {
                    $f->price /= 26000.0;
                    $f->price = number_format($f->price, 2, '.', '');
                }
            }
        }

        return view('restaurant', compact('resID', 'resName', 'menu', 'foods', 'curr'));
    }

    public function show($resID)
    {

        // $submission = Submission::where('id', $id)
        // ->with('form')
        //     ->firstOrFail();
    }
}