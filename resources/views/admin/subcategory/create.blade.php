<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Category</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('sub-category.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Category english</label>
                    <input type="text" name="subcategory_en" class="form-control @error('category_en') is-invalid @enderror" required>
                    @error('subcategory_en')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Sub Category bangla</label>
                    <input type="text" name="subcategory_bn" class="form-control @error('category_bn') is-invalid @enderror" required>
                    @error('subcategory_bn')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>

                <div class="form-group">
                    <label for="">Parent Category</label>
                    <select name="parentCategory" class="form-control" required>
                        @if (!empty($category) && $category->count()>0)
                        @foreach ($category as $category)
                        <option value="{{ $category->id }}">{{ $category->category_en }}</option>
                        @endforeach
                        @endif
                    </select>
                    @error('parentCategory')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <input type="submit" value="save" class="btn btn-outline-info">
                </div>
            </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
