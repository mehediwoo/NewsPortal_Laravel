@extends('admin.layout.app')
@section('title','Edit Category')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form action="{{ route('category.update',$edit->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Category english</label>
                    <input type="text" name="category_en" value="{{ $edit->category_en }}" class="form-control @error('category_en') is-invalid @enderror">
                    @error('category_en')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Category bangla</label>
                    <input type="text" name="category_bn" value="{{ $edit->category_bn }}" class="form-control @error('category_bn') is-invalid @enderror">
                    @error('category_bn')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>


                <input type="submit" value="Update" class="btn btn-outline-info">
            </form>
        </div>
    </div>
@endsection

