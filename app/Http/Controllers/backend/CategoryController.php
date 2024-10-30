<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Facades\File;
class CategoryController extends Controller
{
    public function index()
    {
        $list = Category::where('category.status', '!=', 0)
            ->orderBy('category.created_at', 'DESC')
            ->leftJoin('category as parent', 'category.parent_id', '=', 'parent.id')
            ->select("category.id", "category.name", "category.image", "category.slug", 
            "category.status", "category.parent_id", 'parent.name as parent_name')
            ->paginate(7);

        $htmlparentid = "";
        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlparentid .= "<option value='" . $row->id . "'>" . $row->name . "</option>";
            $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>Sau:" . $row->name . "</option>";
        }

        return view("backend.category.index", compact("list", "htmlparentid", "htmlsortorder"));
    }
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;
        if ($request->image) {
            $fileName = date('YmdHis') . '.' . $request->image->extension();
            $request->image->move(public_path('images/categorys/'), $fileName);
            $category->image = $fileName;
        }
        $category->status = $request->status;
        $category->slug = Str::of($request->name)->slug('-');
        $category->created_at = date('Y-m-d H:i:s');
        $category->created_by = Auth::id() ?? 1;

        $category->save();
        return redirect()->route('admin.category.index')->with('success', 'Thêm danh mục thành công.');
    }
    public function show($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('admin.category.index')->with('error', 'Danh mục không tồn tại.');
        }

        $parentName = '';
        $sortOrder = '';
        if ($category->parent_id) {
            $parentCategory = Category::find($category->parent_id);
            if ($parentCategory) {
                $parentName = $parentCategory->name;
                $sortOrder = $parentCategory->sort_order;
            }
        }

        return view('backend.category.show', compact('category', 'parentName', 'sortOrder'));
    }
    public function edit($id, Request $request)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('admin.category.index')->with('error', 'Danh mục không tồn tại.');
        }

        if ($request->has('delete_image')) {
            $imagePath = public_path('images/categorys/' . $category->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $category->image = null;
            $category->save();
            return redirect()->route('admin.category.edit', $id)->with('success', 'Đã xóa hình ảnh.');
        }

        $list = Category::where("category.status", "!=", 0)
        ->orderBy('category.created_at', 'DESC')
        ->leftJoin('category as parent', 'category.parent_id', '=', 'parent.id')
        ->select("category.id", "category.name", "category.image", "category.slug", "category.status", "category.parent_id", 'parent.name as parent_name')
        ->get();

        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>Sau: " . $row->name . "</option>";
        }

        return view('backend.category.edit', compact('category', 'list', 'htmlsortorder'));
    }
    public function update(StoreCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('admin.category.index')->with('error', 'Danh mục không tồn tại.');
        }

        $category->name = $request->name;
        $category->description = $request->description;
        $category->sort_order = $request->sort_order;

        if ($request->image) {
            $fileName = date('YmdHis') . '.' . $request->image->extension();
            $request->image->move(public_path('images/categorys/'), $fileName);
            $category->image = $fileName;
        }

        $category->status = $request->status;
        $category->slug = Str::of($request->name)->slug('-');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1;

        $category->save();
        return redirect()->route('admin.category.index')->with('success', 'Cập nhật danh mục thành công.');
    }
    public function status($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('admin.category.index')->with('error', 'Danh mục không tồn tại.');
        }

        $category->status = $category->status == 1 ? 2 : 1;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1;
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Thay đổi trạng thái thành công.');
    }
    public function delete($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('admin.category.index')->with('error', 'Danh mục không tồn tại.');
        }

        $category->status = 0;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1;
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Danh mục đã được đưa vào thùng rác.');
    }
    public function trash()
    {
        $list = Category::where('category.status', 0)
        ->orderBy('category.created_at', 'DESC')
        ->leftJoin('category as parent', 'category.parent_id', '=', 'parent.id')
        ->select("category.id", "category.name", "category.image", "category.slug", "category.status", "category.parent_id", 'parent.name as parent_name')
        ->paginate(7);
        return view('backend.category.trash', compact('list'));
    }
    public function restore($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('admin.category.index')->with('error', 'Danh mục không tồn tại.');
        }

        $category->status = 2;
        $category->updated_at = now();
        $category->updated_by = Auth::id() ?? 1;
        $category->save();

        return redirect()->route('admin.category.trash')->with('success', 'Khôi phục danh mục thành công.');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return redirect()->route('admin.category.trash')->with('success', 'Xóa danh mục thành công.');
        }
        return redirect()->route('admin.category.trash')->with('error', 'Không tìm thấy danh mục.');
    }
}