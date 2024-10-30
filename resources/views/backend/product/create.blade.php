<form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Tên Sản Phẩm</label>
        <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control" placeholder="Nhập tên sản phẩm..." required>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="price">Giá</label>
        <input type="number" value="{{ old('price') }}" name="price" id="price" class="form-control" placeholder="Nhập giá sản phẩm..." required>
        @error('price')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="pricesale">Giá Khuyến Mãi</label>
        <input type="number" value="{{ old('pricesale') }}" name="pricesale" id="pricesale" class="form-control" 
        placeholder="Nhập giá khuyến mãi...">
        @error('pricesale')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="sizes">Kích thước</label>
        <select name="size_type" id="size_type" class="form-control" required>
            <option value="freesize" {{ old('size_type') == 'freesize' ? 'selected' : '' }}>Freesize</option>
            <option value="specific" {{ old('size_type') == 'specific' ? 'selected' : '' }}>Chọn size</option>
        </select>
    </div>

    <div id="specific_sizes" style="display: none;">
        @foreach(['S', 'M', 'L', 'XL', 'XXL', '38', '39', '40', '41', '42', '43', '44', '45'] as $size)
        <div class="form-group">
            <label for="size_{{ $size }}">Số lượng {{ $size }}</label>
            <input type="number" name="sizes[{{ $size }}]" id="size_{{ $size }}" class="form-control" value="{{ old('sizes.' . $size, 0) }}" min="0">
        </div>
        @endforeach
    </div>

    {{-- <div class="form-group">
        <label for="category_id">Danh Mục</label>
        <select name="category_id" id="category_id" class="form-control" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div> --}}
    <div class="form-group">
        <label for="category_id">Danh Mục</label>
        <select name="category_id" id="category_id" class="form-control" required>
            <option value="0" @if(empty(old('category_id'))) selected @endif>None</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
            @error('category_id')
                <span class="text-danger">{{$message}}</span>
            @enderror
    </div>
    {{-- <div class="form-group">
        <label for="brand_id">Thương Hiệu</label>
        <select name="brand_id" id="brand_id" class="form-control" required>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}" @if(old('brand_id') == $brand->id) selected @endif>{{ $brand->name }}</option>
            @endforeach
        </select>
        @error('brand_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div> --}}
    <div class="form-group">
        <label for="brand_id">Thương hiệu</label>
        <select name="brand_id" id="brand_id" class="form-control" required>
            <option value="0" @if(empty(old('brand_id'))) selected @endif>None</option>
            @foreach($brands as $brand)
            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>
            @error('brand_id')
                <span class="text-danger">{{$message}}</span>
            @enderror
    </div>
    <div class="form-group">
        <label for="name">Chi tiết</label>
        <input type="text" value="{{ old('detail') }}" name="detail" id="detail" class="form-control" placeholder="Nhập chi tiết..." required>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="name">Mô tả sản phẩm</label>
        <input type="text" value="{{ old('description') }}" name="description" id="description" class="form-control" placeholder="Nhập mô tả..." required>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
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
        <input type="file" name="images[]" id="images" class="form-control-file" multiple required>
        @error('images')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group d-flex justify-content-end">
        <button type="button" class="btn btn-secondary " data-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-success ml-2">Thêm Sản Phẩm</button>
    </div>
</form>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var sizeTypeSelect = document.getElementById('size_type');
    var specificSizesDiv = document.getElementById('specific_sizes');

    function toggleSizeFields() {
        if (sizeTypeSelect.value === 'specific') {
            specificSizesDiv.style.display = 'block';
        } else {
            specificSizesDiv.style.display = 'none';
        }
    }

    sizeTypeSelect.addEventListener('change', toggleSizeFields);
    toggleSizeFields();
    });
</script>