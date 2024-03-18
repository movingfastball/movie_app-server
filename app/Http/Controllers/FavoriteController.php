<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggleFavorite(Request $request) 
    {
        $validateData = $request->validate([
            "media_type" => 'required|string',
            "media_id" => 'required|integer',
        ]);

        $existingFavorite = Favorite::where('user_id', Auth::id())
        ->where('media_type',$validateData['media_type'])
        ->where('media_id',$validateData['media_id'])
        ->first();

        //お気に入りがすでに存在している場合
        if($existingFavorite) {
            $existingFavorite->delete();
            return response()->json(["status" => "removed"]);
        } else {
        //お気に入りが存在していない場合

            Favorite::create([
                'media_type' => $validateData['media_type'],
                'media_id' => $validateData['media_id'],
                'user_id' => Auth::id(),
            ]);
            return response()->json(["status" => "added"]);
        }
    }
}
