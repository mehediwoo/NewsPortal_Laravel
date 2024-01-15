@extends('admin.layout.app')
@section('title','Admin | Facebook Page')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Facebook Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Facebook Page</li>
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
                    <h2 class="card-title">Facebook Page</h2>
                    @if (!empty($page) && $page->status=='0')
                    <a style="float:right" href="{{ route('page.status',$page->id) }}" class="btn btn-success">Active</a>
                    @else
                    <a style="float:right" href="{{ route('page.status',$page->id) }}" class="btn btn-danger">Deactive</a>
                    @endif

                </div>
                <div class="card-body">
                    <form action="{{ route('page.update',$page->id) }}" method="post">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="">Page Title</label>
                            <input type="text" name="page_title" class="form-control" value="{{ $page->page_title }}">
                            @error('livetv')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Facebook Page URL</label>
                            <textarea name="page_url" cols="30" rows="5" class="form-control">{{ $page->page_url }}</textarea>
                            @error('page_url')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        @if ($page->status==0)
                        <p class="text-danger">Page widgets is Deactivated</p>
                        @else
                        <p class="text-success">Page widgets is Activate</p>
                        @endif




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
