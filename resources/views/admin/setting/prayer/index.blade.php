@extends('admin.layout.app')
@section('title','Admin |  Prayer')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Prayer Time</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Prayer Time</li>
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
                    <h2>Prayer</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('namaz.update',$namaz->id) }}" method="post">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="">Fazar</label>
                            <input type="text" name="fazar" value="{{ $namaz->fazar }}" class="form-control @error('fazar') is-invalid @enderror">
                            @error('fazar')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Zohor</label>
                            <input type="text" name="johor" value="{{ $namaz->johor }}" class="form-control @error('johor') is-invalid @enderror">
                            @error('johor')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Asor</label>
                            <input type="text" name="asor" value="{{ $namaz->asor }}" class="form-control @error('asor') is-invalid @enderror">
                            @error('asor')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Magrib</label>
                            <input type="text" name="magrib" value="{{ $namaz->magrib }}" class="form-control @error('magrib') is-invalid @enderror">
                            @error('magrib')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Esa</label>
                            <input type="text" name="esa" value="{{ $namaz->esa }}" class="form-control @error('esa') is-invalid @enderror">
                            @error('esa')
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
