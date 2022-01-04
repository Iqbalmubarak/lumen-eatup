<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\FavoriteMenu;
use DB;

class FavoriteMenuController extends Controller
{
    public function allData(Request $request){
        $menus = DB::select("SELECT 
                        menus.id as menu_id,
                        menus.name as name,
                        menus.notes as notes,
                        menus.avatar as avatar, 
                        menus.price as price
                    FROM favorite_menus
                    LEFT JOIN menus on favorite_menus.menu_id = menus.id
                    WHERE favorite_menus.user_id = $request->id");

        //dd($restaurants->restaurant_id);
        foreach($menus as $menu){
            $favorite = FavoriteMenu::where('menu_id', $menu->menu_id)
                                            ->where('user_id', $request->id)
                                            ->first();
            if($favorite){
                $menu->likes = 2;
            }else{
                $menu->likes = 1;
            }

            $count = FavoriteMenu::where('menu_id', $menu->menu_id)->count();
            $menu->count = $count;
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
        $data->menu = $menus;

        return response()->json($data);
    }

    public function store(Request $request){
        try{
            $favorite = new FavoriteMenu;
            $favorite->user_id = $request->user_id;
            $favorite->menu_id = $request->menu_id;
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
            $favorite = FavoriteMenu::where('user_id', $request->user_id)
                                            ->where('menu_id', $request->menu_id)
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