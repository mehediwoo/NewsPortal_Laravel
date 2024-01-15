@extends('admin.layout.app')
@section('title','Admin | '.$edit->slug)
@section('content')


<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">{{ $edit->slug }}</li>
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
              <h3 class="card-title">Edit {{ $edit->slug }}</h3>
              <button style="float:right" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                Add Page
              </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('pageUpdates',$edit->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Page title english</label>
                        <input type="text" name="page_title_en" class="form-control @error('page_title_en') is-invalid @enderror" value="{{ $edit->page_title_en }}" required>
                        @error('page_title_en')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Page title bangla</label>
                        <input type="text" name="page_title_bn" class="form-control @error('page_title_bn') is-invalid @enderror" value="{{ $edit->page_title_bn }}" required>
                        @error('page_title_bn')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Page Content english</label>
                        <textarea name="page_content_en" cols="30" rows="5" class="form-control" required>{{ $edit->page_content_en }}</textarea>
                        @error('page_content_en')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Page Content bangla</label>
                        <textarea name="page_content_bn" cols="30" rows="5" class="form-control" required>{{ $edit->page_content_en }}</textarea>
                        @error('page_content_bn')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-info">Update</button>
                </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>

@endsection
