<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



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
    public function index() {
        $products = Product::all();
       
        return view('Trangchu.Trangchu', compact('products'));
    }
    public function history()
{
    $user = Auth::user(); // Lấy thông tin người dùng hiện tại

    // Lấy các sản phẩm do người dùng này tạo, sắp xếp theo ngày tạo giảm dần
    $products = $user->products()->orderBy('created_at', 'desc')->get();

    // Trả về view với dữ liệu lịch sử sản phẩm
    return view('student.history.history', compact('products'));
}

    

}