<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ratings;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function AddRating(Request $request)
    {
        $ratings = $request->input('product_rating');
        $product_id = $request->input('product_id');
        if ($request->isMethod('post')) {
            if (Auth::check()) {
                $exis_rating = Ratings::where('user_id', Auth::id())->where('product_id', $product_id)->first();
                if ($exis_rating) {
                    $exis_rating->ratings = $ratings;
                    $exis_rating->update();
                    return response()->json(['status' => 200, 'msg' => 'Cảm ơn bạn đã đánh giá sản phẩm!!']);
                } else {
                    Ratings::create([
                        'user_id' => Auth::id(),
                        'product_id' => $product_id,
                        'ratings' => $ratings
                    ]);
                    return response()->json(['status' => 200, 'msg' => 'Cảm ơn bạn đã đánh giá sản phẩm!!']);
                }
            } else {
                return response()->json(['status' => 403, 'msg' => 'Login to Continue']);
            }
        }
    }
}
