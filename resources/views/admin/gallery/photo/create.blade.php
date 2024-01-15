<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Gallery</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('photo.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Title english</label>
                    <input type="text" name="title_en" class="form-control @error('title_en') is-invalid @enderror">
                    @error('title_en')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Title bangla</label>
                    <input type="text" name="title_bn" class="form-control @error('title_bn') is-invalid @enderror">
                    @error('title_bn')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-group mt-3">
                    <div class="custom-file">
                      <input type="file" name="photo" class="custom-file-input @error('photo') is-invalid @enderror" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose Photo</label>
                    </div>

                </div>
                @error('photo')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                {{-- <div class="form-group mt-3">
                    <label for="">Select Photo Type </label>
                    <select name="type" class="form-control">
                        <option value="0">Choose Thumbnail Size</option>
                        <option value="1">Big Thumbnail</option>
                        <option value="0">Small Thumbnail</option>
                    </select>
                    @error('type')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div> --}}

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

