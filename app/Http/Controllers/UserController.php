<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FavoriteMenu;
use Illuminate\Support\Facades\Hash;
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

    public function changePassword(Request $request){
        $user = User::find($request->id);
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return response()->json(['message' => 'Your password changed successfully']);
    }

}