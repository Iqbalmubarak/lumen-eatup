<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\FavoriteRestaurant;
use DB;

class FavoriteRestaurantController extends Controller
{
    public function store(Request $request){
        try{
            $favorite = new FavoriteRestaurant;
            $favorite->user_id = $request->user_id;
            $favorite->restaurant_id = $request->restaurant_id;
            $favorite->save();
            $out = [
                "message" => "Liked"
            ];
        }catch(Exeption $e){
            $out = [
                "message" => "Failed"
            ];
        }
        return response()->json($out);
    }

}