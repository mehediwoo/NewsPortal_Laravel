@extends('admin.layout.app')
@section('title','Admin |  SEO')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>

<style>
    .bootstrap-tagsinput .tag {
      margin-right: 2px;
      color: white !important;
      background-color: #0d6efd;
      padding: 0.2rem;
    }

</style>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">SEO</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">SEO</li>
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
                    <h2>Site SEO</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('seo.update',$seo->id) }}" method="post">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="">Meta Author</label>
                            <input type="text" name="meta_author" value="{{ $seo->meta_author }}" class="form-control @error('meta_author') is-invalid @enderror">
                            @error('meta_author')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Meta Title</label>
                            <input type="text" name="meta_title" value="{{ $seo->meta_title }}" class="form-control @error('meta_title') is-invalid @enderror">
                            @error('meta_title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Meta Keyword</label>
                            <input id="tags" type="text" name="meta_keyword" value="{{ $seo->meta_keyword }}" data-role="tagsinput" class="form-control @error('meta_keyword') is-invalid @enderror">
                            @error('meta_keyword')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Meta Description</label>
                            <input type="text" name="meta_description" value="{{ $seo->meta_description }}" class="form-control @error('meta_description') is-invalid @enderror">
                            @error('meta_description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Google Analytics</label>
                            <input type="text" name="google_analytics" value="{{ $seo->google_analytics }}" class="form-control @error('google_analytics') is-invalid @enderror">
                            @error('google_analytics')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Google Verification</label>
                            <input type="text" name="google_verification" value="{{ $seo->google_verification }}" class="form-control @error('google_verification') is-invalid @enderror">
                            @error('google_verification')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Alexa Analytics</label>
                            <input type="text" name="alexa_analytics" value="{{ $seo->alexa_analytics }}" class="form-control @error('alexa_analyticsn') is-invalid @enderror">
                            @error('alexa_analytics')
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
