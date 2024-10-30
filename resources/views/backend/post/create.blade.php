<form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{-- <div class="form-group">
        <label for="name">Tên Bài Viết</label>
        <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control" 
        placeholder="Nhập tên bài viết..." required>
    </div> --}}
    <div class="form-group">
        <label for="topic_id">Chủ đề</label>
        <select name="topic_id" id="topic_id" class="form-control" required>
            <option value="0" @if(empty(old('topic_id'))) selected @endif>None</option>
            @foreach($topics as $topic)
            <option value="{{ $topic->id }}">{{ $topic->name }}</option>
            @endforeach
        </select>
            @error('topic_id')
                <span class="text-danger">{{$message}}</span>
            @enderror
    </div>
    <div class="form-group">
        <label for="title">Tiêu Đề</label>
        <input type="text" value="{{ old('title') }}" name="title" id="title" class="form-control" 
        placeholder="Nhập tiêu đề..." required>
        @error('title')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="detail">Chi Tiết</label>
        <textarea name="detail" id="detail" class="form-control" placeholder="Nhập chi tiết..." required>{{ old('detail') }}</textarea>
    </div>
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea name="description" id="description" class="form-control" placeholder="Nhập mô tả..." required>{{ old('description') }}</textarea>
    </div>
    <div class="form-group">
        <label for="type">Kiểu bài viết</label>
        <input type="text" value="{{ old('type') }}" name="type" id="type" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="status">Trạng thái</label>
        <select name="status" id="status" class="form-control">
            <option value="2">Chưa xuất bản</option>
            <option value="1">Xuất bản</option>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Hình Ảnh</label>
        <input type="file" name="image" id="image" class="form-control-file" required>
        @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group d-flex justify-content-end">
        <button type="button" class="btn btn-secondary button-spacing" data-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-success">Lưu Bài Viết</button>
    </div>
</form>
