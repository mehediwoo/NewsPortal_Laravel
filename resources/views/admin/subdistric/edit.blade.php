@extends('admin.layout.app')
@section('title','Edit Sub Sub Districs')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Sub Sub Districs</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Sub Sub Districs</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form action="{{ route('sub-districs.update',$edit->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Category english</label>
                    <input type="text" name="subdistrics_en" value="{{ $edit->subDis_en }}" class="form-control @error('subdistrics_en') is-invalid @enderror" required>
                    @error('subdistrics_en')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Category bangla</label>
                    <input type="text" name="subdistrics_bn" value="{{ $edit->subDis_bn }}" class="form-control @error('subdistrics_bn') is-invalid @enderror" required>
                    @error('subdistrics_bn')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>

                <div class="form-group">
                    <label for="">Parent Category</label>
                    <select name="parentDistrics" class="form-control"  >
                        @if (!empty($parent) && $parent->count()>0)
                        @foreach ($parent as $iteam)
                        @if ($iteam->id == $edit->distric_id)
                        <option value="{{ $iteam->id }}" selected>{{ $iteam->distric_en }}</option>
                        @else
                        <option value="{{ $iteam->id }}">{{ $iteam->distric_en }}</option>
                        @endif

                        @endforeach
                        @endif
                    </select>
                    @error('parentDistrics')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <input type="submit" value="Update" class="btn btn-outline-info">
            </form>
        </div>
    </div>
@endsection

