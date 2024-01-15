@extends('admin.layout.app')
@section('title','Admin | Live TV')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Live TV</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Live TV</li>
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
                    <h2 class="card-title">Live TV</h2>
                    @if ($tv->status=='0')
                    <a style="float:right" href="{{ route('tvstatus',$tv->id) }}" class="btn btn-success">Active</a>
                    @else
                    <a style="float:right" href="{{ route('tvstatus',$tv->id) }}" class="btn btn-danger">Deactive</a
                    @endif

                </div>
                <div class="card-body">
                    <form action="{{ route('tv.update',$tv->id) }}" method="post">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="">Live TV Embed Code</label>
                            <textarea name="livetv" cols="30" rows="5" class="form-control">{{ $tv->embed_code }}</textarea>
                            @error('livetv')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        @if ($tv->status=='0')
                        <p class="text-danger">Live TV is Deactivated</p>
                        @else
                        <p class="text-success">Live TV is Activate</p>
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
