<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FavoriteMenu;
use DB;

class UserController extends Controller
{
    public function update(Request $request){
        $user = User::find($request->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->save();

        return response()->json(['message' => 'Your profile updated successfully']);
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