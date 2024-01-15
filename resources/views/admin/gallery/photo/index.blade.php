@extends('admin.layout.app')
@section('title','Admin | Photo Gallery')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Photo Gallery</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Photo Gallery</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">All Gallery Photos</h3>
                  <button style="float:right" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                    Add Photos
                  </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th>SL</th>
                        <th>Title Bangla</th>
                        <th>Title English</th>
                        <th>Photo</th>
                        <th>Type</th>
                        <th>Action(s)</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (!empty($data) && $data->count() > 0)
                            @foreach ($data as $key => $iteam)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $iteam->title_bn }}</td>
                                <td>{{ $iteam->title_en }}</td>
                                <td><img src="{{ asset('storage/'.$iteam->photo) }}" style="height:70px;width:100px"></td>
                                <td>
                                    @if ($iteam->type =='0')
                                        <p class="badge badge-warning">Small Thumbnail</p>
                                    @elseif($iteam->type=='1')
                                    <p class="badge badge-success">Big Thumbnail</p>
                                    @endif
                                </td>
                                <td class="d-flex">
                                  <a href="{{ route('photo.edit',$iteam->id) }}" class="btn btn-outline-warning">Edit</a>

                                  <form action="{{ route('photo.destroy',$iteam->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-outline-danger ml-2" onclick="return confirm('Are you sure want to delete it?')">
                                </form>

                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SL</th>
                            <th>Title Bangla</th>
                            <th>Title English</th>
                            <th>Photo</th>
                            <th>Type</th>
                            <th>Action(s)</th>
                            </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>


      <!-- Add Modal -->
      @include('admin.gallery.photo.create')





@endsection

@section('script')
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
