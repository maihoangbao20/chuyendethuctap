<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Requests\StoreBannerRequest;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function index()
    {
        $list = Banner::where("status", "!=", 0)
        ->orderBy("created_at", "DESC")
        ->select("id", "name", "link", "image","position", "status","description")
        ->paginate(7);
        return view('backend.banner.index',compact("list"));
    }
    public function store(StoreBannerRequest $request)
    {
        $banner = new Banner();
        if ($request->image) {
            $exten=$request->image->extension();
            if(in_array($exten,["png","jpg","gif","webp"]))
            {
                $fileName = date('YmdHis') . '.' . $request->image->extension();
                $request->image->move(public_path('images/banners/'), $fileName);
                $banner->image = $fileName;
            }

            $banner->name = $request->name;
            $banner->position = $request->position;
            $banner->description = $request->description;

            $banner->status = $request->status;
            $banner->link = Str::of($request->name)->slug('-');
            $banner->created_at = date('Y-m-d H:i:s');
            $banner->created_by = Auth::id() ?? 1;

        }        
        $banner->save();
        return redirect()->route('admin.banner.index')->with('success', 'Thêm banner thành công.');
    }
    public function show($id)
    {
        $banner = Banner::find($id);
        if (!$banner) {
            return redirect()->route('admin.banner.index')->with('error', 'Không tồn tại.');
        }

        return view('backend.banner.show', compact('banner'));
    }
    public function status($id)
    {
        $banner = Banner::find($id);
        if (!$banner) {
            return redirect()->route('admin.banner.index')->with('error', 'Không tồn tại.');
        }

        $banner->status = $banner->status == 1 ? 2 : 1;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1;
        $banner->save();

        return redirect()->route('admin.banner.index')->with('success', 'Thay đổi trạng thái thành công.');
    }
    public function edit($id, Request $request)
    {
        $banner = Banner::find($id);
        if (!$banner) {
            return redirect()->route('admin.banner.index')->with('error', 'Không tồn tại.');
        }

        if ($request->has('delete_image')) {
            $imagePath = public_path('images/banners/' . $banner->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $banner->image = null;
            $banner->save();
            return redirect()->route('admin.banner.edit', $id)->with('success', 'Đã xóa hình ảnh.');
        }


        $list = Banner::where("status", "!=", 0)
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name', 'link', 'position', 'status','image','description')
            ->get();


        return view('backend.banner.edit', compact('banner', 'list'));
    }
    public function update(StoreBannerRequest $request, $id)
    {
        $banner = Banner::find($id);
        if (!$banner) {
            return redirect()->route('admin.banner.index')->with('error', 'Không tồn tại.');
        }

        $banner->name = $request->name;
        $banner->description = $request->description;
        if ($request->image) {
            $fileName = date('YmdHis') . '.' . $request->image->extension();
            $request->image->move(public_path('images/banners/'), $fileName);
            $banner->image = $fileName;
        }

        $banner->status = $request->status;
        $banner->link = Str::of($request->name)->slug('-');
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1;

        $banner->save();
        return redirect()->route('admin.banner.index')->with('success', 'Cập nhật thành công.');
    }
    public function delete($id)
    {
        $banner = Banner::find($id);
        if (!$banner) {
            return redirect()->route('admin.banner.index')->with('error', 'Không tồn tại.');
        }

        $banner->status = 0;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1;
        $banner->save();

        return redirect()->route('admin.banner.index')->with('success', 'Đã được đưa vào thùng rác.');
    }
    public function trash()
    {
        $deletedbannersCount = Banner::where('status', 0)->count();
        $deletedBy = Auth::user()->name ?? 'Admin'; // Sử dụng tên người dùng hiện tại hoặc giá trị mặc định là 'Unknown' nếu không có người dùng đăng nhập
        $deletedAt = now(); // Lấy thời gian hiện tại
        $list = Banner::where('status', 0)
            ->orderBy('created_at', 'DESC')
            ->paginate(7);
        return view('backend.banner.trash', compact('list', 'deletedbannersCount', 'deletedBy', 'deletedAt'));
    }
    public function restore($id)
    {
        $banner = Banner::find($id);
        if (!$banner) {
            return redirect()->route('admin.banner.index')->with('error', 'banner không tồn tại.');
        }

        $banner->status = 2;
        $banner->updated_at = now();
        $banner->updated_by = Auth::id() ?? 1;
        $banner->save();

        return redirect()->route('admin.banner.trash')->with('success', 'Khôi phục thành công.');
    }
    public function destroy($id)
    {
        $banner = Banner::find($id);
        if ($banner) {
            $banner->delete();
            return redirect()->route('admin.banner.trash')->with('success', 'Xóa thương hiệu thành công.');
        }
        return redirect()->route('admin.banner.trash')->with('error', 'Không tìm thấy thương hiệu.');
    }
}
