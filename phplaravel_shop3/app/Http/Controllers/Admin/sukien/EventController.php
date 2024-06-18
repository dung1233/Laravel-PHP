<?php

namespace App\Http\Controllers\Admin\sukien;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\ExhibitionEntry;
use App\Models\Exhibition;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use Carbon\Carbon;
use App\Notifications\CommentAdded;

class EventController extends Controller
{
    public function index()
    {
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

        return redirect()->back();
    }
    public function history()
    {
        $events = Event::orderBy('StartDate', 'desc')->get(); // Sắp xếp các sự kiện theo ngày bắt đầu từ mới nhất đến cũ nhất
        return view('events.history', compact('events')); // Truyền danh sách sự kiện đến view 'history'
    }

    public function storeExhibition(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('alert', 'Bạn phải đăng nhập để tham gia sự kiện.');
        }

        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'exhibition_id' => 'required|exists:exhibitions,ExhibitionID', // Đảm bảo sự kiện tồn tại
        ]);

        // Lấy sự kiện mà thí sinh đang tham gia
        $event = Event::findOrFail($request->exhibition_id);

        // Kiểm tra nếu sự kiện đã kết thúc
        if (Carbon::now()->greaterThan(Carbon::parse($event->EndDate))) {
            return redirect()->route('note')->with('error', 'Sự kiện đã kết thúc!');
        }

        $imagePath = null;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('Sukien'), $file_name);
            $imagePath = 'Sukien/' . $file_name;
        }

        $user = Auth::user();

        $exhibitionEntry = new ExhibitionEntry([
            'user_id' => $user->id,
            'exhibition_id' => $request->exhibition_id,
            'name' => $request->name,
            'image_path' => $imagePath,
            'description' => $request->description,
        ]);

        $user->exhibitionEntries()->save($exhibitionEntry);

        if ($exhibitionEntry->exists) {
            return redirect()->route('note')->with('success', 'Bài đăng đã được lưu thành công!');
        } else {
            return redirect()->route('note')->with('error', 'Đã xảy ra lỗi. Vui lòng thử lại sau!');
        }
    }
    public function createExhibitionEntry()
    {
        $exhibitions = Event::all(); // Truy vấn tất cả các sự kiện

        return view('student.chucnang.sukien', compact('exhibitions'));
    }
    public function join(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('alert', 'Bạn phải đăng nhập để tham gia sự kiện.');
        }

        if ($request->has('agree')) {

            return redirect()->route('profile.Event');
        }
        // Nếu checkbox chưa được chọn, quay lại với lỗi
        return back()->alert('Bạn phải đồng ý với nội quy trước khi tham gia sự kiện.');
    }
    public function show()
    {
        $entries = ExhibitionEntry::with('user', 'exhibition')->get();

        // Truyền dữ liệu tới view
        return view('student.students', compact('entries'));
    }
    public function edit($id)
    {
        $entry = ExhibitionEntry::find($id);
        return view('student.chucnang.suabai', compact('entry'));
    }

    public function destroy($id)
    {
        $entry = ExhibitionEntry::find($id);
        $entry->delete();

        return redirect()->route('profile.student')->with('success', 'Bài đăng đã được xóa.');
    }

    public function update(Request $request, $id)
    {
        $entry = ExhibitionEntry::find($id);
        $entry->name = $request->input('name');
        $entry->description = $request->input('description');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $entry->image_path = 'images/' . $fileName;
        }

        $entry->save();

        return redirect()->route('profile.student')->with('success', 'Bài đăng đã được cập nhật.');
    }
    public function destroyForAdmin($id)
    {
        $entry = ExhibitionEntry::find($id);
        $entry->delete();

        return redirect()->route('admin.history')->with('success', 'Bài đăng đã được xóa.');
    }
    public function eventhistory()
    {
        // Lấy tất cả các bài đăng sự kiện cùng với thông tin người dùng và sự kiện
        $entries = ExhibitionEntry::with('user', 'exhibition')->get();

        // Truyền dữ liệu tới view
        return view('admin.eventhistory', compact('entries'));
    }
    public function showa($id)
    {
        $entry = ExhibitionEntry::with('comments.user')->findOrFail($id);
        $currentDateTime = Carbon::now();
        $event = Event::orderBy('EndDate', 'desc')->first();

        if ($event) {
            $entries = ExhibitionEntry::where('exhibition_id', $event->ExhibitionID)
                ->withCount('likes')
                ->orderBy('likes_count', 'desc')
                ->take(3)
                ->get();
            $isOngoing = $currentDateTime->lessThan($event->EndDate);
        } else {
            $entries = collect();
            $isOngoing = false;
        }

        $exhibitions = Event::all();


        return view('detail', compact('entry', 'event', 'entries', 'exhibitions', 'isOngoing'));
    }

    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $entry = ExhibitionEntry::findOrFail($id);
        $event = Event::findOrFail($entry->exhibition_id);

        if (Carbon::now()->greaterThan(Carbon::parse($event->EndDate))) {
            return redirect()->back()->with('alert', 'Sự kiện đã kết thúc, không thể bình luận bài đăng này.');
        }

        $comment = Comment::create([
            'exhibition_entry_id' => $id,
            'user_id' => Auth::id(),
            'comment' => $request->input('comment'),
        ]);

        // Gửi thông báo
        $entry->user->notify(new CommentAdded($comment));

        return redirect()->route('entries.show', $id)->with('success', 'Bình luận đã được thêm.');
    }
    public function calculateWinners(Event $event)
    {
        $currentDateTime = Carbon::now();

        if ($currentDateTime->lessThan($event->EndDate)) {
            return redirect()->back()->with('error', 'Sự kiện chưa kết thúc!');
        }

        $entries = ExhibitionEntry::where('exhibition_id', $event->ExhibitionID)
            ->withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->take(3)
            ->get();

        return view('Trangchu.Trangchu', compact('event', 'entries'));
    }

    public function indexbas()
    {
        $currentDateTime = Carbon::now();
        $event = Event::orderBy('EndDate', 'desc')->first();

        if ($event) {
            $entries = ExhibitionEntry::where('exhibition_id', $event->ExhibitionID)
                ->withCount('likes')
                ->orderBy('likes_count', 'desc')
                ->take(3)
                ->get();
            $isOngoing = $currentDateTime->lessThan($event->EndDate);
        } else {
            $entries = collect();
            $isOngoing = false;
        }

        $exhibitions = Event::all();

        return view('Trangchu.Trangchu', compact('event', 'entries', 'exhibitions', 'isOngoing'));
    }
}
