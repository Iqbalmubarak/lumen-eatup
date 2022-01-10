<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Restaurant;
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

        $check = Comment::where('user_id', $request->id)
                        ->where('restaurant_id', $request->restaurant_id)
                        ->first();

        if($check){
            $comments = new Comment;
            $comments->user_id = $request->id;
            $comments->restaurant_id = $request->restaurant_id;
            $comments->comment = $request->comment;
            $comments->rating = $request->rating;
            $comments->save();


            $sum = Comment::where('restaurant_id', $request->restaurant_id)
            ->groupBy('restaurant_id')
            ->sum('rating');

            $count = Comment::where('restaurant_id', $request->restaurant_id)->count();

            $rating = $sum/ $count;
            $rating = round($rating,1);

            $restaurant = Restaurant::find($request->restaurant_id);
            $restaurant->rating = $rating;
            $restaurant->save();


            return response()->json(['message' => 'Your comment added successfully', 'rating' => $rating]);
        }else{
            return response()->json(['message' => 'Your already comment', 'rating' => 0.0]);
        }
        
        
    }

    public function getData(Request $request)
    {
        $comments = DB::select("SELECT 
                comments.comment, comments.rating, users.first_name as first_name, users.last_name as last_name
                FROM comments
                LEFT JOIN users on comments.user_id = users.id
                WHERE comments.restaurant_id = $request->restaurant_id");
        
        $data = new \stdClass();
        $data->comments = $comments;

        return response()->json($data);

        
    }

}
