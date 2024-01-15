@extends('admin.layout.app')
@section('title','Google Ads')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Google Ads</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Google Ads</li>
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
                  <h3 class="card-title">All Adds Listings</h3>
                  <button style="float:right" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                    Create Ads
                  </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Title</th>
                      <th>Type</th>
                      <th>Action(s)</th>
                    </tr>
                    </thead>

                    <tbody>
                        @if (!empty($ads) && $ads->count() > 0)
                            @foreach ($ads as $key => $ads)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $ads->title }}</td>
                                <td>
                                    @if ($ads->type=='verticale')
                                    <span class="badge badge-dark">Verticale Ads</span>
                                    @else
                                    <span class="badge badge-info">Squire Ads</span>
                                    @endif

                                </td>
                                <td class="d-flex">
                                  <a href="{{ route('category.edit',$ads->id) }}" class="btn btn-outline-warning">Edit</a>

                                  <form action="{{ route('category.destroy',$ads->id) }}" method="post">
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
      @include('admin.setting.google_ads.create')





@endsection
