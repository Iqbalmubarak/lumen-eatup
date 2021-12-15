<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\FavoriteRestaurant;
use DB;

class FavoriteRestaurantController extends Controller
{
    public function allData(Request $request){
        $restaurants = DB::select("SELECT 
                        restaurants.id as restaurant_id,
                        restaurants.name as restaurant_name,
                        types.name as type_name, 
                        restaurants.address as address,
                        restaurants.avatar as avatar, 
                        restaurants.status as status, 
                        restaurants.rating as rating
                    FROM favorite_restaurants
                    LEFT JOIN restaurants on favorite_restaurants.restaurant_id = restaurants.id
                    LEFT JOIN types on restaurants.type_id = types.id
                    WHERE favorite_restaurants.user_id = $request->id");

        dd($restaurants);
        //dd($restaurants->restaurant_id);
        foreach($restaurants as $restaurant){
            $favorite = FavoriteRestaurant::where('restaurant_id', $restaurant->restaurant_id)
                                            ->where('user_id', $request->id)
                                            ->first();
            if($favorite){
                $restaurant->likes = 2;
            }else{
                $restaurant->likes = 1;
            }

            $count = FavoriteRestaurant::where('restaurant_id', $restaurant->restaurant_id)->count();
            $restaurant->count = $count;
        }

        
        // foreach($restaurants as $restaurant){
        //     $data->restaurant = new \stdClass();
        //     $data->restaurant->restaurant_id = $restaurant->id;
        //     $data->restaurant->restaurant_name = $restaurant->name;
        //     $data->restaurant->type_name = $restaurant->type->name;
        //     $data->restaurant->address = $restaurant->address;
        //     $data->restaurant->avatar = $restaurant->avatar;
        //     $data->restaurant->status = $restaurant->status;
        //     $data->restaurant->rating = $restaurant->rating;
        // }

        $data = new \stdClass();
        $data->restaurant = $restaurants;

        return response()->json($data);
    }

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