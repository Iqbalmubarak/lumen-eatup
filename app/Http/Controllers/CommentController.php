<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;


class CommentController extends Controller
{
    //Function untuk Login
    function store(Request $request) {


        $comments = DB::select("SELECT *
                    FROM comments
                    WHERE user_id = $request->id
                    AND restaurant_id = $request->restaurant_id");

       
          $comments = new Comment;
          $comments->user_id = $request->id;
          $comments->restaurant_id = $request->restaurant_id;
          $comments->comment = $request->comment;
          $comments->rating = $request->rating;
          $comments->save();
          return response()->json(['message' => 'Your comment added successfully']);
        
    }

}
