<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\User;
use App\Notifications\EntryApproved;
use app\Models\ExhibitionEntry;
use app\Models\Event;
use Carbon\Carbon;
use App\Models\like;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Notifications\EntryLiked;
use App\Notifications\EntryCommented;
use Illuminate\Support\Facades\Log;

class EntryController extends Controller
{
    public function approve($id)
    {
        // Tìm entry dựa vào ID
        $entry = Entry::findOrFail($id);

        // Cập nhật trạng thái bài viết
        $entry->status = 'approved';
        $entry->save();

        // Gửi thông báo đến user đã tạo bài viết
        $user = $entry->user;
        $user->notify(new EntryApproved($entry));

        // Redirect hoặc trả về response phù hợp
        return redirect()->back()->with('success', 'Bài viết đã được duyệt và thông báo đã được gửi.');
    }

    public function like($id)
    {
        try {
            $entry = ExhibitionEntry::findOrFail($id);
            $event = Event::findOrFail($entry->exhibition_id);
    
            if (Carbon::now()->greaterThan(Carbon::parse($event->EndDate))) {
                return response()->json(['error' => 'Sự kiện đã kết thúc, không thể thích bài đăng này.'], 403);
            }
    
            $like = Like::firstOrCreate([
                'user_id' => Auth::id(),
                'exhibition_entry_id' => $entry->id,
            ]);
    
            // Gửi thông báo
            $entry->user->notify(new EntryLiked($entry));
            
            Log::info('Notification sent for like', ['user_id' => Auth::id(), 'entry_id' => $entry->id]);
    
            return response()->json(['status' => 'liked', 'likes_count' => $entry->likes->count()]);
        } catch (\Exception $e) {
            Log::error('Error liking entry: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function comment($id, Request $request)
    {
        $entry = ExhibitionEntry::findOrFail($id);
        $event = Event::findOrFail($entry->exhibition_id);

        if (Carbon::now()->greaterThan(Carbon::parse($event->EndDate))) {
            return response()->json(['error' => 'Sự kiện đã kết thúc, không thể bình luận bài đăng này.'], 403);
        }

        $comment = new Comment;
        $comment->user_id = Auth::id();
        $comment->exhibition_entry_id = $entry->id;
        $comment->comment = $request->comment;
        $comment->save();

        // Gửi thông báo
        $entry->user->notify(new EntryCommented($entry));
        return redirect()->back()->with('success', 'Bình luận đã được thêm.');
    }
}
