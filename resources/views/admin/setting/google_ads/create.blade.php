<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Create Ads</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('ads.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Ads Title</label>
                    <input type="text" name="ads_title" class="form-control @error('ads_title') is-invalid @enderror" required>
                    @error('ads_title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Google Code Snippet</label>
                    <textarea name="code_snippet"  cols="20" rows="5" class="form-control" required></textarea>
                    @error('code_snippet')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>

                <div class="form-group">
                    <label for="">Add Type</label>
                    <select name="ads_type" class="form-control" required>
                        <option value="">Choose Ads Type</option>
                        <option value="verticale">Verticale Ads</option>
                        <option value="squire">Squire Ads</option>
                    </select>
                    @error('ads_type')
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
