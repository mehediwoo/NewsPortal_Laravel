@extends('admin.layout.app')
@section('title','Admin | Create Post')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
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
          <h1 class="m-0 text-dark">Create New Posts</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Create New Posts</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add New Posts</h3>
                    <a href="{{ route('post.index') }}" class="btn btn-info" style="float:right">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Title English</label>
                                <input type="text" name="title_en" value="{{ old('title_en') }}" class="form-control @error('title_en') is-invalid @enderror">
                                @error('title_en')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Title Bangla</label>
                                <input type="text" name="title_bn" value="{{ old('title_bn') }}" class="form-control @error('title_bn') is-invalid @enderror">
                                @error('title_bn')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Category</label>
                                <select name="category" class="form-control @error('category') is-invalid @enderror">
                                    <option value="">Choose Category</option>
                                    @if (!@empty($category) && $category->count() > 0)
                                    @foreach ($category as $iteam)
                                    <option value="{{ $iteam->id }}">{{ $iteam->category_bn }}</option>
                                    @endforeach
                                    @endif

                                </select>
                                @error('category')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Sub Category</label>
                                <select id="subCategory" name="SubCategory" class="form-control @error('SubCategory') is-invalid @enderror">
                                    <option value="">Choose Sub Category</option>
                                </select>
                                @error('SubCategory')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Districs</label>
                                <select name="Districs" class="form-control @error('Districs') is-invalid @enderror">
                                    <option value="">Choose Districs</option>
                                    @if (!empty($distric) && $distric->count() > 0)
                                    @foreach ($distric as $iteam)
                                        <option value="{{ $iteam->id }}">{{ $iteam->distric_bn }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @error('Districs')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Sub Districs</label>
                                <select id="subDist" name="SubDistrics" class="form-control @error('SubDistrics') is-invalid @enderror">
                                    <option value="">Choose Sub Districs</option>
                                </select>
                                @error('SubDistrics')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group mt-3">
                            <div class="custom-file">
                              <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Choose post image</label>
                            </div>

                        </div>
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="row">
                            <div class="form-group col-md-6 mt-3">
                                <label for="">Tags English</label>
                                <input id="tags" type="text" name="tags_en" value="{{ old('tags_en') }}" class="form-control @error('tags_en') is-invalid @enderror" data-role="tagsinput">
                                @error('tags_en')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 mt-3">
                                <label for="">Tags Bangla</label>
                                <input id="tags" type="text" name="tags_bn" value="{{ old('tags_bn') }}" class="form-control @error('tags_bn') is-invalid @enderror" data-role="tagsinput">
                                @error('tags_bn')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Post Description English</label>
                            <textarea name="description_en" class="textarea" placeholder="Place Description text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                        @error('description_en')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="form-group mt-3">
                            <label for="">Post Description Bangla</label>
                            <textarea name="description_bn" class="textarea" placeholder="Place Description text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                        @error('description_bn')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <hr>
                        <u style="font-weight: 700">Extra Options</u>

                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <input type="checkbox" name="headline" id="">
                                    <label for="">Headline</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="firstSection" id="">
                                    <label for="">First Section</label>
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <input type="checkbox" name="firstSectionThumb" id="">
                                    <label for="">First Section Thumbnail</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="firstSectionBigThumb" id="">
                                    <label for="">Big Thumbnail</label>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-info mt-3">Save</button>

                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>



@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function() {
          $('select[name="category"]').on('change', function(){
              var category = $(this).val();
              if(category) {
                $.ajax({
                    url: "{{ url('admin/get/subcategory') }}/"+category,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        $("#subCategory").empty();
                        $.each(data,function(key,value){
                            $("#subCategory").append('<option value="'+value.id+'">'+value.subCategory_bn+'</option>');
                        });
                    },

                });
              }else {
                alert('Parent Category not found!');
              }
          });
      });
 </script>

 <script>
    $(document).ready(function(){
        $("select[name='Districs']").on('change',function(){
            var dis_id = $(this).val();
            if(dis_id){
                $.ajax({
                    url : "{{ url('admin/get/districs') }}/"+dis_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data){
                        $('#subDist').empty();
                        $.each(data,function(key,value){
                            $('#subDist').append('<option value='+value.id+'>'+value.subDis_bn+'</option>')
                        });
                    }
                });
            }else{
                alert('Distric not found!');
            }
        });
    });
 </script>
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

@endsection
