<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Image;
use App\Models\ProductSize;


use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreProductRequest;


class ProductController extends Controller
{
    public function index()
    {
        $list = Product::where("product.status", "!=", 0)
            ->join("category", "product.category_id", "=", "category.id")
            ->join("brand", "product.brand_id", "=", "brand.id")
            ->orderBy("product.created_at", "DESC")
            ->select("product.price","product.pricesale","product.status","product.id", "product.slug", 
            "product.name", "product.image", "category.name as categoryname", "brand.name as brandname")
            ->paginate(7);

        $categories = Category::all();
        $brands = Brand::all();
        if ($categories->isEmpty() || $brands->isEmpty()) {
            return redirect()->route('admin.product.index')->with('error', 'Categories or Brands are not available.');
        }        

        return view("backend.product.index", compact("list", "categories","brands"));
    }
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('backend.product.create', compact("categories", "brands"));
    }
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->detail = $request->detail;
        $product->description = $request->description;
        $product->pricesale = $request->pricesale;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->status = $request->status;
        $product->slug = Str::of($request->name)->slug('-');
        $product->created_at = date('Y-m-d H:i:s');
        $product->created_by = Auth::id() ?? 1;
        $product->save();
            if ($request->hasFile('images')) {
            $order = 1;
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img/products'), $filename);

                // Tạo ảnh mới và gán product_id từ sản phẩm đã tạo
                $image = new Image();
                $image->filename = $filename;
                $image->product_id = $product->id; // Sử dụng id của sản phẩm đã tạo
                $image->order = $order; // Gán giá trị thứ tự
                $image->save(); // Lưu ảnh vào cơ sở dữ liệu
                $order++; // Tăng giá trị thứ tự
            }
            // Lưu kích thước và số lượng
            if ($request->size_type === 'specific') {
                foreach ($request->sizes as $size => $quantity) {
                    if ($quantity > 0) {
                        $productSize = new ProductSize();
                        $productSize->product_id = $product->id;
                        $productSize->size = $size;
                        $productSize->quantity = $quantity;
                        $productSize->save();
                    }
                }
            } else {
                $productSize = new ProductSize();
                $productSize->product_id = $product->id;
                $productSize->size = 'freesize';
                $productSize->quantity = $request->quantity ?? 0;
                $productSize->save();
            }        }

        return redirect()->route('admin.product.index')->with('success', 'Thêm sản phẩm thành công.');
    }
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.product.index')->with('error', 'Sản phẩm không tồn tại.');
        }

        $categoryName = Category::find($product->category_id)->name ?? 'Unknown';
        $brandName = Brand::find($product->brand_id)->name ?? 'Unknown';

        return view('backend.product.show', compact('product', 'categoryName', 'brandName'));
    }
    public function edit($id, Request $request)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.product.index')->with('error', 'Sản phẩm không tồn tại.');
        }

        if ($request->isMethod('post')) {
            // Xử lý xóa ảnh
            if ($request->has('delete_image')) {
                $imagePath = public_path('images/products/' . $product->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
                $product->image = null;
                $product->save();
                return redirect()->route('admin.product.edit', $id)->with('success', 'Đã xóa hình ảnh.');
            }

            // Xử lý thêm ảnh mới
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('img/products'), $filename);

                    // Tạo ảnh mới và gán product_id từ sản phẩm đã tạo
                    $image = new Image();
                    $image->filename = $filename;
                    $image->product_id = $product->id; // Sử dụng id của sản phẩm đã tạo
                    $image->save(); // Lưu ảnh vào cơ sở dữ liệu
                }
            }

            return redirect()->route('admin.product.index')->with('success', 'Cập nhật sản phẩm thành công.');
        }

        // Lấy danh sách sản phẩm
        $list = Product::where("product.status", "!=", 0)
        ->join("category", "product.category_id", "=", "category.id")
        ->join("brand", "product.brand_id", "=", "brand.id")
        ->orderBy("product.created_at", "DESC")
        ->select(
            "product.price",
            "product.pricesale",
            "product.status",
            "product.id",
            "product.slug",
            "product.name",
            "product.image",
            "category.name as categoryname",
            "brand.name as brandname"
        )
            ->get();

        // Lấy danh sách danh mục và thương hiệu
        $categories = Category::all();
        $brands = Brand::all();
        if ($categories->isEmpty() || $brands->isEmpty()) {
            return redirect()->route('admin.product.index')->with('error', 'Danh mục hoặc thương hiệu không có sẵn.');
        }

        return view('backend.product.edit', compact('product', 'list', 'categories', 'brands'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.product.index')->with('error', 'Sản phẩm không tồn tại.');
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->pricesale = $request->pricesale;
        $product->description = $request->description;
        $product->detail = $request->detail;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->status = $request->status;
        $product->slug = Str::of($request->name)->slug('-');

        // Xử lý ảnh mới
        if ($request->hasFile('new_images')) {
            foreach ($request->file('new_images') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img/products'), $filename);

                // Tạo ảnh mới và gán product_id từ sản phẩm đã tạo
                $image = new Image();
                $image->filename = $filename;
                $image->product_id = $product->id; // Sử dụng id của sản phẩm đã tạo
                $image->save(); // Lưu ảnh vào cơ sở dữ liệu
            }
        }

        // Xử lý xóa ảnh
        if ($request->has('delete_image')) {
            $imagePath = public_path('images/products/' . $product->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $product->image = null;
        }

        // Lưu thông tin sản phẩm sau khi cập nhật
        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Cập nhật sản phẩm thành công.');
    }
    public function status($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.product.index')->with('error', 'Sản phẩm không tồn tại.');
        }

        $product->status = $product->status == 1 ? 2 : 1;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;
        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Thay đổi trạng thái thành công.');
    }
    public function delete($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.product.index')->with('error', 'Danh mục không tồn tại.');
        }

        $product->status = 0;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;
        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Danh mục đã được đưa vào thùng rác.');
    }
    public function trash()
    {
        $list = Product::where("product.status", 0)
        ->join("category", "product.category_id", "=", "category.id")
        ->join("brand", "product.brand_id", "=", "brand.id")
        ->orderBy("product.created_at", "DESC")
        ->select(
            "product.price",
            "product.pricesale",
            "product.status",
            "product.id",
            "product.slug",
            "product.name",
            "product.image",
            "category.name as categoryname",
            "brand.name as brandname"
        )
            ->paginate(7); 
        return view('backend.product.trash', compact('list'));
    }
    public function restore($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.product.index')->with('error', 'Danh mục không tồn tại.');
        }

        $product->status = 2;
        $product->updated_at = now();
        $product->updated_by = Auth::id() ?? 1;
        $product->save();

        return redirect()->route('admin.product.trash')->with('success', 'Khôi phục sản phẩm thành công.');
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return redirect()->route('admin.product.trash')->with('success', 'Xóa thương hiệu thành công.');
        }
        return redirect()->route('admin.product.trash')->with('error', 'Không tìm thấy thương hiệu.');
    }
}