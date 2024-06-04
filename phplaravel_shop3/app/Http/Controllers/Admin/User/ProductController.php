<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\ExhibitionEntry;
use App\Models\Event;
class ProductController extends Controller
{
    public function store(Request $request)
    {
        // Xác minh dữ liệu nhập vào
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'product_type' => 'required|string', // Thêm validation cho loại sản phẩm
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2000',
        ]);

        // Xử lý hình ảnh
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Get the uploaded image file
            $file = $request->file('image');

            // Generate a unique file name
            $file_name = time() . '_' . $file->getClientOriginalName();

            // Move the file to your target directory
            $file->move(public_path('uploads'), $file_name);

            // Set the path to store in the database
            $imagePath = 'uploads/' . $file_name;
        }

        // Lấy thông tin người dùng hiện tại
        $user = Auth::user();

        // Lưu sản phẩm mới vào cơ sở dữ liệu và gán user_id của người dùng hiện tại
        $product = new Product([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image_path' => $imagePath,
            'product_type' => $request->product_type, // Lưu loại sản phẩm
        ]);

        // Gán user_id của sản phẩm bằng UserID của người dùng hiện tại
        $user->products()->save($product);

        // Redirect trở lại
        if ($product) {
            Session::flash('success', 'Bài đăng đã được lưu thành công!');
        } else {
            Session::flash('error', 'Đã xảy ra lỗi. Vui lòng thử lại sau!');
        }

        return view('Note');
    }

   public function index()
    {
        $exhibitions = Event::all();
        $products = Product::all();
        $electronics = Product::where('product_type', 'Electronics')->get();
        $oilpainting = Product::where('product_type', 'Oilpainting')->get();
        $entries = ExhibitionEntry::all();
        $entries = ExhibitionEntry::with('user', 'exhibition')->get();

      

        return view('Trangchu.Trangchu', compact('products', 'electronics', 'oilpainting', 'entries','exhibitions'));
    }
    public function history()
    {
        $user = Auth::user(); // Lấy thông tin người dùng hiện tại

        // Lấy các sản phẩm do người dùng này tạo, sắp xếp theo ngày tạo giảm dần
        $products = $user->products()->orderBy('created_at', 'desc')->get();

        // Trả về view với dữ liệu lịch sử sản phẩm
        return view('student.history.history', compact('products'));
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $products = Product::with('user')->get();
        
        return view('student.detail', compact('product'));
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('student.chucnang.suabai', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'product_type' => 'required|string',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2000',
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $file_name);
            $imagePath = 'uploads/' . $file_name;
            $product->image_path = $imagePath;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->product_type = $request->product_type;
        $product->save();

        Session::flash('success', 'Sản phẩm đã được cập nhật thành công!');
        return redirect()->route('profile.student');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();  // Xóa mềm sản phẩm

        return redirect()->route('profile.student')->with('success', 'Sản phẩm đã được xóa.');
    }
    

}
