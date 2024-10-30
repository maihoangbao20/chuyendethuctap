<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;

class MenuController extends Controller
{
    public function index()
    {
        $list = Menu::where('menu.status', '!=', 0)
            ->orderBy('menu.created_at', 'DESC')
            ->leftJoin('menu as parent', 'menu.parent_id', '=', 'parent.id')
            ->leftJoin('menu as sortorder', 'menu.sort_order', '=', 'sortorder.id')
            ->select(
                'menu.id',
                'menu.name',
                'menu.link',
                'menu.position',
                'menu.type',
                'menu.status',
                'parent.name as parent_name',
                'sortorder.name as sortorder_name',
                'menu.sort_order'
            )
            ->paginate(7);

        $htmlparentid = "";
        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlparentid .= "<option value='" . $row->id . "'>" . $row->name . "</option>";
            $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>Sau:" . $row->name . "</option>";
        }

        return view('backend.menu.index', compact("list", "htmlparentid", "htmlsortorder"));
    }
    public function store(StoreMenuRequest $request)
    {
        $menu= new Menu();
        $menu->name= $request->name;
        $menu->link = $request->link;
        $menu->position = $request->position;
        $menu->type = $request->type;
        $menu->status = $request->status;
        $menu->link = $request->type . '/' . Str::of($request->name)->slug('-');
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->created_by = Auth::id() ?? 1;

        $menu->save();
        return redirect()->route('admin.menu.index')->with('success', 'Thêm mục thành công.');
    }
    public function show($id)
    {
        $menu = Menu::find($id);
        if (!$menu) {
            return redirect()->route('admin.menu.index')->with('error', 'Không tồn tại.');
        }

        $parentName = '';
        $sortOrder = '';
        if ($menu->parent_id) {
            $parentMenu = Menu::find($menu->parent_id);
            if ($parentMenu) {
                $parentName = $parentMenu->name;
                $sortOrder = $parentMenu->sort_order;
            }
        }

        return view('backend.menu.show', compact('menu', 'parentName', 'sortOrder'));
    }
    public function status($id)
    {
        $menu = Menu::find($id);
        if (!$menu) {
            return redirect()->route('admin.menu.index')->with('error', 'Không tồn tại.');
        }

        $menu->status = $menu->status == 1 ? 2 : 1;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1;
        $menu->save();

        return redirect()->route('admin.menu.index')->with('success', 'Thay đổi trạng thái thành công.');
    }
    public function edit($id, Request $request)
    {
        $menu = Menu::find($id);
        if (!$menu) {
            return redirect()->route('admin.menu.index')->with('error', 'Danh mục không tồn tại.');
        }


        $list = Menu::where("menu.status", "!=", 0)
        ->orderBy('created_at', 'DESC')
        ->select('id', 'name', 'link', 'position', 'type', 'status')
        ->get();

        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>Sau: " . $row->name . "</option>";
        }

        return view('backend.menu.edit', compact('menu', 'list', 'htmlsortorder'));
    }
    public function update(StoreMenuRequest $request, $id)
    {
        $menu = Menu::find($id);
        if (!$menu) {
            return redirect()->route('admin.menu.index')->with('error', 'Không tồn tại.');
        }

        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->sort_order = $request->sort_order;

        if ($request->image) {
            $fileName = date('YmdHis') . '.' . $request->image->extension();
            $request->image->move(public_path('images/menus/'), $fileName);
            $menu->image = $fileName;
        }

        $menu->status = $request->status;
        $menu->slug = Str::of($request->name)->slug('-');
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1;

        $menu->save();
        return redirect()->route('admin.menu.index')->with('success', 'Cập nhật thành công.');
    }
    public function delete($id)
    {
        $menu = Menu::find($id);
        if (!$menu) {
            return redirect()->route('admin.menu.index')->with('error', 'Không tồn tại.');
        }

        $menu->status = 0;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1;
        $menu->save();

        return redirect()->route('admin.menu.index')->with('success', 'Đã được đưa vào thùng rác.');
    }
    public function trash()
    {
        $deletedmenusCount = Menu::where('status', 0)->count();
        $deletedBy = Auth::user()->name ?? 'Admin'; // Sử dụng tên người dùng hiện tại hoặc giá trị mặc định là 'Unknown' nếu không có người dùng đăng nhập
        $deletedAt = now(); // Lấy thời gian hiện tại
        $list = Menu::where('status', 0)
            ->orderBy('created_at', 'DESC')
            ->paginate(7);
        return view('backend.menu.trash', compact('list', 'deletedmenusCount', 'deletedBy', 'deletedAt'));
    }
    public function restore($id)
    {
        $menu = Menu::find($id);
        if (!$menu) {
            return redirect()->route('admin.menu.index')->with('error', 'Menu không tồn tại.');
        }

        $menu->status = 2;
        $menu->updated_at = now();
        $menu->updated_by = Auth::id() ?? 1;
        $menu->save();

        return redirect()->route('admin.menu.trash')->with('success', 'Khôi phục thành công.');
    }
    public function destroy($id)
    {
        $menu = Menu::find($id);
        if ($menu) {
            $menu->delete();
            return redirect()->route('admin.menu.trash')->with('success', 'Xóa thương hiệu thành công.');
        }
        return redirect()->route('admin.menu.trash')->with('error', 'Không tìm thấy thương hiệu.');
    }
}
