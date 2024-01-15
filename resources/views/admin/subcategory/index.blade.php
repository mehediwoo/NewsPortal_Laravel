@extends('admin.layout.app')
@section('title','Sub Category')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sub-Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Sub-Category</li>
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
                  <h3 class="card-title">All Sub-Category</h3>
                  <button style="float:right" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                    Add Sub Category
                  </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Sub Category Bangla</th>
                      <th>Parent Category Bangla</th>
                      <th>Sub Category English</th>
                      <th>Parent Category English</th>
                      <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @if (!empty($subCategory) && $subCategory->count() > 0)
                            @foreach ($subCategory as $key => $iteam)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $iteam->subCategory_bn }}</td>
                                <td>{{ $iteam->category->category_bn }}</td>
                                <td>{{ $iteam->subCategory_en }}</td>
                                <td>{{ $iteam->category->category_en }}</td>
                                <td class="d-flex">
                                  <a href="{{ route('sub-category.edit',$iteam->id) }}" class="btn btn-outline-warning">Edit</a>

                                  <form action="{{ route('sub-category.destroy',$iteam->id) }}" method="post">
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
                            <th>Sub Category Bangla</th>
                            <th>Parent Category Bangla</th>
                            <th>Sub Category English</th>
                            <th>Parent Category English</th>
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
      @include('admin.subcategory.create')





@endsection
