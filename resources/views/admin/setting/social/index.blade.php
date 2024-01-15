@extends('admin.layout.app')
@section('title','Admin | Social Media')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Social Media</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Social</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-8 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h2>Social Media Link</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('social.update',$data->id) }}" method="post">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="">Facebook</label>
                            <input type="text" name="facebook" value="{{ $data->facebook }}" class="form-control @error('facebook') is-invalid @enderror">
                            @error('facebook')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Twitter</label>
                            <input type="text" name="twitter" value="{{ $data->twitter }}" class="form-control @error('twitter') is-invalid @enderror">
                            @error('twitter')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Linked In</label>
                            <input type="text" name="linkedin" value="{{ $data->linkdin }}" class="form-control @error('linkedin') is-invalid @enderror">
                            @error('linkedin')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Instagram</label>
                            <input type="text" name="instagram" value="{{ $data->instagram }}" class="form-control @error('instagram') is-invalid @enderror">
                            @error('instagram')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Youtube</label>
                            <input type="text" name="youtube" value="{{ $data->youtube }}" class="form-control @error('youtube') is-invalid @enderror">
                            @error('youtube')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" value="Save" class="btn btn-info">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
      </div>
    </div>
  </section>



@endsection
