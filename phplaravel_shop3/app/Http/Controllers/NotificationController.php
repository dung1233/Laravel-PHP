<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function sendNotification(Request $request)
    {
        $event = Event::create($request->all());  // Giả sử bạn đã xử lý dữ liệu đầu vào và lưu sự kiện

        $users = User::all();  // Lấy tất cả người dùng, hoặc một nhóm người dùng cụ thể
        foreach ($users as $user) {
            Notification::create([
                'user_id' => $user->id,
                'title' => 'Sự kiện mới: ' . $event->Title,
                'message' => 'Một sự kiện mới đã được tạo: ' . $event->Description,
                'link' => url("/events/{$event->id}")  // Đường dẫn để xem chi tiết sự kiện
            ]);
        }

        return redirect()->back()->with('success', 'Sự kiện và thông báo đã được tạo!');
    }

    public function markAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return response()->json(['status' => 'success']);
    }
}
