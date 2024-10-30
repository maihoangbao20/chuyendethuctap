<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $list = User::where("status", "!=", 0)
            ->orderBy("created_at", "DESC")
            ->select('id', 'username', 'name', 'phone', 'email', 'roles', 'address', "status")
            ->paginate(7);
        return view('backend.user.index', compact("list"));
    }
    public function create()
    {
        return view('backend.user.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users',
            'address' => 'required|string|max:255',
            'roles' => 'required|string|max:255',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->roles = $request->roles;
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'user created successfully.');
    }
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.user.index')->with('error', 'Người dùng không tồn tại.');
        }


        return view('backend.user.show', compact('user'));
    }
    public function status($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.user.index')->with('error', 'Người dùng không tồn tại.');
        }

        $user->status = $user->status == 1 ? 2 : 1;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id() ?? 1;
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Thay đổi trạng thái thành công.');
    }
    public function edit($id, Request $request)
    {
        $topic = Topic::find($id);
        if (!$topic) {
            return redirect()->route('admin.topic.index')->with('error', 'Thương hiệu không tồn tại.');
        }

        $list = Topic::where("status", "!=", 0)
            ->orderBy("created_at", "DESC")
            ->select('id', 'slug', 'name', 'description', "status", "sort_order")
            ->get();

        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>Sau: " . $row->name . "</option>";
        }

        return view('backend.topic.edit', compact('topic', 'list', 'htmlsortorder'));
    }
    public function update(StoreTopicRequest $request, $id)
    {
        $topic = Topic::find($id);
        if (!$topic) {
            return redirect()->route('admin.topic.index')->with('error', 'Chủ đề không tồn tại.');
        }

        $topic->name = $request->name;
        $topic->description = $request->description;
        $topic->sort_order = $request->sort_order;
        $topic->status = $request->status;
        $topic->slug = Str::of($request->name)->slug('-');
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1;

        $topic->save();
        return redirect()->route('admin.topic.index')->with('success', 'Cập nhật chủ đề thành công.');
    }
    public function delete($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.user.index')->with('error', 'Người dùng không tồn tại.');
        }

        $user->status = 0;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id() ?? 1;
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Đã đưa vào thùng rác.');
    }
    public function trash()
    {
        $list = User::where('status', 0)
            ->orderBy('created_at', 'DESC')
            ->paginate(7);
        return view('backend.user.trash', compact('list'));
    }
    public function restore($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.user.index')->with('error', 'Không tồn tại.');
        }

        $user->status = 2;
        $user->updated_at = now();
        $user->updated_by = Auth::id() ?? 1;
        $user->save();

        return redirect()->route('admin.user.trash')->with('success', 'Khôi phục thành công.');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('admin.user.trash')->with('success', 'Xóa thành công.');
        }
        return redirect()->route('admin.user.trash')->with('error', 'Không tìm thấy.');
    }
}
