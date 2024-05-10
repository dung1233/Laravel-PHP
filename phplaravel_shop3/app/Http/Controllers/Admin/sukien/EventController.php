<?php

namespace App\Http\Controllers\Admin\sukien;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(){
        return view('events.create');
    }
    public function store(Request $request)
    {
        $event = new Event;
     $event->Title = $request->name; // Sửa 'name' thành 'Title'
    $event->Description = $request->description; // Đảm bảo tên trường phù hợp
    $event->StartDate = $request->start_time; // Đảm bảo tên trường phù hợp
     $event->EndDate = $request->end_time; // Đảm bảo tên trường phù hợp
   $event->Location = $request->location; // Thêm trường này nếu bạn đã thêm vào form và muốn lưu
   $event->save();
   
   if ($event) {
    Session::flash('success', 'Bài đăng đã được lưu thành công!');
} else {
    Session::flash('error', 'Đã xảy ra lỗi. Vui lòng thử lại sau!');
}

    
        return view('notification');
    }
    public function history()
    {
        $events = Event::orderBy('StartDate', 'desc')->get(); // Sắp xếp các sự kiện theo ngày bắt đầu từ mới nhất đến cũ nhất
        return view('events.history', compact('events')); // Truyền danh sách sự kiện đến view 'history'
    }
}
