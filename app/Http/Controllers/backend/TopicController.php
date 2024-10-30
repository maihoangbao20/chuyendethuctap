<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Http\Requests\StoreTopicRequest;
use Illuminate\Support\Facades\File;

class TopicController extends Controller
{
    public function index()
    {
        $list = Topic::where("status", "!=", 0)
            ->orderBy("created_at", "DESC")
            ->select('id', 'slug', 'name', 'description', "status", "sort_order")
            ->paginate(7);

        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>Sau:" . $row->name . "</option>";
        }

        return view('backend.topic.index', compact("list", "htmlsortorder"));
    }
    public function store(StoreTopicRequest $request)
    {
        $topic = new Topic();
        $topic->name = $request->name;
        $topic->description = $request->description;
        $topic->sort_order = $request->sort_order;
        $topic->status = $request->status;
        $topic->slug = Str::of($request->name)->slug('-');
        $topic->created_at = date('Y-m-d H:i:s');
        $topic->created_by = Auth::id() ?? 1;

        $topic->save();
        return redirect()->route('admin.topic.index')->with('success', 'Thêm chủ đề thành công.');
    }
    public function show($id)
    {
        $topic = Topic::find($id);
        if (!$topic) {
            return redirect()->route('admin.topic.index')->with('error', 'Chủ đề không tồn tại.');
        }

        $sortedAfterTopic = Topic::find($topic->sort_order);
        $sortedAfterTopicName = $sortedAfterTopic ? $sortedAfterTopic->name : 'N/A';

        return view('backend.topic.show', compact('topic', 'sortedAfterTopicName'));
    }
    public function status($id)
    {
        $topic = Topic::find($id);
        if (!$topic) {
            return redirect()->route('admin.topic.index')->with('error', 'Thương hiệu không tồn tại.');
        }

        $topic->status = $topic->status == 1 ? 2 : 1;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1;
        $topic->save();

        return redirect()->route('admin.topic.index')->with('success', 'Thay đổi trạng thái thành công.');
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
        $topic = Topic::find($id);
        if (!$topic) {
            return redirect()->route('admin.topic.index')->with('error', 'Thương hiệu không tồn tại.');
        }

        $topic->status = 0;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1;
        $topic->save();

        return redirect()->route('admin.topic.index')->with('success', 'Thương hiệu đã được đưa vào thùng rác.');
    }
    public function trash()
    {
        $deletedTopicsCount = Topic::where('status', 0)->count();
        $deletedBy = Auth::user()->name ?? 'Admin'; // Sử dụng tên người dùng hiện tại hoặc giá trị mặc định là 'Unknown' nếu không có người dùng đăng nhập
        $deletedAt = now(); // Lấy thời gian hiện tại
        $list = Topic::where('status', 0)
            ->orderBy('created_at', 'DESC')
            ->paginate(7);
        return view('backend.topic.trash', compact('list', 'deletedTopicsCount', 'deletedBy', 'deletedAt'));
    }
    public function restore($id)
    {
        $topic = Topic::find($id);
        if (!$topic) {
            return redirect()->route('admin.topic.index')->with('error', 'Thương hiệu không tồn tại.');
        }

        $topic->status = 2;
        $topic->updated_at = now();
        $topic->updated_by = Auth::id() ?? 1;
        $topic->save();

        return redirect()->route('admin.topic.trash')->with('success', 'Khôi phục thương hiệu thành công.');
    }
    public function destroy($id)
    {
        $topic = Topic::find($id);
        if ($topic) {
            $topic->delete();
            return redirect()->route('admin.topic.trash')->with('success', 'Xóa thương hiệu thành công.');
        }
        return redirect()->route('admin.topic.trash')->with('error', 'Không tìm thấy thương hiệu.');
    }
}
