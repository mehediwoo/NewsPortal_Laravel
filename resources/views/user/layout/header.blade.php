@php
    $category = App\Models\category::get();
    $social = App\Models\social::first();
    $footer = App\Models\footer::first();
@endphp
<section class="hdr_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-6 col-md-2 col-sm-4">
                <div class="header_logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('storage/'.$footer->website_logo) }}"></a>
                </div>
            </div>
            <div class="col-xs-6 col-md-8 col-sm-8">
                <div id="menu-area" class="menu_area">
                    <div class="menu_bottom">
                        <nav role="navigation" class="navbar navbar-default mainmenu">
                    <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <!-- Collection of nav links and other content for toggling -->
                            <div id="navbarCollapse" class="collapse navbar-collapse">
                                <ul class="nav navbar-nav">
                                    @if (session()->get('lan')=='english')
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    @else
                                    <li><a href="{{ route('home') }}">হোম</a></li>
                                    @endif
                                    @if (!empty($category) && $category->count() > 0)
                                    @foreach ($category as $iteam)
                                    <li class="dropdown">
                                        @if (session()->get('lan')=='english')
                                        <a href="{{ route('home') }}" class="dropdown-toggle" data-toggle="dropdown">{{ $iteam->category_en }}<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            @foreach ($iteam->subCat as $subcategory)
                                            <li><a href="{{ route('sub.category.news',$subcategory->id) }}">{{ $subcategory->subCategory_en }}</a></li>
                                            @endforeach
                                        </ul>
                                        @else
                                        <a href="{{ route('home') }}" class="dropdown-toggle" data-toggle="dropdown">{{ $iteam->category_bn }}<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            @foreach ($iteam->subCat as $subcategory)
                                            <li><a href="{{ route('sub.category.news',$subcategory->id) }}">{{ $subcategory->subCategory_bn }}</a></li>
                                            @endforeach
                                        </ul>
                                        @endif

                                    </li>
                                    @endforeach
                                    @endif

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-2 col-sm-12">
                <div class="header-icon">
                    <ul>
                        <!-- version-start -->
                        @if (session()->get('lan')=='english')
                        <li class="version"><a href="{{ route('lan') }}">Bangla</a></li>
                        @else
                        <li class="version"><a href="{{ route('lan') }}">English</a></li>
                        @endif
                        <!-- login-start -->


                        <li>
                            <div class="dropdown">
                              <button class="dropbtn-02"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
                              <div class="dropdown-content">
                                @if (!empty($social->facebook))
                                <a href="{{ $social->facebook }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                                @endif
                                @if (!empty($social->twitter))
                                <a href="{{ $social->twitter }}"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                                @endif
                                @if (!empty($social->youtube))
                                <a href="{{ $social->youtube }}"><i class="fa fa-youtube-play" aria-hidden="true"></i> Youtube</a>
                                @endif
                                @if (!empty($social->instagram))
                                <a href="{{ $social->instagram }}"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a>
                                @endif
                                @if (!empty($social->linkdin))
                                <a href="{{ $social->linkdin }}"><i class="fa fa-linkedin" aria-hidden="true"></i> LinkedIn</a>
                                @endif

                              </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
