@extends('user.layout.app')
@section('title','Video Gallery | '.$site_title->website_title)
@section('content')
<section class="single_section">
    <div class="container-fluid">
         <div class="row">
            @if (!empty($video))
            @foreach ($video as $iteam)
            <div class="col-md-4 col-sm-4" style="margin-top:30px">
                <div class="photo">
                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                        <iframe width="729" height="410" src="https://www.youtube.com/embed/{{ $iteam->embed_code }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    @if(session()->get('eng')=='english')
                    <div class="photo_title" style="padding:5px 10px">{{ $iteam->title_en }}</div>
                    @else
                    <div class="photo_title" style="padding:5px 10px">{{ $iteam->title_bn }}</div>
                    @endif
                </div>
            </div>
            @endforeach
            @endif
        </div>

        <div class="row">
             <div class="col-md-12 options">

                <!-- pagination Here -->


            </div>
        </div>
        <!-- /.options -->



    </div>
</section>
@endsection
