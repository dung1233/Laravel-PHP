<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Price;

class PriceController extends Controller
{
    public function index()
    {
        $prices = Price::all();
        return view('admin.chinhgia', compact('prices'));
    }

    public function update(Request $request)
    {
       

        // Kiểm tra nếu `prices` tồn tại và là một mảng
        if ($request->has('prices') && is_array($request->prices)) {
            foreach ($request->prices as $id => $price) {
                Price::where('id', $id)->update(['price' => $price]);
            }
            return ('thành công');
        } else {
            return redirect()->route('admin.prices.index')->with('error', 'Đã xảy ra lỗi khi cập nhật giá vé.');
        }
    }
}