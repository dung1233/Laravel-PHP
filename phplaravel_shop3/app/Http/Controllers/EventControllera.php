<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;


class EventControllera extends Controller
{
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.history')->with('success', 'Sự kiện đã được xóa');
    }

    public function history()
    {
        $events = Event::all(); // Lấy tất cả sự kiện để hiển thị lịch sử
        return view('events.history', compact('events'));
    }
}
