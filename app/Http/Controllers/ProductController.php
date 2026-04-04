<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category; // Gọi Model Category để lấy danh mục
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 1. Hàm hiển thị danh sách (Có tìm kiếm, sắp xếp, phân trang)
    public function index(Request $request)
    {
        $query = Product::with('category'); // Tối ưu N+1 query

        // Xử lý Tìm kiếm
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Xử lý Sắp xếp
        if ($request->has('sort')) {
            if ($request->sort == 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        }

        $products = $query->paginate(5); // Phân trang
        return view('products.index', compact('products'));
    }

    // 2. Hàm hiển thị Form thêm mới
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // 3. Hàm lưu dữ liệu thêm mới
    public function store(Request $request)
    {
        $data = $request->all();

        // Xử lý Upload ảnh
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);
        return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công!');
    }

    // 4. Hàm hiển thị Form cập nhật (Sửa)
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // 5. Hàm lưu dữ liệu cập nhật
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->all();

        // Nếu người dùng có chọn ảnh mới thì mới upload lại
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);
        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    // 6. Hàm xóa sản phẩm
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Xóa sản phẩm thành công!');
    }

    // Hàm hiển thị Dashboard Sản Phẩm (Yêu cầu 2.5)
    public function dashboard()
    {
        $totalProduct = Product::count(); // Đếm tổng số sản phẩm
        $totalCategory = Category::count(); // Đếm tổng số danh mục
        $newProducts = Product::latest()->take(5)->get(); // Lấy 5 sản phẩm mới nhất

        return view('products.product_dashboard', compact('totalProduct', 'totalCategory', 'newProducts'));
    }
}
