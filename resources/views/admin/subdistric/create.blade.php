<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Sub Districs</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('sub-districs.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Sub Districs English</label>
                    <input type="text" name="subdistrics_en" class="form-control @error('subdistrics_en') is-invalid @enderror" >
                    @error('subdistrics_en')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Sub Districs Bangla</label>
                    <input type="text" name="subdistrics_bn" class="form-control @error('subdistrics_bn') is-invalid @enderror" >
                    @error('subdistrics_bn')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Parent Districs</label>
                    <select name="parentDistrics" class="form-control" >
                        <option value="">Choose Options</option>
                        @if (!empty($parent) && $parent->count()>0)
                        @foreach ($parent as $iteam)
                        <option value="{{ $iteam->id }}">{{ $iteam->distric_bn }}</option>
                        @endforeach
                        @endif
                    </select>
                    @error('parentDistrics')
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
