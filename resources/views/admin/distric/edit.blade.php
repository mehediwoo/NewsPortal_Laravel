@extends('admin.layout.app')
@section('title','Edit Distric')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Distric</h1>
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

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form action="{{ route('districs.update',$edit->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Distric English</label>
                    <input type="text" name="distric_en" value="{{ $edit->distric_en }}" class="form-control @error('distric_en') is-invalid @enderror">
                    @error('distric_en')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Distric Bangla</label>
                    <input type="text" name="distric_bn" value="{{ $edit->distric_bn }}" class="form-control @error('distric_bn') is-invalid @enderror">
                    @error('distric_bn')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>


                <input type="submit" value="Update" class="btn btn-outline-info">
            </form>
        </div>
    </div>
@endsection

