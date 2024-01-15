@php
function bng_date($str)
    {
     $en = array(1,2,3,4,5,6,7,8,9,0);
    $bn = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
    $str = str_replace($en, $bn, $str);
    $en = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
    $en_short = array( 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' );
    $bn = array( 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর' );
    $str = str_replace( $en, $bn, $str );
    $str = str_replace( $en_short, $bn, $str );
    $en = array('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
    $en_short = array('Sat','Sun','Mon','Tue','Wed','Thu','Fri');
    $bn_short = array('শনি', 'রবি','সোম','মঙ্গল','বুধ','বৃহঃ','শুক্র');
    $bn = array('শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
    $str = str_replace( $en, $bn, $str );
    $str = str_replace( $en_short, $bn_short, $str );
    $en = array( 'am', 'pm' );
    $bn = array( 'পূর্বাহ্ন', 'অপরাহ্ন' );
    $str = str_replace( $en, $bn, $str );
    $str = str_replace( $en_short, $bn_short, $str );
    $en = array( '১২', '২৪' );
    $bn = array( '৬', '১২' );
    $str = str_replace( $en, $bn, $str );
     return $str;
    }
@endphp
@extends('user.layout.app')
@section('title',$post->title_bn)
@section('meta')
  <meta property="og:url" content="{{Request::fullUrl()}}" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="{{ $post->title_bn }}" />
  <meta property="og:description" content="{{ $post->desc_bn }}" />
  <meta property="og:image" content="{{URL::to($post->image)}}" />
@endsection
@section('content')
<section class="single-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                   <li><a href="{{ route('home') }}"><i class="fa fa-home"></i></a></li>
                   @if (session()->get('lan')=='english')
                    <li><a href="{{ route('category.news',$post->category->id) }}">{{ $post->category->category_en }}</a></li>
                    <li><a href="#">
                        @if($post->subcate_id=='')
                        @else
                        {{ $post->subcategory->subCategory_en }}
                        @endif
                    </a></li>
                   @else
                    <li><a href="{{ route('category.news',$post->category->id) }}">{{ $post->category->category_bn }}</a></li>
                    <li><a href="#">
                        @if($post->subcate_id=='')
                        @else
                        {{ $post->subcategory->subCategory_bn }}
                        @endif
                    </a></li>
                   @endif
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <header class="headline-header margin-bottom-10">
                    @if (session()->get('lan')=='english')
                        <h1 class="headline">{{ $post->title_en }}</h1>
                    @else
                        <h1 class="headline">{{ $post->title_bn }}</h1>
                    @endif
                </header>


             <div class="article-info margin-bottom-20">
              <div class="row">
                    <div class="col-md-6 col-sm-6">
                     <ul class="list-inline">
                        @if (session()->get('lan')=='english')
                        <li><i class="fa fa-clock-o"></i> {{ date('d M Y,l, h:i:s a') }}</li>
                        @else
                        <li><i class="fa fa-clock-o"></i> {{ bng_date(date('d M Y,l, h:i:s a')) }}</li>
                        @endif
                     </ul>

                    </div>
                    {{-- <div class="col-md-6 col-sm-6 pull-right">
                        <ul class="social-nav">
                            <li><a href="" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('#'),'facebook-share-dialog','width=626,height=436'); return false;" target="_blank" title="Facebook" rel="nofollow" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a target="_blank" href="" onclick="javascript:window.open('https://twitter.com/share?text=‘#'); return false;" title="Twitter" rel="nofollow" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a target="_blank" href="" onclick="window.open('https://plus.google.com/share?url=#'); return false;" title="Google plus" rel="nofollow" class="google"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" target="_blank" title="Print" rel="nofollow" class="print"><i class="fa fa-print"></i></a></li>

                        </ul>
                    </div> --}}
                </div>
             </div>
        </div>
      </div>
      <!-- ******** -->
      <div class="row">
        <div class="col-md-8 col-sm-8">
            <div class="single-news">
                <img src="{{ asset('storage/'.$post->image) }}" alt="" />
                @if (session()->get('lan')=='english')
                <h4 class="caption" style='margin:10px 0px'>{{ $post->title_en }} </h4>
                <div class="sharethis-inline-share-buttons"></div>
                <p>{!! $post->desc_en !!}</p>
                @else
                <h4 class="caption" style='margin:10px 0px'>{{ $post->title_bn }} </h4>
                <div class="sharethis-inline-share-buttons"></div>
                <p>{!! $post->desc_bn !!}</p>
                @endif
                <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="5"></div>
            </div>
            <!-- ********* -->
            <div class="row">
                @if (session()->get('lan')=='english')
                <div class="col-md-12"><h2 class="heading">Related News</h2></div>
                @else
                <div class="col-md-12"><h2 class="heading">আরো সংবাদ</h2></div>
                @endif



                    @if (!empty($related_post))
                    @foreach ($related_post as $iteam)
                    <div class="col-md-4 col-sm-4" style="margin-top:20px">
                        <div class="top-news sng-border-btm">
                            <a href="{{ route('view.post',$iteam->id) }}"><img src="{{ asset('storage/'.$iteam->image) }}" alt="Notebook"></a>
                            @if (session()->get('lan')=='english')
                            <h4 class="heading-02"><a href="{{ route('view.post',$iteam->id) }}">{{ mb_strimwidth($iteam->title_en,0,35).'...' }}</a> </h4>
                            @else
                            <h4 class="heading-02"><a href="{{ route('view.post',$iteam->id) }}">{{ mb_strimwidth($iteam->title_bn,0,35).'...' }}</a> </h4>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    @endif


            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add"><img src="{{ asset('user/assets/img/add_01.jpg') }}" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->
            <div class="tab-header">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    @if (session()->get('lan')=='english')
                    <li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">Latest</a></li>
                    <li role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">Popular</a></li>
                    @else
                    <li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">সর্বশেষ</a></li>
                    <li role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">জনপ্রিয়</a></li>
                    @endif
                </ul>

                <!-- Tab panes -->
                <div class="tab-content ">
                    <div role="tabpanel" class="tab-pane in active" id="tab21">
                        <div class="news-titletab">
                            @if (!empty($latest_news))
                            @foreach ($latest_news as $iteam)
                            @if (session()->get('lan')=='english')
                            <div class="news-title-02">
                                <h4 class="heading-03"><a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_en }}</a> </h4>
                            </div>
                            @else
                            <div class="news-title-02">
                                <h4 class="heading-03"><a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_bn }}</a> </h4>
                            </div>
                            @endif
                            @endforeach
                            @endif

                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab22">
                        <div class="news-titletab">
                            @if (!empty($popular_news))
                            @foreach ($popular_news as $iteam)
                            @if (session()->get('lan')=='english')
                            <div class="news-title-02">
                                <h4 class="heading-03"><a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_en }}</a> </h4>
                            </div>
                            @else
                            <div class="news-title-02">
                                <h4 class="heading-03"><a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_bn }}</a> </h4>
                            </div>
                            @endif
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add"><img src="{{ asset('user/assets/img/add_01.jpg') }}" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->
        </div>
      </div>
    </div>
</section>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v16.0" nonce="N5fUtRGq"></script>
@endsection
