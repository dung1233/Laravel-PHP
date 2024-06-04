<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\ExhibitionEntry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LikeController extends Controller
{
    public function like($id)
    {
        try {
            $entry = ExhibitionEntry::findOrFail($id);

            $like = Like::firstOrCreate([
                'user_id' => Auth::id(),
                'exhibition_entry_id' => $entry->id,
            ]);

            return response()->json(['status' => 'liked', 'likes_count' => $entry->likes->count()]);
        } catch (\Exception $e) {
            Log::error('Error liking entry: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function unlike($id)
    {
        try {
            $entry = ExhibitionEntry::findOrFail($id);

            $like = Like::where('user_id', Auth::id())->where('exhibition_entry_id', $entry->id)->first();

            if ($like) {
                $like->delete();
            }

            return response()->json(['status' => 'unliked', 'likes_count' => $entry->likes->count()]);
        } catch (\Exception $e) {
            Log::error('Error unliking entry: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}



