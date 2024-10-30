<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Topic;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index()
    {
        $list = Post::where("post.status", "!=", 0)
            ->orderBy("created_at", "DESC")
            ->join("topic", "post.topic_id", "=", "topic.id")
            ->select(
                'post.id',
                'post.detail',
                'post.image',
                'post.title',
                'post.type',
                'post.description',
                'post.status',
                'post.created_at',
                'topic.name as topicname'
            )
            ->paginate(7);
        $htmltopicid = "";
        foreach ($list as $topic) {
            $htmltopicid .= "<option value='" . $topic->id . "'>" . $topic->name . "</option>";
        }

        $topics = Topic::all();
        if ($topics->isEmpty()) {
            return redirect()->route('admin.post.index')->with('error', 'Post are not available.');
        }
        return view('backend.post.index', compact("list", "htmltopicid", "topics"));
    }
    public function edit($id, Request $request)
    {
        $post = Post::findOrFail($id);
        $topics = Topic::all();

        if ($request->has('delete_image')) {
            $imagePath = public_path('images/posts/' . $post->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $post->image = null;
            $post->save();
            return redirect()->route('admin.post.edit', $id)->with('success', 'Đã xóa hình ảnh.');
        }
       
        return view('backend.post.edit', compact('post', 'topics'));
    }

    public function update(StorePostRequest $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->topic_id = $request->topic_id;
        $post->detail = $request->detail;
        $post->description = $request->description;


        if ($request->image) {
            $fileName = date('YmdHis') . '.' . $request->image->extension();
            $request->image->move(public_path('images/posts/'), $fileName);
            $post->image = $fileName;
        }

        $post->status = $request->status;
        $post->slug = Str::of($request->name)->slug('-');
        $post->created_at = date('Y-m-d H:i:s');
        $post->created_by = Auth::id() ?? 1;
        $post->save();

        return redirect()->route('admin.post.index')->with('success', 'Bài viết đã được cập nhật thành công.');
    }
    public function create()
    {
        $topics = Topic::where("status", "!=", 0)
        ->orderBy("created_at", "DESC")
        ->get();

        return view('backend.post.create', compact('topics'));
    }
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->topic_id = $request->topic_id;
        $post->detail = $request->detail ?? '';
        $post->title = $request->title;
        $post->type = $request->type;
        $post->description = $request->description;
        
        if ($request->image) {
            $fileName = date('YmdHis') . '.' . $request->image->extension();
            $request->image->move(public_path('images/posts/'), $fileName);
            $post->image = $fileName;
        }
        $post->status = $request->status;
        $post->slug = Str::of($request->title)->slug('-');
        $post->created_at = now();
        $post->created_by = Auth::id() ?? 1;
        $post->save();

        return redirect()->route('admin.post.index')->with('success', 'Thêm bài viết thành công.');
    }
    public function status($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('admin.post.index')->with('error', 'Danh mục không tồn tại.');
        }

        $post->status = ($post->status == 1) ? 2 : 1;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id() ?? 1;
        $post->save();

        return redirect()->route('admin.post.index')->with('success', 'Thay đổi trạng thái thành công.');
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $topicName = $post->topicname; 
        return view('backend.post.show', compact('post','topicName'));
    }
    public function delete($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('admin.post.index')->with('error', 'Không tồn tại.');
        }

        $post->status = 0;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id() ?? 1;
        $post->save();

        return redirect()->route('admin.post.index')->with('success', 'Đã được đưa vào thùng rác.');
    }
    public function trash()
    {
        $list = Post::where('post.status', 0)
        ->orderBy('created_at', 'DESC')
        ->join("topic", "post.topic_id", "=", "topic.id")
        ->select(
            'post.*',
            'topic.name as topicname'
        )
            ->paginate(7);

        return view('backend.post.trash', compact('list'));
    }
    public function restore($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('admin.post.index')->with('error', 'Menu không tồn tại.');
        }

        $post->status = 2;
        $post->updated_at = now();
        $post->updated_by = Auth::id() ?? 1;
        $post->save();

        return redirect()->route('admin.post.trash')->with('success', 'Khôi phục thành công.');
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            return redirect()->route('admin.post.trash')->with('success', 'Xóa thương hiệu thành công.');
        }
        return redirect()->route('admin.post.trash')->with('error', 'Không tìm thấy thương hiệu.');
    }
}
