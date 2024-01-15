@extends('admin.layout.app')
@section('title','Page')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Page</li>
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
                  <h3 class="card-title">All Page</h3>
                  <button style="float:right" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                    Add Page
                  </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Page Title English</th>
                      <th>Page Title Bangla</th>
                      <th>Page Slug</th>
                      <th>Action(s)</th>
                    </tr>
                    </thead>

                    <tbody>
                        @if (!empty($page) && $page->count() > 0)
                            @foreach ($page as $key => $iteam)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $iteam->page_title_en }}</td>
                                <td>{{ $iteam->page_title_bn }}</td>
                                <td>{{ $iteam->slug }}</td>
                                <td class="d-flex">
                                  <a href="{{ route('page.edit',$iteam->id) }}" class="btn btn-outline-warning">Edit</a>

                                  <form action="{{ route('page.destroy',$iteam->id) }}" method="post">
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
                            <th>Page Title English</th>
                            <th>Page Title Bangla</th>
                            <th>Page Slug</th>
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
      @include('admin.page.create')





@endsection
