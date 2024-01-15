@extends('admin.layout.app')
@section('title','Admin | Distric')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Distric</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Distric</li>
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
                  <h3 class="card-title">All Distric</h3>
                  <button style="float:right" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                    Add Distric
                  </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Districs Bangla</th>
                      <th>Districs English</th>
                      <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @if (!empty($distric) && $distric->count() > 0)
                            @foreach ($distric as $key => $iteam)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $iteam->distric_bn }}</td>
                                <td>{{ $iteam->distric_en }}</td>
                                <td class="d-flex">
                                  <a href="{{ route('districs.edit',$iteam->id) }}" class="btn btn-outline-warning">Edit</a>

                                  <form action="{{ route('districs.destroy',$iteam->id) }}" method="post">
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
                            <th>Category Bangla</th>
                            <th>Category English</th>
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
      @include('admin.distric.create')





@endsection
