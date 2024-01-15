@extends('admin.layout.app')
@section('title','Edit Video Gallery')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Video Gallery</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Video Gallery</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <form action="{{ route('video.update',$edit->id) }}" method="post">
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

                            <div class="class-form-group">
                                <label for="">Video URL</label>
                                <textarea name="Vide_url" class="form-control @error('Vide_url') is-invalid @enderror" rows="3">{{ $edit->embed_code }}</textarea>
                            </div>
                            @error('Vide_url')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <div class="form-group mt-3">
                                <label for="">Select Video Type </label>
                                <select name="type" class="form-control">
                                    <option value="0">Choose Video Size</option>
                                    @if ($edit->type == '0')
                                    <option value="1">Big Video</option>
                                    <option value="0" selected>Small Video</option>
                                    @elseif ($edit->type =='1')
                                    <option value="1" selected>Big Video</option>
                                    <option value="0">Small Video</option>
                                    @endif
                                </select>
                                @error('type')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="modal-footer justify-content-between">
                                <input type="submit" value="save" class="btn btn-info">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

