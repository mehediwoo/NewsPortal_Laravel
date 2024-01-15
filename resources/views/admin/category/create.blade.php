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
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Category english</label>
                    <input type="text" name="category_en" class="form-control @error('category_en') is-invalid @enderror">
                    @error('category_en')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Category bangla</label>
                    <input type="text" name="category_bn" class="form-control @error('category_bn') is-invalid @enderror">
                    @error('category_bn')
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
