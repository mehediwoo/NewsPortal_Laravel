@extends('user.layout.app')
@section('title',$cate_subcat->subCategory_bn.' | '.$site_title->website_title)
@section('content')
<section class="single_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                   <li><a href="{{ route('home') }}"><i class="fa fa-home"></i></a></li>
                   @if (session()->get('lan')=='english')
                    {{-- <li><a href="{{ route('category.news',$cate_subcat->category->id) }}">{{ $cate_subcat->category->category_en }}</a></li> --}}
                    <li><a href="#">{{ $cate_subcat->subCategory_en }}</a></li>
                   @else
                    {{-- <li><a href="{{ route('category.news',$cate_subcat->category->id) }}">{{ $cate_subcat->category->category_bn }}</a></li> --}}
                    <li><a href="#">{{ $cate_subcat->subCategory_bn }}</a></li>
                   @endif
                </ol>
            </div>
        </div>
        <div class="row">
            @foreach ($post as $iteam)
            <div class="col-md-4 col-sm-4" style="padding: 20px 10px; margin-top:80px">
                <div class="photo">
                    <a href="{{ route('view.post',$iteam->id) }}"><img src="{{ asset('storage/'.$iteam->image) }}" alt="" /></a>
                    @if (session()->get('lan')=='english')
                    <div class="photo_title mt-3"> <a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_en }}</a> </div>
                    @else
                    <div class="photo_title mt-3"> <a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_bn }}</a> </div>
                    @endif
                </div>
            </div>
            @endforeach

        </div>
        {{ $post->links() }}
        <div class="row">
            <div class="col-md-12" style="margin-top:80px"></div>
             <div class="col-md-12 options">

                <!-- pagination here -->

            </div>
        </div>
        <!-- /.options -->
    </div>
</section>
@endsection
