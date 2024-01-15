@extends('admin.layout.app')
@section('title','Admin | Notice')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Notice</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Notice</li>
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
                    <h2 class="card-title">Notice</h2>
                    @if (!empty($notice) && $notice->status=='0')
                    <a style="float:right" href="{{ route('noticestatus',$notice->id) }}" class="btn btn-success">Active</a>
                    @elseif(!empty($notice))
                    <a style="float:right" href="{{ route('noticestatus',$notice->id) }}" class="btn btn-danger">Deactive</a>
                    @endif

                </div>
                <div class="card-body">
                    <form action="{{ route('notice.update',$notice->id) }}" method="post">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="">Notice English</label>
                            <textarea name="notice_en" cols="30" rows="5" class="form-control">{{ $notice->notice_en }}</textarea>
                            @error('notice_en')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Notice Bangla</label>
                            <textarea name="notice_bn" cols="30" rows="5" class="form-control">{{ $notice->notice_bn }}</textarea>
                            @error('notice_bn')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        @if ($notice->status=='0')
                        <p class="text-danger">Notice Deactivated</p>
                        @else
                        <p class="text-success">Notice Activate</p>
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
