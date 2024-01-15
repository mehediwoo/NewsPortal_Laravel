@extends('admin.layout.app')
@section('title','Edit Sub Category')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Sub Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Sub Category</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form action="{{ route('sub-category.update',$edit->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Category english</label>
                    <input type="text" name="subcategory_en" value="{{ $edit->subCategory_en }}" class="form-control @error('subcategory_en') is-invalid @enderror" required>
                    @error('subcategory_en')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Category bangla</label>
                    <input type="text" name="subcategory_bn" value="{{ $edit->subCategory_bn }}" class="form-control @error('subcategory_bn') is-invalid @enderror" required>
                    @error('subcategory_bn')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>

                <div class="form-group">
                    <label for="">Parent Category</label>
                    <select name="parentCategory" class="form-control" required>
                        @if (!empty($category) && $category->count()>0)
                        @foreach ($category as $category)
                        @if ($category->id == $edit->cate_id)
                        <option value="{{ $category->id }}" selected>{{ $category->category_en }}</option>
                        @else
                        <option value="{{ $category->id }}">{{ $category->category_en }}</option>
                        @endif

                        @endforeach
                        @endif
                    </select>
                    @error('parentCategory')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <input type="submit" value="Update" class="btn btn-outline-info">
            </form>
        </div>
    </div>
@endsection

