          <div class="card">
            {{-- <div class="card-header">
              <h4><label>Thêm Danh Mục</label></h4>
            </div> --}}
            <div class="card-body">
                      <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="mb-3">
                                <label for="name">Tên danh mục</label>
                                <input type="text" value="{{old('name')}}" name="name" id="name" class="form-control"
                                placeholder="Nhập tên danh mục...">
                                @error('name')
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description">Mô tả</label>
                                <textarea name="description" id="description" class="form-control" 
                                placeholder="Nhập mô tả...">{{old('description')}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="parent_id">Danh mục cha</label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="0">None</option>
                                    {!!$htmlparentid!!}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sort_order">Sắp xếp</label>
                                <select name="sort_order" id="sort_order" class="form-control">
                                    <option value="0">None</option>
                                    {!!$htmlsortorder!!}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="image">Hình</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="status">Trạng thái</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="2">Chưa xuất bản</option>
                                    <option value="1">Xuất bản</option>
                                </select>
                            </div>
                            <div class="mb-3 d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary " data-dismiss="modal">Đóng</button>
                                <button type="submit" name="create" class="btn btn-success ml-2">Thêm danh mục</button>
                            </div>
                      </form>
            </div>
          </div>
