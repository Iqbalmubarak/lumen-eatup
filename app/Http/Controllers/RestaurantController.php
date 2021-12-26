<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\FavoriteRestaurant;
use DB;

class RestaurantController extends Controller
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
                    FROM restaurants
                    LEFT JOIN types on restaurants.type_id = types.id");
        
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

    public function show(Request $request){
        $menus = DB::select("SELECT id, name, notes, price, avatar
                                    FROM menus
                                    WHERE restaurant_id = $request->restaurant_id");

        foreach($menus as $menu){
            $favorite = FavoriteMenu::where('menu_id', $menu->id)
                                            ->where('user_id', $request->id)
                                            ->first();
            if($favorite){
                $menu->likes = 2;
            }else{
                $menu->likes = 1;
            }
        }

        $count = FavoriteMenu::where('menu_id', $menu->id)->count();
        $menu->count = $count;

        $data = new \stdClass();
        $data->menu = $menus;

        return response()->json($data);
    }

    public function getData(Request $request)
    {
        $restaurants = DB::select("SELECT 
                    restaurants.id as restaurant_id,
                    restaurants.name as restaurant_name,
                    types.name as type_name, 
                    restaurants.address as address,
                    restaurants.avatar as avatar, 
                    restaurants.status as status, 
                    restaurants.rating as rating
                FROM restaurants
                LEFT JOIN types on restaurants.type_id = types.id
                WHERE restaurants.type_id = $request->type");

        foreach($restaurants as $restaurant){
            $favorite = FavoriteRestaurant::where('restaurant_id', $restaurant->restaurant_id)
                                            ->where('user_id', $request->id)
                                            ->first();
            if($favorite){
                $restaurant->likes = 2;
            }else{
                $restaurant->likes = 1;
            }
        }

        $count = FavoriteRestaurant::where('restaurant_id', $restaurant->restaurant_id)->count();
        $restaurant->count = $count;
        
        $data = new \stdClass();
        $data->restaurant = $restaurants;

        return response()->json($data);

        
    }

    public function store(Request $request){
        $restaurant = new Restaurant;
        $restaurant->type_id = $request->type_id;
        $restaurant->name = $request->name;
        $restaurant->address = $request->address;
        $restaurant->avatar = $request->avatar;
        $restaurant->status = $request->status;
        $restaurant->rating = $request->rating;
        $restaurant->save();
        $this->sendNotification($request->name);
    }

    public function sendNotification(String $name){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "to" : "/topics/pengingat",
                "notification" :{
                    "title" : "Restaurant baru",
                    "body" : "Restaurantnyaa adalaaaah '.$name.'" 
                }
        }',
        CURLOPT_HTTPHEADER => array(
            'Authorization: key=AAAA6-atPUA:APA91bEqtTmDuTD25nFP_yT29tWSoco1abmCMDCGd7vgkdGT6G_G6mWD7dxVzDaRy9Y1CFNDw5GcC5Tku5b1N5yIj7XtUdloYm6CFf9Nq2YUNF_qTuxZV7Q-VrTZMGwY6ebAQA4VUyHq',
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
    }

}