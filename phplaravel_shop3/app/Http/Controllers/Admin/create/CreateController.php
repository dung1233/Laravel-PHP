<?php

namespace App\Http\Controllers\Admin\create;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Models\ExhibitionEntry;
use App\Models\Event;
class CreateController extends Controller
{
    public function index(){
        return view('admin.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'FullName' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'UserType' => 3,
        ]);

        // Đăng nhập người dùng ngay sau khi đăng ký
        auth()->login($user);

        return redirect()->route('home');  // Chuyển hướng về trang chủ sau khi đăng ký
    }
    public function Event(){
        $exhibitions = Event::all();
       
        
        $entries = ExhibitionEntry::all();

      
 
        return view('admin.Event',compact('entries','exhibitions'));
    }
    public function show($id)
    {
        $entry = ExhibitionEntry::with(['user'])->findOrFail($id);
        $entry = ExhibitionEntry::with('comments.user')->findOrFail($id);
        return view('detail', compact('entry'));
    }

}
