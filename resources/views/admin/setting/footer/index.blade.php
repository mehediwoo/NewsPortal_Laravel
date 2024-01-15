@extends('admin.layout.app')
@section('title','Admin | Footer')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Footer</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Footer</li>
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
                    <h2>Website Footer</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('footer.store',$data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="">Website name</label>
                            <input type="text" name="site_name" value="{{ $data->website_title }}" class="form-control @error('telephone') is-invalid @enderror">
                            @error('site_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="input-group mt-3">
                            <div class="custom-file">
                              <input type="file" name="logo" class="custom-file-input " id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Choose website logo</label>
                            </div>
                        </div>
                        @error('logo')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="form-group mt-3">
                            <label for="">Address English</label>
                            <textarea name="address_en" class="form-control" cols="30" rows="5">{{ $data->address_en }}</textarea>
                            @error('address_en')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Address Bangla</label>
                            <textarea name="address_bn" class="form-control" cols="30" rows="5">{{ $data->address_bn }}</textarea>
                            @error('address_bn')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Phone</label>
                            <input type="text" name="phone" value="{{ $data->phone }}" class="form-control @error('phone') is-invalid @enderror">
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Telephone</label>
                            <input type="text" name="telephone" value="{{ $data->telephone }}" class="form-control @error('telephone') is-invalid @enderror">
                            @error('telephone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Email</label>
                            <input type="text" name="email" value="{{ $data->email }}" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
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
        <div class="col-lg-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('storage/'.$data->website_logo) }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title text-center">Website Logo</h5>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection
