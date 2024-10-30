<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function index()
    {
        $list = Brand::where("status","!=",0)
        ->orderBy("created_at","DESC")
        ->select("id","name","slug","image","description", "status","created_at","updated_at")
        ->paginate(7);

        $htmlsortorder = "";
        foreach ($list as $row) 
        {
            $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>Sau:" . $row->name . "</option>";
        }

        return view('backend.brand.index',compact("list", "htmlsortorder"));
    }
    public function store(StoreBrandRequest $request)
    {
        $brand = new Brand();
        $brand->name= $request->name;
        $brand->description=$request->description;
        $brand->sort_order = $request->sort_order;
        if ($request->image) {
            $fileName = date('YmdHis') . '.' . $request->image->extension();
            $request->image->move(public_path('images/brands/'), $fileName);
            $brand->image = $fileName;
        }

        $brand->status = $request->status;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->created_at = date('Y-m-d H:i:s');
        $brand->created_by = Auth::id() ?? 1;

        $brand->save();
        return redirect()->route('admin.brand.index')->with('success', 'Thêm thương hiệu thành công.');
    }
    public function show($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return redirect()->route('admin.brand.index')->with('error', 'Thương hiệu không tồn tại.');
        }
        return view('backend.brand.show', compact('brand'));
    }
    public function edit($id, Request $request)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return redirect()->route('admin.brand.index')->with('error', 'Thương hiệu không tồn tại.');
        }

        if ($request->has('delete_image')) {
            $imagePath = public_path('images/brands/' . $brand->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $brand->image = null;
            $brand->save();
            return redirect()->route('admin.brand.edit', $id)->with('success', 'Đã xóa hình ảnh.');
        }

        $list = Brand::where("status", "!=", 0)
        ->orderBy("created_at", "DESC")
        ->select("id", "name", "slug", "image", "description", "status", "created_at", "updated_at")
        ->get();

        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>Sau: " . $row->name . "</option>";
        }

        return view('backend.brand.edit', compact('brand','list', 'htmlsortorder'));
    }
    public function update(StoreBrandRequest $request, $id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return redirect()->route('admin.brand.index')->with('error', 'Thương hiệu không tồn tại.');
        }

        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->sort_order = $request->sort_order;

        if ($request->image) {
            $fileName = date('YmdHis') . '.' . $request->image->extension();
            $request->image->move(public_path('images/brands/'), $fileName);
            $brand->image = $fileName;
        }

        $brand->status = $request->status;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id() ?? 1;

        $brand->save();
        return redirect()->route('admin.brand.index')->with('success', 'Cập nhật thương hiệu thành công.');
    }
    public function status($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return redirect()->route('admin.brand.index')->with('error', 'Thương hiệu không tồn tại.');
        }

        $brand->status = $brand->status == 1 ? 2 : 1;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id() ?? 1;
        $brand->save();

        return redirect()->route('admin.brand.index')->with('success', 'Thay đổi trạng thái thành công.');
    }
    public function delete($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return redirect()->route('admin.brand.index')->with('error', 'Thương hiệu không tồn tại.');
        }

        $brand->status = 0;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id() ?? 1;
        $brand->save();

        return redirect()->route('admin.brand.index')->with('success', 'Thương hiệu đã được đưa vào thùng rác.');
    }
    public function trash()
    {
        $list = Brand::where('status', 0)
        ->orderBy('created_at', 'DESC')
        ->paginate(7);
        return view('backend.brand.trash', compact('list'));
    }
    public function restore($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return redirect()->route('admin.brand.index')->with('error', 'Thương hiệu không tồn tại.');
        }

        $brand->status = 2;
        $brand->updated_at = now();
        $brand->updated_by = Auth::id() ?? 1;
        $brand->save();

        return redirect()->route('admin.brand.trash')->with('success', 'Khôi phục thương hiệu thành công.');
    }
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if ($brand) {
            $brand->delete();
            return redirect()->route('admin.brand.trash')->with('success', 'Xóa thương hiệu thành công.');
        }
        return redirect()->route('admin.brand.trash')->with('error', 'Không tìm thấy thương hiệu.');
    }
}
