<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function like($figure_id) {
        $user = Auth::user();

        $like_count = Like::where('user_id', $user->id)
                          ->where('figure_id', $figure_id)
                          ->count();

        if ($like_count == 0) {
            $like = new Like();
            $like->user_id = $user->id;
            $like->figure_id = (int)$figure_id;

            $like->save();

            return response()->json([
                'message' => $like
            ]);
        }
    }

    public function removeLike($figure_id) {
        $user = Auth::user();

        $like = Like::where('user_id', $user->id)
                    ->where('figure_id', $figure_id)
                    ->first();

        if ($like) {
            $like->delete();

            return response()->json([
                'message' => $like
            ]);
        }
    }
}
