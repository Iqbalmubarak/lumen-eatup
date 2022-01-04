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
        $this->validate($request, [
            'comment' => 'required',
            'rating' => 'required'
        ]);

        $comment = $request->input('comment');
        $rating = $request->input('rating');

        $comments = DB::select("SELECT *
                    FROM comments
                    WHERE user_id = $request->id
                    AND restaurant_id = $request->restaurant_id");

        if ($comments) {
            return response()->json(['message' => 'You already comment!'], 401);
        }else{
          $comments = new Comment;
          $comments->user_id = $request->id;
          $comments->restaurant_id = $request->restaurant_id;
          $comments->comment = $request->comment;
          $comments->rating = $request->rating;
          $comments->save();
          return response()->json(['message' => 'Your comment added successfully']);
        }
    }

}
