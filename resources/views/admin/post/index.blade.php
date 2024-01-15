@extends('admin.layout.app')
@section('title','Admin | All Post')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Posts</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Posts</li>
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
                  <h3 class="card-title">All Posts</h3>
                  <a href="{{ route('post.create') }}" style="float:right" class="btn btn-info">Add Post</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Sub Category</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @if (!empty($data) && $data->count() > 0)
                            @foreach ($data as $key => $iteam)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    {{ $iteam->title_bn }} <br>
                                    {{ $iteam->title_en }}
                                </td>
                                <td>{{ $iteam->category->category_bn }}</td>
                                <td>
                                    @if($iteam->subcate_id=='')
                                    {{ 'subcategory null' }}
                                    @else
                                    {{ $iteam->subcategory->subCategory_bn }}
                                    @endif
                                </td>
                                <td>
                                    <img src="{{ asset('storage/'.$iteam->image) }}" alt="" height="80px" width="100px">
                                </td>
                                <td class="d-flex">
                                  <a href="{{ route('post.edit',$iteam->id) }}" class="btn btn-outline-warning">Edit</a>

                                  <form action="{{ route('post.destroy',$iteam->id) }}" method="post">
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
                            <th>Title</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Image</th>
                            <th>Action</th>
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
      @include('admin.distric.create')





@endsection
