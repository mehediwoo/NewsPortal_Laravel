@extends('user.layout.app')
@section('title','সারাদেশ | '.$site_title->website_title)
@section('content')
<section class="single_section">
    <div class="container-fluid">
         <div class="row">
            @if (!empty($all_country))
            @foreach ($all_country as $iteam)
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

               {{ $all_country->links() }}

            </div>
        </div>
        <!-- /.options -->
    </div>
</section>
@endsection
