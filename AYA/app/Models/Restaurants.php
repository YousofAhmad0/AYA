<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Restaurants extends Model
{
    use HasFactory;

    public static function getRestaurants()
    {
        $restaurants = DB::table('resturents')->get();
        return $restaurants;
    }
}