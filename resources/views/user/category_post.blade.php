@extends('user.layout.app')
@section('title',$cate_name->category_bn.' | '.$site_title->website_title)
@section('content')
<section class="single_section">
    <div class="container-fluid">
         <div class="row">
            @if (!empty($category_news))
            @foreach ($category_news as $iteam)
            <div class="col-md-4 col-sm-4" style="padding: 35px 10px">
                <div class="photo">
                    <a href="{{ route('view.post',$iteam->id) }}"><img src="{{ asset('storage/'.$iteam->image) }}" alt=""/></a>
                    @if (session()->get('lan')=='english')
                    <div class="photo_title" style="margin-bottom: 20px"> <a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_en }}</a> </div>
                    @else
                    <div class="photo_title" style="margin-bottom: 20px"> <a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_bn }}</a> </div>
                    @endif
                </div>
            </div>
            @endforeach
            @endif

        </div>
        <div class="row">
             <div class="col-md-12 options" style="margin-top:20px">

               {{ $category_news->links() }}

            </div>
        </div>
        <!-- /.options -->
    </div>
</section>
@endsection
