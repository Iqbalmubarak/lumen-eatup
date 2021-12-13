<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use DB;

class RestaurantController extends Controller
{
    public function index(){
        $restaurant = DB::select("SELECT 
                        restaurants.id as restaurant_id,
                        restaurants.name as restaurant_name,
                        types.name as type_name, 
                        restaurants.address as address,
                        restaurants.avatar as avatar, 
                        restaurants.status as status, 
                        restaurants.rating as rating
                    FROM restaurants
                    LEFT JOIN types on restaurants.type_id = types.id");

        $data = new \stdClass();
        $data->restaurant = $restaurant;

        return response()->json($data);
    }

    public function show(Request $request){
        $menu = DB::select("SELECT id, name, notes, price, avatar
                                    FROM menus
                                    WHERE restaurant_id = $request->restaurant_id");

        $data = new \stdClass();
        $data->menu = $menu;

        return response()->json($data);
    }

    public function getData(Request $request)
    {
        // $restaurant = DB::select("SELECT 
        //                 restaurants.name as restaurant_name,
        //                 types.name as type_name, 
        //                 restaurants.address as address,
        //                 restaurants.avatar as avatar, 
        //                 restaurants.status as status, 
        //                 restaurants.rating as rating
        //             FROM restaurants
        //             LEFT JOIN types on restaurants.type_id = types.id");

        // $data = new \stdClass();
        // $data->restaurant = $restaurant;

        // return response()->json($data);

            $restaurant = DB::select("SELECT 
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
        
        $data = new \stdClass();
        $data->restaurant = $restaurant;

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