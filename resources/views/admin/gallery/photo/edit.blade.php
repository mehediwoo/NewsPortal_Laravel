@extends('admin.layout.app')
@section('title','Edit Gallery Photos')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Gallery Photos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Gallery Photos</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <form action="{{ route('photo.update',$edit->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Title english</label>
                                <input type="text" name="title_en" class="form-control @error('title_en') is-invalid @enderror" value="{{ $edit->title_en }}">
                                @error('title_en')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Title bangla</label>
                                <input type="text" name="title_bn" class="form-control @error('title_bn') is-invalid @enderror" value="{{ $edit->title_bn }}">
                                @error('title_bn')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="input-group mt-3">
                                <div class="custom-file">
                                  <input type="file" name="photo" class="custom-file-input @error('photo') is-invalid @enderror" id="exampleInputFile">
                                  <label class="custom-file-label" for="exampleInputFile">Choose Photo</label>
                                </div>
                            </div>
                            @error('photo')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <div class="form-group mt-3">
                                <label for="">Select Photo Type </label>
                                <select name="type" class="form-control">
                                    @if ($edit->type == '1')
                                    <option value="0">Choose Thumbnail Size</option>
                                    <option value="1" selected>Big Thumbnail</option>
                                    <option value="0">Small Thumbnail</option>
                                    @else
                                    <option value="0">Choose Thumbnail Size</option>
                                    <option value="1">Big Thumbnail</option>
                                    <option value="0" selected>Small Thumbnail</option>
                                    @endif
                                </select>
                                @error('type')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <input type="submit" value="Update" class="btn btn-outline-info">
                        </form>
                    </div>
                </div>
            </div>
            <div class="cal-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/'.$edit->photo) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title text-center">Previous uploaded photo</h5>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection

