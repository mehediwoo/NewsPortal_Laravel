<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add new Page</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('page.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Page title english</label>
                    <input type="text" name="page_title_en" class="form-control @error('page_title_en') is-invalid @enderror" required>
                    @error('page_title_en')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Page title bangla</label>
                    <input type="text" name="page_title_bn" class="form-control @error('page_title_bn') is-invalid @enderror" required>
                    @error('page_title_bn')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Page Content english</label>
                    <textarea name="page_content_en" cols="30" rows="5" class="form-control" required></textarea>
                    @error('page_content_en')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Page Content bangla</label>
                    <textarea name="page_content_bn" cols="30" rows="5" class="form-control" required></textarea>
                    @error('page_content_bn')
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
