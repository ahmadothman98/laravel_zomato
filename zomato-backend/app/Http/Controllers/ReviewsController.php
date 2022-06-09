<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Review;

class ReviewsController extends Controller
{
    public function addReview(Request $request){
        $review = new Review;
        $review -> text = $request->text;
        $review -> user_id = $request->user_id;
        $review -> resto_id = $request->resto_id;
        $review -> save();

        return response() -> json([
            "status" => "success",
            "review" => $review
        ],200);
    }
    public function getReviews($id){
        $reviews = Review::where('resto_id' , $id)->get();
        return response() -> json([
            "status" => 'ok',
            "reviews" => $reviews
        ],200);
    }
}
