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

    public function destroy(Request $request){
        try{
            $favorite = FavoriteRestaurant::where('user_id', $request->user_id)
                                            ->where('restaurant_id', $request->restaurant_id)
                                            ->first();
            $favorite->delete();
            $out = [
                "message" => "Dislike"
            ];
        }catch(Exeption $e){
            $out = [
                "message" => "Failed"
            ];
        }
        return response()->json($out);
    }

}