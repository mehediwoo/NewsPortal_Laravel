
@extends('user.layout.app')
@section('title','Home | '.$site_title->website_title)
@section('content')

<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-md-1 col-sm-1 col-lg-1"></div>
                    <div class="col-md-10 col-sm-10">
                        @if (!empty($first_section_big))
                        <div class="lead-news">
                            <div class="service-img"><a href="{{ route('view.post',$first_section_big->id) }}"><img src="{{ asset('storage/'.$first_section_big->image) }}" alt="Notebook"></a></div>
                            <div class="content">
                                @if (session()->get('lan')=='english')
                                <h4 class="lead-heading-01"><a href="{{ route('view.post',$first_section_big->id) }}">{{ $first_section_big->title_en }}</a> </h4>
                                @else
                                <h4 class="lead-heading-01"><a href="{{ route('view.post',$first_section_big->id) }}">{{ $first_section_big->title_bn }}</a> </h4>
                                @endif

                            </div>
                        </div>
                        @endif
                    </div>

                </div>
                <div class="row">
                    @if (!empty($first_section) && $first_section->count() > 0)
                        @foreach ($first_section as $first_section)
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="top-news">
                                <a href="{{ route('view.post',$first_section->id) }}"><img src="{{ asset('storage/'.$first_section->image) }}" alt="Notebook"></a>
                                @if (session()->get('lan')=='english')
                                <h4 class="heading-02"><a href="{{ route('view.post',$first_section->id) }}">{{ mb_strimWidth($first_section->title_en,0,26).'...' }}</a> </h4>
                                @else
                                <h4 class="heading-02"><a href="{{ route('view.post',$first_section->id) }}">{{ mb_strimWidth($first_section->title_bn,0,30).'...' }}</a> </h4>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>

                <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="add"><img src="{{ asset('user/assets/img/add.jpg') }}" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->

                <!-- news-start -->
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="bg-one">
                            <div class="cetagory-title">
                                @if (!empty($first_category) && $first_category->count() > 0)
                                    @if (session()->get('lan')=='english')
                                    <a href="{{ route('category.news',$first_category->id) }}">{{ $first_category->category_en }} <span>All <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a>
                                    @else
                                    <a href="{{ route('category.news',$first_category->id) }}">{{ $first_category->category_bn }} <span>আরও <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a>
                                    @endif
                                @endif
                            </div>
                            <div class="row">
                                @if (!empty($first_cate_big_thumb_post) && $first_cate_big_thumb_post->count() > 0)
                                <div class="col-md-6 col-sm-6">
                                    <div class="top-news">
                                        <a href="{{ route('view.post',$first_cate_big_thumb_post->id) }}"><img src="{{ asset('storage/'.$first_cate_big_thumb_post->image) }}" alt="Notebook"></a>
                                        @if (session()->get('lan')=='english')
                                        <h4 class="heading-02"><a href="{{ route('view.post',$first_cate_big_thumb_post->id) }}">{{ $first_cate_big_thumb_post->title_en }}</a> </h4>
                                        @else
                                        <h4 class="heading-02"><a href="{{ route('view.post',$first_cate_big_thumb_post->id) }}">{{ $first_cate_big_thumb_post->title_bn }}</a> </h4>
                                        @endif
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-6 col-sm-6">
                                    @if (!empty($first_cat_post) && $first_cat_post->count()>0)
                                    @foreach ($first_cat_post as $iteam)
                                    <div class="image-title">
                                        <a href="{{ route('view.post',$iteam->id) }}">
                                            <img src="{{ asset('storage/'.$iteam->image) }}" alt="Notebook">
                                        </a>
                                        @if (session()->get('lan')=='english')
                                        <h4 class="heading-03"><a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_en }}</a> </h4>
                                        @else
                                        <h4 class="heading-03"><a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_bn }}</a> </h4>
                                        @endif
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="bg-one">
                            @if (!empty($second_category))
                                @if(session()->get('lan')=='english')
                                <div class="cetagory-title"><a href="{{ route('category.news',$second_category->id) }}">{{ $second_category->category_en }} <span>All <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
                                @else
                                <div class="cetagory-title"><a href="{{ route('category.news',$second_category->id) }}">{{ $second_category->category_bn }} <span>আরও <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
                                @endif
                            @endif
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    @if (!empty($second_cate_big_thumb_post))
                                    <div class="top-news">
                                        <a href="{{ route('view.post',$second_cate_big_thumb_post->id) }}"><img src="{{ asset('storage/'.$second_cate_big_thumb_post->image) }}" alt="Notebook"></a>
                                        @if (session()->get('lan')=='english')
                                        <h4 class="heading-02"><a href="{{ route('view.post',$second_cate_big_thumb_post->id) }}">{{ $second_cate_big_thumb_post->title_en }}</a> </h4>
                                        @else
                                        <h4 class="heading-02"><a href="{{ route('view.post',$second_cate_big_thumb_post->id) }}">{{ $second_cate_big_thumb_post->title_bn }}</a> </h4>
                                        @endif
                                    </div>
                                    @endif
                                </div>
                                @if (!empty($second_cat_post))
                                @foreach ($second_cat_post as $iteam)
                                <div class="col-md-6 col-sm-6">
                                    <div class="image-title">
                                        <a href="{{ route('view.post',$iteam->id) }}"><img src="{{ asset('storage/'.$iteam->image) }}" alt="Notebook"></a>
                                        @if (session()->get('lan')=='english')
                                        <h4 class="heading-03"><a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_en }}</a> </h4>
                                        @else
                                        <h4 class="heading-03"><a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_bn }}</a> </h4>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add"><img src="{{ asset('user/assets/img/add_01.jpg') }}" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->

                <!-- youtube-live-start -->
                @if (!empty($live_tv) && $live_tv->status=='1')
                    @if (session()->get('lan')=='english')
                        <div class="cetagory-title-03">Live Tv </div>
                        <div class="photo">
                            <div class="embed-responsive embed-responsive-16by9 embed-responsive-item" style="margin-bottom:5px;">
                                {!! $live_tv->embed_code !!}
                            </div>
                        </div><!-- /.youtube-live-close -->
                    @else
                        <div class="cetagory-title-03">লাইভ টিভি </div>
                        <div class="photo">
                            <div class="embed-responsive embed-responsive-16by9 embed-responsive-item" style="margin-bottom:5px;">
                                {!! $live_tv->embed_code !!}
                            </div>
                        </div><!-- /.youtube-live-close -->
                    @endif
                @endif


                @if ($fbPage->status==1)
                <!-- facebook-page-start -->
                @if (session()->get('lan')=='english')
                    <div class="cetagory-title-03">Follow us on facebook</div>
                @else
                    <div class="cetagory-title-03">ফেসবুকে আমরা</div>
                @endif

                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous"
                src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v17.0"
                nonce="bHQXSpne"></script>
                {{-- Code snippet --}}
                <div class="fb-page"
                data-href="{{ $fbPage->page_url }}"
                data-tabs="timeline"
                data-width="315px" data-height=""
                data-small-header="true"
                data-adapt-container-width="false"
                data-hide-cover="false"
                data-show-facepile="true">
                <blockquote cite="{{ $fbPage->page_url }}"
                class="fb-xfbml-parse-ignore">
                <a href="{{ $fbPage->page_url }}">{{ $fbPage->page_title }}</a>
                </blockquote></div>
                @endif

                <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add">
                            <img src="{{ asset('user/assets/img/add_01.jpg') }}" alt="" />
                        </div>
                    </div>
                </div><!-- /.add-close -->
                {{-- <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add">
                            <img src="{{ asset('user/assets/img/add_01.jpg') }}" alt="" />
                        </div>
                    </div>
                </div><!-- /.add-close -->
                <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add">
                            <img src="{{ asset('user/assets/img/add_01.jpg') }}" style="height:200px" />
                        </div>
                    </div>
                </div><!-- /.add-close --> --}}
            </div>
        </div>
    </div>
</section><!-- /.1st-news-section-close -->

<!-- 2nd-news-section-start -->
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    <div class="cetagory-title-02">
                        @if (!empty($third_category))
                            @if (session()->get('lan')=='english')
                            <a href="{{ route('category.news',$third_category->id) }}">{{ $third_category->category_en }} <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All  </span></a>
                            @else
                            <a href="{{ route('category.news',$third_category->id) }}">{{ $third_category->category_bn }} <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> সব খবর  </span></a>
                            @endif
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            @if (!empty($third_cate_big_thumb_post))
                            <div class="top-news">
                                <a href="{{ route('view.post',$third_cate_big_thumb_post->id) }}"><img src="{{ asset('storage/'.$third_cate_big_thumb_post->image) }}" alt="Notebook"></a>
                                @if (session()->get('lan')=='english')
                                <h4 class="heading-02"><a href="{{ route('view.post',$third_cate_big_thumb_post->id) }}">{{ $third_cate_big_thumb_post->title_en }}</a> </h4>
                                @else
                                <h4 class="heading-02"><a href="{{ route('view.post',$third_cate_big_thumb_post->id) }}">{{ $third_cate_big_thumb_post->title_bn }}</a> </h4>
                                @endif
                            </div>
                            @endif

                        </div>
                        <div class="col-md-6 col-sm-6">
                            @if (!empty($third_cat_post))
                            @foreach ($third_cat_post as $iteam)
                            <div class="image-title">
                                <a href="{{ route('view.post',$iteam->id) }}"><img src="{{ asset('storage/'.$iteam->image) }}" alt="Notebook"></a>
                                @if (session()->get('lan')=='english')
                                <h4 class="heading-03"><a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_en }}</a> </h4>
                                @else
                                <h4 class="heading-03"><a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_bn }}</a> </h4>
                                @endif
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    @if (!empty($forth_category))
                        @if (session()->get('lan')=='english')
                        <div class="cetagory-title-02"><a href="{{ route('category.news',$forth_category->id) }}">{{ $forth_category->category_en }} <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All  </span></a></div>
                        @else
                        <div class="cetagory-title-02"><a href="{{ route('category.news',$forth_category->id) }}">{{ $forth_category->category_bn }} <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> সব খবর  </span></a></div>
                        @endif
                    @endif

                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                @if (!empty($forth_cate_big_thumb_post))
                                <a href="{{ route('view.post',$forth_cate_big_thumb_post->id) }}"><img src="{{ asset('storage/'.$forth_cate_big_thumb_post->image) }}" alt="Notebook"></a>
                                    @if (session()->get('lan')=='english')
                                    <h4 class="heading-02"><a href="{{ route('view.post',$forth_cate_big_thumb_post->id) }}">{{ $forth_cate_big_thumb_post->title_en }}</a> </h4>
                                    @else
                                    <h4 class="heading-02"><a href="{{ route('view.post',$forth_cate_big_thumb_post->id) }}">{{ $forth_cate_big_thumb_post->title_bn }}</a> </h4>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            @if (!empty($forth_cat_post) && $forth_cat_post->count() > 0)
                            @foreach ($forth_cat_post as $iteam)
                            <div class="image-title">
                                <a href="{{ route('view.post',$iteam->id) }}"><img src="{{ asset('storage/'.$iteam->image) }}" alt="Notebook"></a>
                                @if (session()->get('lan')=='english')
                                <h4 class="heading-03"><a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_en }}</a> </h4>
                                @else
                                <h4 class="heading-03"><a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_bn }}</a> </h4>
                                @endif
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ******* -->
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    @if (!empty($fifth_category))
                    @if (session()->get('lan')=='english')
                    <div class="cetagory-title-02"><a href="{{ route('category.news',$fifth_category->id) }}">{{ $fifth_category->category_en }} <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All  </span></a></div>
                    @else
                    <div class="cetagory-title-02"><a href="{{ route('category.news',$fifth_category->id) }}">{{ $fifth_category->category_bn }} <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> সব খবর  </span></a></div>
                    @endif
                    @endif
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            @if (!empty($fifth_cate_big_thumb_post))
                            <div class="top-news">
                                <a href="{{ route('view.post',$fifth_cate_big_thumb_post->id) }}"><img src="{{ asset('storage/'.$fifth_cate_big_thumb_post->image) }}" alt="Notebook"></a>
                                @if (session()->get('lan')=='english')
                                <h4 class="heading-02"><a href="{{ route('view.post',$fifth_cate_big_thumb_post->id) }}">{{ $fifth_cate_big_thumb_post->title_en }}</a> </h4>
                                @else
                                <h4 class="heading-02"><a href="{{ route('view.post',$fifth_cate_big_thumb_post->id) }}">{{ $fifth_cate_big_thumb_post->title_bn }}</a> </h4>
                                @endif
                            </div>
                            @endif
                        </div>
                        <div class="col-md-6 col-sm-6">
                            @if (!empty($fifth_cat_post))
                            @foreach ($fifth_cat_post as $iteam)
                            <div class="image-title">
                                <a href="{{ route('view.post',$iteam->id) }}"><img src="{{ asset('storage/'.$iteam->image) }}" alt="Notebook"></a>
                                @if (session()->get('lan')=='english')
                                <h4 class="heading-03"><a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_en }}</a> </h4>
                                @else
                                <h4 class="heading-03"><a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_bn }}</a> </h4>
                                @endif
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    @if (!empty($sixth_category))
                    @if (session()->get('lan')=='english')
                    <div class="cetagory-title-02"><a href="{{ route('category.news',$sixth_category->id) }}">{{ $sixth_category->category_en }} <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All  </span></a></div>
                    @else
                    <div class="cetagory-title-02"><a href="{{ route('category.news',$sixth_category->id) }}">{{ $sixth_category->category_bn }} <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> সব খবর  </span></a></div>
                    @endif
                    @endif
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            @if (!empty($sixth_cate_big_thumb_post))
                            <div class="top-news">
                                <a href="{{ route('view.post',$sixth_cate_big_thumb_post->id) }}"><img src="{{ asset('storage/'.$sixth_cate_big_thumb_post->image) }}" alt="Notebook"></a>
                                @if (session()->get('lan')=='english')
                                <h4 class="heading-02"><a href="{{ route('view.post',$sixth_cate_big_thumb_post->id) }}">{{ $sixth_cate_big_thumb_post->title_en }}</a> </h4>
                                @else
                                <h4 class="heading-02"><a href="{{ route('view.post',$sixth_cate_big_thumb_post->id) }}">{{ $sixth_cate_big_thumb_post->title_bn }}</a> </h4>
                                @endif
                            </div>
                            @endif
                        </div>
                        <div class="col-md-6 col-sm-6">
                            @if (!empty($sixth_cat_post))
                            @foreach ($sixth_cat_post as $iteam)
                            <div class="image-title">
                                <a href="{{ route('view.post',$iteam->id) }}"><img src="{{ asset('storage/'.$iteam->image) }}" alt="Notebook"></a>
                                @if (session()->get('lan')=='english')
                                <h4 class="heading-03"><a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_en }}</a> </h4>
                                @else
                                <h4 class="heading-03"><a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_bn }}</a> </h4>
                                @endif
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- add-start -->
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="add"><img src="{{ asset('user/assets/img/add.jpg') }}" alt="" /></div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="add"><img src="{{ asset('user/assets/img/add.jpg') }}" alt="" /></div>
            </div>
        </div><!-- /.add-close -->

    </div>
</section><!-- /.2nd-news-section-close -->

<!-- 3rd-news-section-start -->
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-sm-9">
                @if (!empty($seventh_category))
                @if (session()->get('lan')=='english')
                <div class="cetagory-title-02"><a href="{{ route('category.news',$seventh_category->id) }}">{{ $seventh_category->category_en }}  <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All  </span></a></div>
                @else
                <div class="cetagory-title-02"><a href="{{ route('category.news',$seventh_category->id) }}">{{ $seventh_category->category_bn }}  <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> সব খবর  </span></a></div>
                @endif
                @endif


                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="top-news">
                            @if (!empty($seventh_cate_big_thumb_post))
                            <a href="{{ route('view.post',$seventh_cate_big_thumb_post) }}"><img src="{{ asset('storage/'.$seventh_cate_big_thumb_post->image) }}" alt="Notebook"></a>
                            @if (session()->get('lan')=='english')
                            <h4 class="heading-02"><a href="{{ route('view.post',$seventh_cate_big_thumb_post) }}">{{ $seventh_cate_big_thumb_post->title_en }}</a> </h4>
                            @else
                            <h4 class="heading-02"><a href="{{ route('view.post',$seventh_cate_big_thumb_post) }}">{{ $seventh_cate_big_thumb_post->title_bn }}</a> </h4>
                            @endif
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        @if (!empty($seventh_cat_post_first))
                        @foreach ($seventh_cat_post_first as $iteam)
                        <div class="image-title">
                            <a href="{{ route('view.post',$iteam->id) }}"><img src="{{ asset('storage/'.$iteam->image) }}" alt="Notebook"></a>
                            @if (session()->get('lan')=='english')
                            <h4 class="heading-02"><a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_en }}</a> </h4>
                            @else
                            <h4 class="heading-02"><a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_bn }}</a> </h4>
                            @endif
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="col-md-4 col-sm-4">
                        @if (!empty($seventh_cat_post_second))
                        @foreach ($seventh_cat_post_second as $iteam)
                        <div class="image-title">
                            <a href="{{ route('view.post',$iteam->id) }}"><img src="{{ asset('storage/'.$iteam->image) }}" alt="Notebook"></a>
                            @if (session()->get('lan')=='english')
                            <h4 class="heading-02"><a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_en }}</a> </h4>
                            @else
                            <h4 class="heading-02"><a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_bn }}</a> </h4>
                            @endif
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <!-- ******* -->
                <br />
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        @if (session()->get('lan')=='english')
                        <div class="cetagory-title-02"><a href="{{ route('country.news') }}">Country  <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> সব খবর  </span></a></div>
                        @else
                        <div class="cetagory-title-02"><a href="{{ route('country.news') }}">সারাদেশে  <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> সব খবর  </span></a></div>
                        @endif
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="bg-gray">
                            <div class="top-news">
                                <a href="{{ route('view.post',$country->id) }}"><img src="{{ asset('storage/'.$country->image) }}" alt="Notebook"></a>
                            @if (session()->get('lan')=='english')
                            <h4 class="heading-02"><a href="{{ route('view.post',$country->id) }}">{{ $country->title_en }}</a> </h4>
                            @else
                            <h4 class="heading-02"><a href="{{ route('view.post',$country->id) }}">{{ $country->title_bn }}</a> </h4>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        @if (!empty($country_first_section))
                        @foreach ($country_first_section as $iteam)
                        <div class="news-title">
                            @if (session()->get('lan')=='english')
                            <a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_en }}</a>
                            @else
                            <a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_bn }}</a>
                            @endif
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="col-md-4 col-sm-4">
                        @if (!empty($country_second_section))
                        @foreach ($country_second_section as $iteam)
                        <div class="news-title">
                            @if (session()->get('lan')=='english')
                            <a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_en }}</a>
                            @else
                            <a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_bn }}</a>
                            @endif
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add">
                            <img src="{{ asset('user/assets/img/top-ad.jpg') }}" alt="" />
                        </div>
                    </div>
                </div><!-- /.add-close -->


            </div>
            <div class="col-md-3 col-sm-3">
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
                                        @foreach($latest_news as $iteam)
                                        <div class="news-title-02">
                                            <h4 class="heading-03" style="margin-top:10px">
                                                @if (session()->get('lan')=='english')
                                                <a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_en }}</a>
                                                @else
                                                <a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_bn }}</a>
                                                @endif
                                            </h4>
                                        </div>
                                        @endforeach
                                    @endif
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab22">
                            <div class="news-titletab">
                                @if (!empty($popular_news))
                                    @foreach ($popular_news as $iteam)
                                    <div class="news-title-02">
                                        <h4 class="heading-03" style="margin-top:10px">
                                            @if (session()->get('lan')=='english')
                                            <a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_en }}</a>
                                            @else
                                            <a href="{{ route('view.post',$iteam->id) }}">{{ $iteam->title_bn }}</a>
                                            @endif
                                        </h4>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Namaj Times -->
                @if (session()->get('lan')=='english')
                <div class="cetagory-title-03">Prayer Time </div>
                <li style="list-style: none">Fazar: {{ $namaz->fazar }}</li>
                <li style="list-style: none">Johor: {{ $namaz->johor }}</li>
                <li style="list-style: none">Asor: {{ $namaz->asor }}</li>
                <li style="list-style: none">Magrib: {{ $namaz->magrib }}M</li>
                <li style="list-style: none">Esha: {{ $namaz->esa }}</li>
                @else
                <div class="cetagory-title-03">নামাজের সময়সূচি </div>
                <li style="list-style: none">ফজর: {{ $namaz->fazar }}</li>
                <li style="list-style: none">জোহোর: {{ $namaz->johor }}</li>
                <li style="list-style: none">আসোর: {{ $namaz->asor }}</li>
                <li style="list-style: none">মাগরিব: {{ $namaz->magrib }}</li>
                <li style="list-style: none">এশা: {{ $namaz->esa }}</li>
                @endif
                <!-- Namaj Times -->

                @if (session()->get('lan')=='english')
                <div class="cetagory-title-03">Archiv News</div>
                <form action="{{ route('search') }}" method="get">
                    <div class="old-news-date">
                       <input type="date" name="from" placeholder="From Date" required="">
                       <input type="date" name="to" placeholder="To Date">
                    </div>
                    <div class="old-date-button">
                        <input type="submit" value="Search">
                    </div>
               </form>
               @else
               <div class="cetagory-title-03">পুরানো সংবাদ  </div>
                <form action="{{ route('search') }}" method="get">
                    <div class="old-news-date">
                       <input type="date" name="from" placeholder="From Date" required="">
                       <input type="date" name="to" placeholder="To Date">
                    </div>
                    <div class="old-date-button">
                        <input type="submit" value="খুজুন">
                    </div>
               </form>
                @endif
               <!-- news -->
               <br><br><br><br><br>
               {{-- <div class="cetagory-title-04"> গুরুত্বপূর্ণ ওয়েবসাইট </div>
               <div class="">
                   <div class="news-title-02">
                       <h4 class="heading-03"><a href="#"><i class="fa fa-check" aria-hidden="true"></i> লালমনিরহাটে আওয়ামী লীগ  </a> </h4>
                   </div>
                   <div class="news-title-02">
                       <h4 class="heading-03"><a href="#"><i class="fa fa-check" aria-hidden="true"></i> লালমনিরহাটে আওয়ামী লীগ  </a> </h4>
                   </div>
                   <div class="news-title-02">
                       <h4 class="heading-03"><a href="#"><i class="fa fa-check" aria-hidden="true"></i> লালমনিরহাটে আওয়ামী লীগ  </a> </h4>
                   </div>
                   <div class="news-title-02">
                       <h4 class="heading-03"><a href="#"><i class="fa fa-check" aria-hidden="true"></i> লালমনিরহাটে আওয়ামী লীগ  </a> </h4>
                   </div>
                   <div class="news-title-02">
                       <h4 class="heading-03"><a href="#"><i class="fa fa-check" aria-hidden="true"></i> লালমনিরহাটে আওয়ামী লীগ  </a> </h4>
                   </div>
                   <div class="news-title-02">
                       <h4 class="heading-03"><a href="#"><i class="fa fa-check" aria-hidden="true"></i> লালমনিরহাটে আওয়ামী লীগ  </a> </h4>
                   </div>
                   <div class="news-title-02">
                       <h4 class="heading-03"><a href="#"><i class="fa fa-check" aria-hidden="true"></i> লালমনিরহাটে আওয়ামী লীগ  </a> </h4>
                   </div>
                   <div class="news-title-02">
                       <h4 class="heading-03"><a href="#"><i class="fa fa-check" aria-hidden="true"></i> লালমনিরহাটে আওয়ামী লীগ  </a> </h4>
                   </div>
               </div> --}}

            </div>
        </div>
    </div>
</section><!-- /.3rd-news-section-close -->









<!-- gallery-section-start -->
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-7">
                @if (session()->get('lan')=='english')
                <a href="{{ route('photo.gallery') }}"><div class="gallery_cetagory-title"> Photo Gallery </div></a>
                @else
                <a href="{{ route('photo.gallery') }}"><div class="gallery_cetagory-title"> ফটো গ্যলারি</div></a>
                @endif


                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <div class="photo_screen">
                            <div class="myPhotos" style="width:100%">
                                @if (!empty($big_photo))
                                <img src="{{ asset('storage/'.$big_photo->photo) }}"  alt="Avatar">
                                @if (session()->get('lan')=='english')
                                <h4 class="lead-heading-01"><a href="" style="color:black;font-size:14px">{{ $big_photo->title_en }}</a></h4>
                                @else
                                <h4 class="lead-heading-01"><a href="" style="color:black;font-size:14px">{{ $big_photo->title_bn }}</a></h4>

                                @endif
                                @else
                                <img src="{{ asset('user/assets/img/news.jpg') }}"  alt="Avatar">

                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="photo_list_bg">
                            @if (!empty($small_photo))
                            @foreach ($small_photo as $iteam)
                            <div class="photo_img photo_border active">
                                <img src="{{ asset('storage/'.$iteam->photo) }}" alt="image" onclick="currentDiv(1)">

                                @if (session()->get('lan')=='english')
                                <div class="heading-03">
                                   {{ mb_strimwidth($iteam->title_en,0,30) }}
                                </div>
                                @else
                                <div class="heading-03">
                                    {{ mb_strimwidth($iteam->title_bn,0,39) }}
                                </div>
                                @endif
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <!--=======================================
                Video Gallery clickable jquary  start
            ========================================-->

                        <script>
                                var slideIndex = 1;
                                showDivs(slideIndex);

                                function plusDivs(n) {
                                  showDivs(slideIndex += n);
                                }

                                function currentDiv(n) {
                                  showDivs(slideIndex = n);
                                }

                                function showDivs(n) {
                                  var i;
                                  var x = document.getElementsByClassName("myPhotos");
                                  var dots = document.getElementsByClassName("demo");
                                  if (n > x.length) {slideIndex = 1}
                                  if (n < 1) {slideIndex = x.length}
                                  for (i = 0; i < x.length; i++) {
                                     x[i].style.display = "none";
                                  }
                                  for (i = 0; i < dots.length; i++) {
                                     dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                                  }
                                  x[slideIndex-1].style.display = "block";
                                  dots[slideIndex-1].className += " w3-opacity-off";
                                }
                            </script>

            <!--=======================================
                Video Gallery clickable  jquary  close
            =========================================-->

            </div>
            <div class="col-md-4 col-sm-5">
                @if (session()->get('lan')=='english')
                <a href="{{ route('video.gallery') }}"><div class="gallery_cetagory-title"> Video Gallery </div></a>
                @else
                <a href="{{ route('video.gallery') }}"><div class="gallery_cetagory-title"> ভিডিও গ্যলারি </div></a>
                @endif


                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="video_screen">
                            <div class="myVideos" style="width:100%">
                                <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                               @if (!empty($big_video))
                                   {!! $big_video->embed_code !!}
                               @endif
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <div class="gallery_sec owl-carousel">
                            @if (!empty($small_video))
                            @foreach ($small_video as $iteam)
                            <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                <iframe width="130" height="80" src="https://www.youtube.com/embed/{{ $iteam->embed_code }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                <div class="heading-03">
                                    <div class="content_padding">
                                        @if (session()->get('lan')=='english')
                                        {{ $iteam->title_en }}
                                        @else
                                        {{ $iteam->title_bn }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>


                <script>
                    var slideIndex = 1;
                    showDivss(slideIndex);

                    function plusDivs(n) {
                      showDivss(slideIndex += n);
                    }

                    function currentDivs(n) {
                      showDivss(slideIndex = n);
                    }

                    function showDivss(n) {
                      var i;
                      var x = document.getElementsByClassName("myVideos");
                      var dots = document.getElementsByClassName("demo");
                      if (n > x.length) {slideIndex = 1}
                      if (n < 1) {slideIndex = x.length}
                      for (i = 0; i < x.length; i++) {
                         x[i].style.display = "none";
                      }
                      for (i = 0; i < dots.length; i++) {
                         dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                      }
                      x[slideIndex-1].style.display = "block";
                      dots[slideIndex-1].className += " w3-opacity-off";
                    }
                </script>

            </div>
        </div>
    </div>
</section><!-- /.gallery-section-close -->
@endsection
