                  <div class="card">
                    <div class="card-header">
                      <h4><label>Thêm Mục</label></h4>
                    </div>
                    <div class="card-body">
                      <form method="POST" action="{{ route('admin.menu.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="name">Tên mục</label>
                          <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control small-placeholder" placeholder="Nhập tên mục..." required>
                          @error('name')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="type">Kiểu</label>
                          <input type="text" value="{{ old('type') }}" name="type" id="type" class="form-control small-placeholder" placeholder="Nhập kiểu..." required>
                          @error('type')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="position">Vị trí</label>
                          <input type="text" value="{{ old('position') }}" name="position" id="position" class="form-control small-placeholder" placeholder="Nhập vị trí..." required>
                          @error('position')
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
                        <button type="submit" class="btn btn-success">Thêm mục</button>
                      </form>
                    </div>
                  </div>
